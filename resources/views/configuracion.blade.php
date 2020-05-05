@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header"><h1 align=center>MÓDULO DE GESTIÓN DE CONFIGURACIÓN</h1></div>
                    <div class="card-body">
                        <div class="container my-5" align=center >
                            <div class="card-deck" style="display: inline-flex"> 

                                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                    <img src="{{asset('../imagenes/manager.jpg')}}" class="card-img-top" alt="manager">
                                    <div class="card-body">
                                        <a href="{{ route('lineaBase') }}" class="btn btn-light"><b>Linea Base</b></a>
                                    </div>
                                </div>
                                                    
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                    <img src="{{asset('../imagenes/logo.jpg')}}" class="card-img-top" alt="logo">
                                    <div class="card-body">
                                        <a href="{{ route('asignarLineaBase') }}" class="btn btn-light"><b>Asignar Tareas a Linea Base</b></a>
                                    </div>
                                </div>
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 