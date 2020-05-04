@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header" ><h1>Agregar Tarea</h1></div>
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
                            {{$proyectos->id }}
                            <table class="table">
                                <thead class="thead-dark" >
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Fecha Inicio</th>
                                        <th scope="col">Fecha Fin</th>
                                        <th scope="col">Estado</th>
                                       <!-- <th scope="col">Tarea</th>-->  
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                               
                            </table>
                            <a href="{{ url('desarrollo') }}" class="btn btn-primary">ATRAS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 