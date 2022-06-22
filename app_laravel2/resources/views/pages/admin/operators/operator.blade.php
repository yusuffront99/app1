@extends('layouts.admin')

@section('content')
    <div class="container-fluid bg-white">

        <!-- Page Heading -->
        <br>
        <h6 class="h3 mb-2 text-gray-800"><small><a href="">Operator <i class="fa fa-chevron-right"></i></a></small> Tambah Operator Baru</h6>
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
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="foto_profil">Foto Profil</label>
                                        <input type="file" name="foto_profil" class="form-control" id="foto_profil" placeholder="foto_profil">
                                    </div>
                                    <div class="col-sm-6">
                                        <img alt="" id="preview-image" width="100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('add-admin-script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#foto_profil').change(function(){
                var reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0])
            });

            // if($('#icon-x').click((e)=> {
            //     $('#preview-image').remove();
            //     reader.readAsDataURL(this.files[0]).reset();
            // }))

            $('#btn-operator').click((e)=> {
                e.preventDefault();

                $.ajax({
                    data: $('#form-operator').serialize(),
                    type: 'POST',
                    dataType : 'JSON',
                    url : "{{route('create_operator')}}",
                    success : function(e){
                        if(e.success){
                            swal({
                                title: "Good job!",
                                text: "You clicked the button!",
                                icon: "success",
                            });
                            $("#form-operator")[0].reset(),
                            $("span").remove('#error')
                            
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