@extends('layouts.main')

@section('content')
    <div class="container m-5">
        <h3 class="text-center mb-4">Form Register</h3>
        <form id="form-auth">
            @csrf
            <div class="col-lg-5 col-md-5 m-auto">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="d-grid gap-2 mt-2">
                    <button class="btn btn-primary" type="submit" id="btn-register">register</button>
                </div>
            <br>
                <div class="small text-center"><a href="{{route('login')}}">back to login</a></div>
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

            $('#btn-register').click(function(e){
                e.preventDefault();

                $.ajax({
                    url : "{{route('register-store')}}",
                    method : "post",
                    data: $('#form-auth').serialize(),
                    dataType: 'JSON',
                    cache: false,
                    processData: true,
                    success: function(data){
                        if(data.success) {
                            swal({
                                title: "Horeee!",
                                text: "You're login successfully!",
                                icon: "success",
                            });
                            window.location = "{{route('login')}}"
                        } else if(e.warning) {
                            swal({
                                title: "Yah!",
                                text: "An error occrued email or password!",
                                icon: "warning",
                            });
                        }
                    }
                })
            });
        });
    </script>
@endpush