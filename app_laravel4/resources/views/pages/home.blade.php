@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="h3 text-center">Hello <strong class="badge bg-success">{{Auth::user()->username}}</strong> Welcome to Laravel 9</div>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-4">
                <div class="card bg-secondary">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Hello, <strong class="badge bg-success">{{Auth::user()->username}}</strong> </h5>
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                            <div class="col-lg-4">
                                foto
                            </div>
                        </div>
                        <a href="{{route('operator.create')}}" class="btn btn-primary">Go Operator</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Menu Foto</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet.</p>
                        <a href="{{route('supervisor-index')}}" class="btn btn-primary">Go Supervisor</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Menu Laporan</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet.</p>
                        <a href="{{route('laporan.index')}}" class="btn btn-primary">Go Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection