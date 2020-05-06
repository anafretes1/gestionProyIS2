@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header" ><h1>Tareas</h1></div>
                    <div class="card-body">
                        @if ( session('mensaje') )
                            <div class="alert alert-success">
                                {{ session('mensaje') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                       
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Versión</th>
                                    <th scope="col">Prioridad</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Observación</th>
                                    <th scope="col">Tarea Padre</th>
                                    <th scope="col">Inicio</th>
                                    <th scope="col">Fin</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tareas as $item)
                            <tr>
                                <th scope="row">{{$item->id }}</th>
                                <td>{{$item->version_tarea }}</td>
                                <td>{{$item->prioridad_tarea }}</td>
                                <td>{{$item->estado_tarea }}</td>
                                <td>{{$item->descripcion_tarea }}</td>
                                <td>{{$item->observacion_tarea }}</td>
                                <td>{{$item->tarea_id }}</td>
                                <td>{{$item->fecha_inicio }}</td>
                                <td>{{$item->fecha_fin }}</td>
                                <td><a href="{{ route('tareas.editarTareaProyecto', $item) }}" class="btn btn-warning btn-sm">Asignar</a></td>
                            </tr>
                            @endforeach
                            </div>
                                </table>
                                    <a href="{{ url('desarrollo') }}" class="btn btn-dark">ATRAS</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 