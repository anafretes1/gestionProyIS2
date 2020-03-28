@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Editar Tarea {{ $tareas->id }}</h1>
                    </div>
                    <div class="card-body">
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
                            <div class="form-group">
                                <label for="version_tarea">Version</label>
                                <input type="text" name="version_tarea" placeholder="Version" class="form-control mb-2" value="{{ $tareas->version_tarea }}">
                            </div>
                            <div class="form-group">
                                <label for="prioridad_tarea">Prioridad</label>
                                <input type="text" name="prioridad_tarea" placeholder="Prioridad" class="form-control mb-2" value="{{ $tareas->prioridad_tarea }}">

                            </div>
                        
                            <div class="form-group">
                                <label for="estado_tarea">Estado</label>
                                <select class="form-control" name="estado_tarea" >
                                    <option value="">-- Asignar el estado --</option>
                                    @foreach ($estados as $key)
                                        <option value="{{ $key['nombre'] }}">{{ $key['nombre'] }}</option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="form-group">
                                <label for="descripcion_tarea">Descripción</label>
                                <input type="text" name="descripcion_tarea" placeholder="Descripcion" class="form-control mb-2" value="{{ $tareas->descripcion_tarea }}">

                            </div>
                            <div class="form-group">
                                <label for="observacion_tarea">Observación</label>
                                <input type="text" name="observacion_tarea" placeholder="Observacion" class="form-control mb-2" value="{{ $tareas->observacion_tarea }}">

                            </div>
                            <div class="form-group">
                                <label for="id_padre_tarea">Tarea Padre</label>
                                <input type="text" name="id_padre_tarea" placeholder="Tarea Padre" class="form-control mb-2" value="{{ $tareas->id_padre_tarea }}">

                            </div>
                            <button class="btn btn-warning btn-block" type="submit">Editar</button>
                    </form>
                </div>
            </div>
            <a href="{{ url('desarrollo/tareas') }}" class="btn btn-primary">ATRAS</a>
        </div>
    </div>
@endsection
