@extends('plantilla')

@section('seccion')
        <h1 class="display-4">ROLES</h1>
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
            @error('nombre_rol')
                <div class="alert alert-danger alert-dismissible fade show">
                    El nombre del rol es requerido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror 
            @if ($errors->has('descripcion_rol'))
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
                name="nombre_rol" 
                placeholder="Nombre del Rol" 
                class="form-control mb-2" 
                value="{{ old('nombre_rol') }}"
            />
            <input 
                type="text" 
                name="descripcion_rol" 
                placeholder="Descripcion del Rol" 
                class="form-control mb-2" 
                value="{{ old('descripcion_rol') }}"
                />
            <button class="btn btn-primary btn-block mb-2" type="submit">Agregar</button>
        </form>
       

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($roles as $item)
            <tr>
                <th scope="row">{{$item->id }}</th><!--Nombre de los campos de las tablas-->
                <td>{{$item->nombre_rol }}</td>
                <td>{{$item->descripcion_rol }}</td>
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
            </tbody>
        </table>
        {{ $roles->links() }}<!--Boton de paginacion-->
@endsection
 