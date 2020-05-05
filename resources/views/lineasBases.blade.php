@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><h1 style="text-align: center"><b>Lineas bases</b></h1></div>
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
                                    <label for="fecha_inicio">Fecha de Inicio</label>
                                    <input 
                                        type="date" 
                                        name="fecha_inicio" 
                                        placeholder="Fecha de Inicio" 
                                        class="form-control mb-2" 
                                        value="{{ old('fecha_inicio') }}"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha Fin</label>
                                    <input 
                                        type="date" 
                                        name="fecha_fin" 
                                        placeholder="Fecha Fin" 
                                        class="form-control mb-2" 
                                        value="{{ old('fecha_fin') }}"
                                    />
                                </div>
                               
                                <button class="btn btn-primary btn-block mb-2" type="submit">Agregar</button>
                            </form>
                        
                            <table class="table">
                                <thead class="thead-dark" >
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha Inicio</th>
                                        <th scope="col">Fecha Fin</th>
                                        <th scope="col" style="text-align: center">Acciones</th>
                                    </tr>
                                </thead>
                                @foreach($lineasbases as $item)
                                    <tr>
                                        <th scope="row">{{$item->id }}</th><!--Nombre de los campos de las tablas-->
                                        <td>{{$item->nombre }}</td>
                                        <td>{{$item->fecha_inicio }}</td>
                                        <td>{{$item->fecha_fin }}</td>
                                        <td style="text-align: center"><a href="{{ route('lineasBases.editarLineaBase', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('lineasBases.eliminarLineaBase', $item) }}" method="POST" class="d-inline"> 
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                            <a href="{{ route('lineasBases.verLineaBase', $item) }}" class="btn btn-success btn-sm">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <a href="{{ url('configuracion') }}" class="btn btn-dark">ATRAS</a>
                        </div>
                    </div>
                    {{ $lineasbases->links() }}<!--Boton de paginacion-->
                </div>
            </div>
        </div>
    </div>
@endsection
 