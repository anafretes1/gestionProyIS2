@extends('plantilla')

@section('seccion')
  <h1>Editar Tarea {{ $tareas->id }}</h1>

  @if (session('mensaje'))
      <div class="alert alert-success">
          {{ session('mensaje') }}
      </div>
  @endif
  <form action="{{ route('tareas.updateTarea', $tareas->id) }}" method="POST">
    @method('PUT')
    @csrf
    @error('version_tarea')
                <div class="alert alert-danger alert-dismissible fade show">
                    La version del Proyecto es requerida
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror 
            @if ($errors->has('descripcion_tarea'))
                <div class="alert alert-danger alert-dismissible fade show" >
                    La descripción es requerida
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
    <input type="text" name="version_tarea" placeholder="Version" class="form-control mb-2" value="{{ $tareas->version_tarea }}">
    <input type="text" name="prioridad_tarea" placeholder="Prioridad" class="form-control mb-2" 
    value="{{ $tareas->prioridad_tarea }}">
    <input type="text" name="estado_tarea" placeholder="Estado" class="form-control mb-2" value="{{ $tareas->estado_tarea }}">
    <input type="text" name="descripcion_tarea" placeholder="Descripcion" class="form-control mb-2" value="{{ $tareas->descripcion_tarea }}">
    <input type="text" name="observacion_tarea" placeholder="Observacion" class="form-control mb-2" value="{{ $tareas->observacion_tarea }}">
    <input type="text" name="id_padre_tarea" placeholder="Tarea Padre" class="form-control mb-2" value="{{ $tareas->id_padre_tarea }}">
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
  </form>

@endsection