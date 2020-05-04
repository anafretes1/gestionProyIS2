@extends('layouts.app')

@section('content')
    <h1 class="display-8" align=center>MÓDULO DE GESTIÓN DE CONFIGURACIÓN</h1>
    <div class="container my-5" align=center>
        <div class="card-deck">

            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <img src="{{asset('../imagenes/manager.jpg')}}" class="card-img-top" alt="manager">
                <div class="card-body">
                    <a href="{{ route('lineaBase') }}" class="btn btn-light">Linea Base</a>
                </div>
            </div>
                                
            <div  class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <img src="{{asset('../imagenes/desarrollo.jpg')}}" class="card-img-top" alt="desarrollo">
                <div class="card-body">
                    <a href="{{ route('statusLineaBase') }}" class="btn btn-light">Diagrama</a>
                </div>
            </div>
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <img src="{{asset('../imagenes/logo.jpg')}}" class="card-img-top" alt="logo">
                <div class="card-body">
                    <a href="{{ route('asignarLineaBase') }}" class="btn btn-light">Asignar Tareas a Linea Base</a>
                </div>
            </div>
                    
        </div>
    </div>

@endsection
 