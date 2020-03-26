@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Permisos</div>
                    <div class="card-body">
                        @if (session('mensaje'))
                            <div class="alert alert-success">
                                {{ session('mensaje') }}
                            </div>
                        @endif
                        <form action="{{ route('permisos.update', $permisos->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            @error('nombre')
                                <div class="alert alert-danger">
                                    El nombre es obligatorio
                                </div>
                            @enderror

                            @error('descripcion')
                                <div class="alert alert-danger">
                                    La descripción es obligatoria
                                </div>
                            @enderror

                            <input type="text" name="nombre_permiso" placeholder="Nombre" class="form-control mb-2" value="{{ $permisos->nombre_permiso }}">
                            <input type="text" name="descripcion_permiso" placeholder="Descripcion" class="form-control mb-2" 
                            value="{{ $permisos->descripcion_permiso }}">
                            <button class="btn btn-success btn-block" type="submit">Editar</button>
                        </form>
                        </div>
                    </div>
                    <a href="{{ url('administracion/permisos') }}" class="btn btn-primary">ATRAS</a>
                </div>
            </div>
        </div>
    </div>
@endsection