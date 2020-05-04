@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Linea Base: {{ $lineasbases->nombre }}</h1>
                    </div>
                    <div class="card-header">
                        <h3>Tareas asignadas</h3>
                    </div>
                    <table class="table">
                        <thead class="thead-dark" >
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Versión</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Fin</th>
                            </tr>
                        </thead>
                        @foreach($tareasLineasBases as $item)
                            <tr>
                                <th scope="row">{{$item->id }}</th>
                                <td>{{$item->descripcion_tarea }}</td>
                                <td>{{$item->version_tarea }}</td>
                                <td>{{$item->estado_tarea }}</td>
                                <td>{{$item->fecha_inicio }}</td>
                                <td>{{$item->fecha_fin }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <a href="{{ url('configuracion/lineasbases') }}" class="btn btn-dark">ATRAS</a>
            </div>
        </div>
    </div>
@endsection
 