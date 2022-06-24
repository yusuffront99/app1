@extends('layouts.admin')

@section('content')
    <div class="container-fluid bg-white">

        <!-- Page Heading -->
        <br>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <a href="{{route('operator.create')}}" class="btn btn-outline-success">Data Profil</a>
                <a href="" class="ml-3 btn btn-sm btn-outline-secondary">Foto Profil</a>
            </form>
        </nav>
        <hr>
        <div class="col-lg-12 col-md-12 col-sm-12 text-primary p-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <form id="form-operator" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="nama_lengkap">
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" class="form-control" id="nip" placeholder="nip">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label for="Jabatan">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="custom-select">
                                    <option value="" selected disabled>-- Pilih Jabatan --</option>
                                    <option value="operator_boiler">Operator Boiler</option>
                                    <option value="operator_turbine">Operator Turbine</option>
                                    <option value="operator_ccr">Operator CCR</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="grade">Grade</label>
                                <select name="grade" id="grade" class="custom-select">
                                    <option value="" selected disabled>-- Pilih Grade --</option>
                                    <option value="fungsional">Fungsional</option>
                                    <option value="spesifik">Spesifik</option>
                                    <option value="sistem">Sistem</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-block" id="btn-operator">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </small>
@endsection

@push('add-admin-script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn-operator').click((e)=> {
                e.preventDefault();

                $.ajax({
                    data: $('#form-operator').serialize(),
                    type: 'POST',
                    dataType : 'JSON',
                    url : "{{route('operator.store')}}",
                    success : function(e){
                        if(e.success){
                            swal({
                                title: "Good job!",
                                text: "You clicked the button!",
                                icon: "success",
                            });
                            $("#form-operator")[0].reset(),
                            $("span").remove('#error')
                            window.location = "{{route('dashboard')}}"
                        } else if(e.error) {
                            swal({
                                title: "Good job!",
                                text: "You clicked the button!",
                                icon: "warning",
                            });
                        }
                    },
                    error: function(err){
                        $.each(err.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="text-strong text-danger" id="error">' +error+ '</span>')
                        })
                    }
                });
            });
        });
    </script>
@endpush