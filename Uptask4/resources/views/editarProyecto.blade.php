@extends('plantilla')

@section('seccion')
  <h1>Editar permiso {{ $proyectos->id }}</h1>

  @if (session('mensaje'))
      <div class="alert alert-success">
          {{ session('mensaje') }}
      </div>
  @endif
  <form action="{{ route('proyectos.updateProyecto', $proyectos->id) }}" method="POST">
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

    <input type="text" name="nombre_proyecto" placeholder="Nombre" class="form-control mb-2" value="{{ $proyectos->nombre_proyecto }}">
    <input type="text" name="descripcion_proyecto" placeholder="Descripcion" class="form-control mb-2" 
    value="{{ $proyectos->descripcion_proyecto }}">
    <input type="text" name="fecha_inicio" placeholder="Fecha Inicio" class="form-control mb-2" value="{{ $proyectos->fecha_inicio }}">
    <input type="text" name="fecha_fin_estimada" placeholder="Fecha Fin" class="form-control mb-2" value="{{ $proyectos->fecha_fin_estimada }}">
    <input type="text" name="anho_proyecto" placeholder="Año" class="form-control mb-2" value="{{ $proyectos->anho_proyecto }}">
    <input type="text" name="estado_proyecto" placeholder="Estado" class="form-control mb-2" value="{{ $proyectos->estado_proyecto }}">
    <input type="text" name="id_fase" placeholder="Fase" class="form-control mb-2" value="{{ $proyectos->id_fase }}">
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
  </form>

@endsection