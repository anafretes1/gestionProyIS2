@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><h1>Lineas Bases</h1></div>
                        <div class="card-body">
                            @if ( session('mensaje') )
                                <div class="alert alert-success">
                                    {{ session('mensaje') }}
                                    <button type="button" class="close" data-dismiss="alert" 
                                    aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('lineasBases.crearLineaBase') }}">
                                @csrf
                                <!--Validaciones de campos vacios mensaje mas boton de cerrar-->
                                @error('nombre')
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        El nombre de la Linea Base es requerida
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror 
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input 
                                        type="text" 
                                        name="nombre" 
                                        placeholder="Nombre de la Linea Base" 
                                        class="form-control mb-2" 
                                        value="{{ old('nombre') }}"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="proyecto_id">Proyecto</label>
                                    <select class="form-control" name="proyecto_id" >
                                        <option value="">-- Asignar el Proyecto --</option>
                                        @foreach ($proyectos as $key)
                                            <option value="{{ $key['id'] }}">{{ $key['nombre_proyecto'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tarea_id">Tarea</label>
                                    <select class="form-control" name="tarea_id" >
                                        <option value="">-- Asignar tarea --</option>
                                        @foreach ($tareas as $key)
                                            <option value="{{ $key['id'] }}">{{ $key['descripcion_tarea'] }}</option>
                                        @endforeach
                                    </select>
                                </div>   
                                <button class="btn btn-primary btn-block mb-2" type="submit">Agregar</button>
                            </form>
                        
                            <table class="table">
                                <thead class="thead-dark" >
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Proyecto</th>
                                        <th scope="col">Tarea</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                @foreach($lineasbases as $item)
                                    <tr>
                                        <th scope="row">{{$item->id }}</th><!--Nombre de los campos de las tablas-->
                                        <td>{{$item->nombre }}</td>
                                        <td>{{$item->proyecto_id }}</td>
                                        <td>{{$item->tarea_id }}</td>
                                        <td><a href="{{ route('lineasBases.editarLineaBase', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('lineasBases.eliminarLineaBase', $item) }}" method="POST" class="d-inline"> 
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <a href="{{ url('configuracion') }}" class="btn btn-primary">ATRAS</a>
                        </div>
                    </div>
                    {{ $lineasbases->links() }}<!--Boton de paginacion-->
                </div>
            </div>
        </div>
    </div>
@endsection
 