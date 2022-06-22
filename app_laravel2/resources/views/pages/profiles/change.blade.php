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
                <label for="foto_profil">Foto Profil</label>
                <input type="file" name="foto_profil" id="foto_profil" class="form-control">
            </div>
            <div class="col-lg-12 mt-3">
                <button type="submit" class="btn btn-primary btn-block" id="btn-operator">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection