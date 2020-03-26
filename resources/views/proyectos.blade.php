@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><h1>Proyectos</h1></div>
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
                            <form method="POST" action="{{ route('proyectos.crearProyecto') }}">
                                @csrf
                                <!--Validaciones de campos vacios mensaje mas boton de cerrar-->
                                @error('nombre_proyecto')
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        El nombre del Proyecto es requerido
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror 
                                @if ($errors->has('descripcion_proyecto'))
                                    <div class="alert alert-danger alert-dismissible fade show" >
                                        La descripción es requerida
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <!--EN LOS INPUTS, el campo name = "nombre deL CAMPO DE LA tabla de la BD"-->
                                <input 
                                    type="text" 
                                    name="nombre_proyecto" 
                                    placeholder="Nombre del Poryecto" 
                                    class="form-control mb-2" 
                                    value="{{ old('nombre_proyecto') }}"/>
                                <input 
                                    type="text" 
                                    name="descripcion_proyecto" 
                                    placeholder="Descripcion del Proyecto" 
                                    class="form-control mb-2" 
                                    value="{{ old('descripcion_proyecto') }}"/>
                                <input 
                                    type="date" 
                                    name="fecha_inicio" 
                                    placeholder="Fecha de Inicio" 
                                    class="form-control mb-2" 
                                    value="{{ old('fecha_inicio') }}"/>
                                <input 
                                    type="date" 
                                    name="fecha_fin_estimada" 
                                    placeholder="Fecha Fin Estimada" 
                                    class="form-control mb-2" 
                                    value="{{ old('fecha_fin_estimada') }}"/>
                                <input 
                                    type="number" 
                                    name="anho_proyecto" 
                                    placeholder="Año" 
                                    class="form-control mb-2" 
                                    value="{{ old('anho_proyecto') }}"/>
                                <input 
                                    type="text" 
                                    name="estado_proyecto" 
                                    placeholder="Estado del Proyecto" 
                                    class="form-control mb-2" 
                                    value="{{ old('estado_proyecto') }}"/>
                                <input 
                                    type="number" 
                                    name="id_fase" 
                                    placeholder="Fase relacionada" 
                                    class="form-control mb-2" 
                                    value="{{ old('id_fase') }}"/>
                                <button class="btn btn-primary btn-block mb-2" type="submit">Agregar</button>
                            </form>
                        
                            <table class="table">
                                <thead class="thead-dark" >
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Fecha Inicio</th>
                                        <th scope="col">Fecha Fin</th>
                                        <th scope="col">Año</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fase</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                @foreach($proyectos as $item)
                                    <tr>
                                        <th scope="row">{{$item->id }}</th><!--Nombre de los campos de las tablas-->
                                        <td>{{$item->nombre_proyecto }}</td>
                                        <td>{{$item->descripcion_proyecto }}</td>
                                        <td>{{$item->fecha_inicio }}</td>
                                        <td>{{$item->fecha_fin_estimada }}</td>
                                        <td>{{$item->anho_proyecto }}</td>
                                        <td>{{$item->estado_proyecto }}</td>
                                        <td>{{$item->id_fase }}</td>
                                        <td><a href="{{ route('proyectos.editarProyecto', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('proyectos.eliminarProyecto', $item) }}" method="POST" class="d-inline"> 
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <a href="{{ url('desarrollo') }}" class="btn btn-primary">ATRAS</a>
                        </div>
                    </div>
                    {{ $proyectos->links() }}<!--Boton de paginacion-->
                </div>
            </div>
        </div>
    </div>
@endsection
 