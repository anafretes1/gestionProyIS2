@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Editar Permiso {{ $permisos->id }}</h1>
                    </div>
                    <div class="card-body">
                    @if (session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form action="{{ route('administracion.updatePermiso', $permisos->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @error('nombre')
                            <div class="alert alert-danger alert-dismissible fade show">
                                El nombre del Permiso es requerido
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror 
                            <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $estados->nombre }}">
                            <button class="btn btn-warning btn-block" type="submit">Editar</button>
                    </form>
                </div>
            </div>
            <a href="{{ url('administracion/permisos') }}" class="btn btn-dark">ATRAS</a>
        </div>
    </div>
@endsection
