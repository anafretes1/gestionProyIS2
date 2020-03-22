@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <h2>Bienvenido {{ Auth::user()->name }} !</h2>
                    </div>
                    <div class="container">
                        <a href="{{ route('administracion') }}" class="btn btn-primary">ADMINISTRACIÓN</a>
                        <a href="{{ route('desarrollo') }}" class="btn btn-primary">DESARROLLO</a>
                        <a href="{{ route('config') }}" class="btn btn-primary">CONFIGURACION</a>
                    </div>         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
