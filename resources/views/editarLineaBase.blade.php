@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><h1 style="text-align: center"><b>Editar Linea Base</b></h1></div>
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
                            <form method="POST" action="{{ route('lineasBases.updateLineaBase', $lineasbases->id) }}">
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
                                        value="{{ $lineasbases->nombre }}"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha de Inicio</label>
                                    <input 
                                        type="date" 
                                        name="fecha_inicio" 
                                        placeholder="Fecha de Inicio" 
                                        class="form-control mb-2" 
                                        value="{{ $lineasbases->fecha_inicio }}"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha Fin</label>
                                    <input 
                                        type="date" 
                                        name="fecha_fin" 
                                        placeholder="Fecha Fin" 
                                        class="form-control mb-2" 
                                        value="{{ $lineasbases->fecha_fin }}"
                                    />
                                </div>   
                                <button class="btn btn-warning btn-block mb-2" type="submit">Editar</button>
                            </form>
                        
                    
                        </div>
                    </div>
                    <a href="{{ url('configuracion/lineasbases') }}" class="btn btn-dark">ATRAS</a>

                </div>
            </div>
        </div>
    </div>
@endsection
 