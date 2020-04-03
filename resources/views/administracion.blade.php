@extends('layouts.app')

@section('content')

    <h1 class="display-8" align=center>MÓDULO ADMINISTRACIÓN</h1>
        
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
            <a href="{{ route('usuarios') }}" class="btn btn-primary">USUARIOS</a>
            <a href="{{ route('permiso') }}" class="btn btn-primary">PERMISOS</a>
            <a href="{{ route('rol') }}" class="btn btn-primary">ROLES</a>
            <a href="{{ route('estado') }}" class="btn btn-primary">ESTADOS</a>
        @endrole
    </div>  

 @endsection