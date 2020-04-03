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
                        <form method="POST" action="{{ route('tareas.crearTarea') }}">
                            @csrf
                            <!--EN LOS INPUTS, el campo name = "nombre deL CAMPO DE LA tabla de la BD"-->
                            <div class="form-group">
                                <label for="version_tarea">Version</label>
                                <input 
                                    type="text" 
                                    name="version_tarea" 
                                    placeholder="Version de la tarea" 
                                    class="form-control mb-2" 
                                    value="{{ old('version_tarea') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label for="prioridad_tarea">Prioridad</label>
                                <input 
                                    type="text" 
                                    name="prioridad_tarea" 
                                    placeholder="Prioridad de la tarea" 
                                    class="form-control mb-2" 
                                    value="{{ old('prioridad_tarea') }}"
                                />
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
                                <input 
                                    type="text" 
                                    name="descripcion_tarea" 
                                    placeholder="Descripcion de la tarea" 
                                    class="form-control mb-2" 
                                    value="{{ old('descripcion_tarea') }}"
                                />
                            </div>
                            <div class="form-group">
                                <label for="observacion_tarea">Observación</label>
                                <input  
                                    type="text" 
                                    name="observacion_tarea" 
                                    placeholder="Observacion" 
                                    class="form-control mb-2" 
                                    value="{{ old('observacion_tarea') }}"
                                    />
                            </div>
                            <!--<div class="form-group">
                                <label for="id_padre_tarea">Tarea Padre</label>
                                <input  
                                    type="text" 
                                    name="id_padre_tarea" 
                                    placeholder="Tarea Padre" 
                                    class="form-control mb-2" 
                                    value="{{ old('id_padre_tarea') }}"
                                />
                            </div>-->
                            <div class="form-group">
                                <label for="id_padre_tarea">Tarea padre</label>
                                <select class="form-control mb-2" name="id_padre_tarea" >
                                    <option value="">-- Asignar tarea --</option>
                                    @foreach ($tareas as $key)
                                        <option value="{{ $key['id'] }}">{{ $key['descripcion_tarea'] }}</option>
                                    @endforeach
                                </select>
                            </div>   
                            <button class="btn btn-primary btn-block mb-2" type="submit">Agregar</button>
                        </form>
                    

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
                                <td>{{$item->id_padre_tarea }}</td>
                                <td><a href="{{ route('tareas.editarTarea', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('tareas.eliminarTarea', $item) }}" method="POST" class="d-inline"> 
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </div>
                                </table>
                                    <a href="{{ url('desarrollo') }}" class="btn btn-primary">ATRAS</a>
                                </div>
                                {{ $tareas->links() }}<!--Boton de paginacion-->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 