@extends('layouts.main')

@section('content')
<div class="p-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </nav>
    <hr>
    <div class="m-3">
        {{-- <div class="row d-flex justify-content-center bg-primary text-white p-3 mb-1">
            Data Profil
        </div> --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link active" href="{{route('show.operator', Auth::user()->id)}}">Data Profil <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="{{route('foto')}}">Ganti Foto</a>
                </div>
            </div>
        </nav>
        <hr>
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
                    <label for="grade">Grade</label>
                    <select name="grade" id="grade" class="custom-select">
                        <option value="" selected disabled>-- Pilih Grade --</option>
                        <option value="fungsional">Fungsional</option>
                        <option value="spesifik">Spesifik</option>
                        <option value="sistem">Sistem</option>
                    </select>
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
            </div>
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary btn-block" id="btn-operator">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection