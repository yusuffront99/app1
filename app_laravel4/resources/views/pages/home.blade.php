@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="h3 text-center">Welcome to Laravel 9</div>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Menu Operator</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="{{route('operator.index')}}" class="btn btn-primary">Go Operator</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Menu Foto</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-primary">Go Foto</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Menu Laporan</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-primary">Go Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection