@extends('plantilla')

@section('seccion')
  <h1>Editar permiso {{ $roles->id }}</h1>

  @if (session('mensaje'))
      <div class="alert alert-success">
          {{ session('mensaje') }}
      </div>
  @endif
  <form action="{{ route('roles.updateRol', $roles->id) }}" method="POST">
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

    <input type="text" name="nombre_rol" placeholder="Nombre" class="form-control mb-2" value="{{ $roles->nombre_rol }}">
    <input type="text" name="descripcion_rol" placeholder="Descripcion" class="form-control mb-2" 
    value="{{ $roles->descripcion_rol }}">
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
  </form>

@endsection