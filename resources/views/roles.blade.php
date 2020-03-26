@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" ><h1>Roles</h1></div>
                    <div class="card-body">
                        @if ( session('mensaje') )
                            <div class="alert alert-success">
                                {{ session('mensaje') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('roles.crearRol') }}">
                            @csrf
                            <!--Validaciones de campos vacios mensaje mas boton de cerrar-->
                            @error('name')
                                <div class="alert alert-danger alert-dismissible fade show">
                                    El nombre del rol es requerido
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror 
                          <!--  @if ($errors->has('descripcion_rol'))
                                <div class="alert alert-danger alert-dismissible fade show" >
                                    La descripción es requerida
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif-->
                            <!--EN LOS INPUTS, el campo name = "nombre deL CAMPO DE LA tabla de la BD"-->
                            <input 
                                type="text" 
                                name="name" 
                                placeholder="Nombre del Rol" 
                                class="form-control mb-2" 
                                value="{{ old('name') }}"
                            />
                           <!-- <input 
                                type="text" 
                                name="descripcion_rol" 
                                placeholder="Descripcion del Rol" 
                                class="form-control mb-2" 
                                value="{{ old('descripcion_rol') }}"
                                />-->
                            <button class="btn btn-success btn-block mb-2" type="submit">Agregar</button>
                        </form>
                    

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Nombre</th>
                                 <!--   <th scope="col">Descripción</th>-->
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $item)
                            <tr><!--Nombre de los campos de las tablas-->
                                <!--<th scope="row">{{$item->id }}</th>
                                <td>{{$item->nombre_rol }}</td>
                                <td>{{$item->descripcion_rol }}</td>-->
                                <th scope="row">{{$item->id }}</th>
                                <td>{{$item->name}}</td>
                                <!--BTN-EDITAR : 1 Crear el ancla, configurarlo e inventar una ruta para href= "",
                                PASO 2 = Crear la ruta definida anteriormente en web (en name = roles.editar)-->
                                <td><a href="{{ route('roles.editarRol', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('roles.eliminarRol', $item) }}" method="POST" class="d-inline"> 
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </div>
                </table>
                    <a href="{{ url('administracion') }}" class="btn btn-primary">ATRAS</a>
                </div>
                {{ $roles->links() }}<!--Boton de paginacion-->
            </div>
        </div>
    </div>
</div>
@endsection
 