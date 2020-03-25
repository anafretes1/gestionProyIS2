@extends('layouts.app')

@section('content')

    <h1 class="display-8" align=center>MÓDULO DESARROLLO</h1>
    <div class="container my-4" align=center>
        <a href="{{ route('proyecto') }}" class="btn btn-primary">PROYECTOS</a>
        <a href="{{ route('tarea') }}" class="btn btn-primary">TAREAS</a>
    </div>
        
 @endsection