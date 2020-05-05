@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header"><h1 align=center>MÓDULO DESARROLLO</h1></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-deck">
                            <div  class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <img src="{{asset('../imagenes/desarrollo.jpg')}}" class="card-img-top" alt="desarrollo">
                                <div class="card-body">
                                    <a href="{{ route('proyecto') }}" class="btn btn-light">PROYECTOS</a>

                                </div>
                            </div>
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <img src="{{asset('../imagenes/logo.jpg')}}" class="card-img-top" alt="logo">
                                <div class="card-body">
                                    <a href="{{ route('tarea') }}" class="btn btn-light">TAREAS</a>
                                </div>
                            </div>
                            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                <img src="{{asset('../imagenes/logo.jpg')}}" class="card-img-top" alt="logo">
                                <div class="card-body">
                                    <a href="{{ route('asignar') }}" class="btn btn-light">Asignar Tareas a Proyectos</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
 @endsection