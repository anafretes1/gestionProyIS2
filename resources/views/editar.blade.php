@extends('plantilla')

@section('seccion')
  <h1>Editar permiso {{ $permisos->id }}</h1>

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
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
  </form>

@endsection