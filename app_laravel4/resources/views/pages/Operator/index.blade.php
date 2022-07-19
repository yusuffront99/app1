@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="h3 text-center">Welcome to Laravel 9</div>
        <hr>
        
        <div class="row">
            <div class="col-lg-10 m-auto">
                <h6 class="text-center text-primary">My Profile</h6>
                <hr>
                <div class="row">
                    <form action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" id="nip" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Password</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <select name="grade" id="grade" class="form-select">
                                        <option value="" disabled selected>-- Pilih grade --</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Spesific">Spesific</option>
                                        <option value="System">System</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select name="jabatan" id="jabatan" class="form-select">
                                        <option value="" disabled selected>-- Pilih Jabatan --</option>
                                        <option value="JO Boiler">JO Boiler</option>
                                        <option value="JO Turbine">JO Turbine</option>
                                        <option value="Control Room">Control Room</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shift">Operator Shift</label>
                                    <select name="shift" id="shift" class="form-select">
                                        <option value="" disabled selected>-- Pilih shift --</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="supervisor">Supervisor</label>
                                    <select name="supervisor" id="supervisor" class="form-select">
                                        <option value="" disabled selected>-- Pilih supervisor --</option>
                                        <option value="Aan Hasanudin">Aan Hasanudin</option>
                                        <option value="Fauzan Hadi">Fauzan Hadi</option>
                                        <option value="Arief Chairudin">Arief Chairudin</option>
                                        <option value="Denny">Denny</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Profil</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-2">
                                <button class="btn btn-primary" type="submit" id="btn-profile">simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection