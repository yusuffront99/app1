@extends('layouts.auth')

@section('content')
<div class="container m-4">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6 m-auto bg-primary text-white p-4">
                            <h4 class="text-center">Login</h4>
                            <hr>
                            <form action="" id="form-login">
                                <div class="form-group">
                                    <label for="email">Nama Lengkap</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="email@.com">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-danger btn-block" id="btn-login">login</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
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

            $('#btn-login').click(function(e){
                e.preventDefault();

                $.ajax({
                    data: $('#form-login').serialize(),
                    type: 'POST',
                    dataType: 'JSON',
                    url: '{{route("auth_login")}}',
                    success : function(e){
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