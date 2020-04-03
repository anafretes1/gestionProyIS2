@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" ><h1>Permisos</h1></div>
                    <div class="card-body">
                        @if ( session('mensaje') )
                            <div class="alert alert-success">
                                {{ session('mensaje') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('permisos.crear') }}">
                            @csrf
                            <!--Validaciones de campos vacios mensaje mas boton de cerrar-->
                            @error('name')
                                <div class="alert alert-danger alert-dismissible fade show">
                                    El nombre es requerido
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror 
                            <!--EN LOS INPUTS, el campo name = "nombre deL CAMPO DE LA tabla de la BD"
                            <input 
                                type="text" 
                                name="name" 
                                placeholder="Nombre del Permiso" 
                                class="form-control mb-2" 
                                value="{{ old('name') }}"
                            />-->
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" required class="form-control" placeholder="Nombre del Permiso" >
                            </div>
                            <button class="btn btn-success btn-block mb-2" type="submit">Agregar</button>
                        </form>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($permisos as $item)
                                    <tr>
                                        <th scope="row">{{$item->id }}</th><!--Nombre de los campos de las tablas-->
                                        <td>{{$item->name}}</td>
                                        <td><a href="{{ route('permisos.editar', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('permisos.eliminar', $item) }}" method="POST" class="d-inline"> 
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ url('administracion') }}" class="btn btn-primary">ATRAS</a>

                {{ $permisos->links() }}<!--Boton de paginacion-->
            </div>
        </div>
    </div>
</div>
@endsection
 