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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" placeholder="nama_lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" id="nip" placeholder="nip">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" placeholder="tanggal_lahir">
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
                                    <label for="foto_profil">Foto Profile</label>
                                    <input type="file" class="form-control" id="foto_profil" placeholder="foto_profil">
                                </div>
                                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
        </div>
    </div>
@endsection