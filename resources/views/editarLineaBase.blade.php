@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><h1>Editar Lineas Bases</h1></div>
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
                            <form method="POST" action="{{ route('lineasBases.updateLineaBase') }}">
                                @method('PUT')
                                @csrf
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
                                        value=""
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
                        
                    
                        </div>
                    </div>
                    <a href="{{ url('configuracion/lineasbases') }}" class="btn btn-primary">ATRAS</a>

                </div>
            </div>
        </div>
    </div>
@endsection
 