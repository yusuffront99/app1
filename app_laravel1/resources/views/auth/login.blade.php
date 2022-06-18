@extends('layouts.auth')

@section('content')
<main class="page-center">
    <article class="sign-up">
        <h1 class="sign-up__title">Welcome back!</h1>
        <p class="sign-up__subtitle">Sign in to your account to continue</p>
        <form class="sign-up-form form" id="form-login">
            <label class="form-label-wrapper">
                <p class="form-label">Email</p>
                <input class="form-input" name="email" type="email" placeholder="Enter your email">
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Password</p>
                <input class="form-input" name="password" type="password" placeholder="Enter your password">
            </label>
            {{-- <a class="link-info forget-link" href="##">Forgot your password?</a>
            <label class="form-checkbox-wrapper">
                <input class="form-checkbox" type="checkbox" required>
                <span class="form-checkbox-label">Remember me next time</span>
            </label> --}}
            <button class="form-btn primary-default-btn transparent-btn" id="btn-signin">Sign in</button>
        </form>
    </article>
</main>
@endsection

@push('script-js')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn-signin').click(function(e){
                e.preventDefault();

                $.ajax({
                    data: $('#form-login').serialize(),
                    type: 'POST',
                    dataType: 'JSON',
                    url: '{{route('login_auth')}}',
                    success: function(e){
                        if(e.success) {
                            swal({
                                title: "Horeee!",
                                text: "You're login successfully!",
                                icon: "success",
                            });
                            window.location = "{{route('home')}}"
                        } else if(e.warning) {
                            swal({
                                title: "Yah!",
                                text: "An error occrued email or password!",
                                icon: "warning",
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush