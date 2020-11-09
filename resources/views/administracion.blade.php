@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">
                    <h1 align=center>MÓDULO ADMINISTRACIÓN</h1>
                </div>
                   
                <div class="container my-4" align=center>
                    <!--
                    VALIDACION POR DIRECTIVAS DE BLADE:
                    * Por rol:
                    @role('Administrador')
                    @endrole

                    * Por permisos:
                    @can('create user')
                    @endcan
                    -->
                    @role('Administrador')       
                        <div class="card-deck">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                <img src="{{asset('imagenes/manager.jpg')}}" class="card-img-top" alt="manager">
                                <div class="card-body">
                                    <!--<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                                    <a href="{{ route('usuarios') }}" class="btn btn-light">USUARIOS</a>
                                </div>
                            </div>
                                        
                            <div  class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <img src="{{asset('imagenes/desarrollo.jpg')}}" class="card-img-top" alt="desarrollo">
                                <div class="card-body">
                                    <a href="{{ route('permiso') }}" class="btn btn-light">PERMISOS</a>
                                </div>
                            </div>

                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <img src="{{asset('imagenes/logo.jpg')}}" class="card-img-top" alt="logo">
                                <div class="card-body">
                                   <a href="{{ route('rol') }}" class="btn btn-light">ROLES</a>
                                </div>
                            </div>

                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <img src="{{asset('imagenes/logo.jpg')}}" class="card-img-top" alt="logo">
                                <div class="card-body">
                                    <a href="{{ route('estado') }}" class="btn btn-light">ESTADOS</a>
                                </div>
                            </div>

                        </div>
                    @endrole
                </div>  
            </div>
        </div>
    </div>
</div>
 @endsection