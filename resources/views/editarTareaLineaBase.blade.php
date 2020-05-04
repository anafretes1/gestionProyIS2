@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Asignar Linea Base a Tarea: {{ $tareas->id }}</h1>
                    </div>
                    <div class="card-body">
                        @if (session('mensaje'))
                            <div class="alert alert-success">
                                {{ session('mensaje') }}
                            </div>
                        @endif
                        <form action="{{ route('tareas.updateTareaLineaBase', $tareas->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="base_id"><h2>LINEA BASE</h2></label>
                                <select class="form-control" name="base_id">
                                    <option value="{{ $tareas->base_id }}">-- Asignar Linea Base --</option>
                                    @foreach ($lineaBase as $key)
                                        <option value="{{ $key['id'] }}">{{ $key['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-warning btn-block" type="submit">Asignar</button>
                            </div>
                            <div class="form-group">
                                <a href="{{ url('desarrollo/asignarTareaLineaBase') }}" class="btn btn-primary">ATRAS</a>
                            </div>


                            <div style="visibility:hidden" class="form-group">
                                <label for="version_tarea">Version</label>
                                <input type="hidden" name="version_tarea" 
                                    placeholder="Version de la tarea" class="form-control mb-2" 
                                    value="{{ $tareas->version_tarea }}">
                            </div>
                            <div style="visibility:hidden" class="form-group">
                                <label for="prioridad_tarea">Prioridad</label>
                                <input type="hidden" name="prioridad_tarea" 
                                placeholder="Prioridad de la tarea" class="form-control mb-2" 
                                value="{{ $tareas->prioridad_tarea }}">
                            </div>
                            
                            
                            <div style="visibility:hidden" class="form-group">
                                <label for="estado_tarea">Estado</label>
                                <select style="visibility:hidden" class="form-control" name="estado_tarea" >
                                    <option type="hidden" value="{{ $tareas->estado_tarea }}">-- Asignar el estado --</option>
                                    @foreach ($estados as $key)
                                        <option value="{{ $key['nombre'] }}">{{ $key['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div style="visibility:hidden" class="form-group">
                                <label for="proyecto_id">PROYECTO</label>
                                <select class="form-control" name="proyecto_id">
                                    <option value="{{ $tareas->proyecto_id }}">-- Asignar Proyecto --</option>
                                    @foreach ($proyectos as $key)
                                        <option value="{{ $key['id'] }}">{{ $key['nombre_proyecto'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="visibility:hidden" class="form-group">
                                <label for="descripcion_tarea">Descripción</label>
                                <input type="hidden" name="descripcion_tarea" 
                                    placeholder="Descripcion de la tarea" class="form-control mb-2" 
                                    value="{{ $tareas->descripcion_tarea }}">
                            </div>
                            <div style="visibility:hidden" class="form-group">
                                <label for="observacion_tarea">Observación</label>
                                <input type="hidden" name="observacion_tarea" 
                                    placeholder="Observacion" class="form-control mb-2" 
                                    value="{{ $tareas->observacion_tarea }}">
                            </div>
                            <div style="visibility:hidden" class="form-group">
                                <label for="tarea_id">Tarea padre</label>
                                <select style="visibility:hidden" class="form-control" name="tarea_id" >
                                    <option value="">-- Asignar tarea --</option>
                                    @foreach ($tareasTodo as $key)
                                        <option value="{{ $key['id'] }}">{{ $key['descripcion_tarea'] }}</option>
                                    @endforeach
                                </select>
                            </div>  
                                         <!-- 29/04/2020-->
                            <div style="visibility:hidden" class="form-group">
                                <label for="fecha_inicio">Fecha Inicio</label>
                                <input type="date" name="fecha_inicio" placeholder="Fecha Inicio" class="form-control mb-2" value="{{ $tareas->fecha_inicio }}">
                            </div>
                            <div style="visibility:hidden" class="form-group">
                                <label for="fecha_fin">Fecha Fin</label>
                                <input type="date" name="fecha_fin" placeholder="Fecha Fin estimada" class="form-control mb-2" value="{{ $tareas->fecha_fin }}">
                            </div>
                            <!-- 29/04/2020-->
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
