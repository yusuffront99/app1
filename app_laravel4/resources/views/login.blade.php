@extends('layouts.main')

@section('content')
    <div class="container m-5">
        <h3 class="text-center mb-4">Form Login</h3>
        <hr>
        <form id="form-login">
            @csrf
            <div class="col-lg-5 col-md-5 m-auto">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="from-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="d-grid gap-2 mt-2">
                    <button class="btn btn-primary" type="submit" id="btn-login">login</button>
                </div>

                <br>
                <div class="small text-center">Are you already an account ? <a href="{{route('register')}}">create a new account</a></div>
            </div>
        </form>
    </div>
@endsection

@push('add-script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn-login').click((e) => {
                e.preventDefault();

                $.ajax({
                    url: "{{route('login-action')}}",
                    method: "POST",
                    data: $('#form-login').serialize(),
                    dataType: "JSON",
                    success: function(data){
                        if(data.success){
                            swal({
                                title: "Good job!",
                                text: "You clicked the button!",
                                icon: "success",
                            });
                            $("#form-login")[0].reset(),
                            window.location = "{{route('home')}}"
                        } else if(data.warning) {
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

