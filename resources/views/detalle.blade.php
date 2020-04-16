@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" ><h1>Detalle - LB </h1></div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Nombre de la LB</label>
                                <input type="text" name="name" required class="form-control" placeholder="Nombre del Permiso" >
                            </div>
                            <div class="form-group">
                                <label for="name">Proyecto</label>
                                <input type="text" name="name" required class="form-control" placeholder="Nombre del Proyecto" >
                            </div>
                            <div class="form-group">
                                <label for="name">Tarea</label>
                                <input type="text" name="name" required class="form-control" placeholder="Nombre de la tarea" >
                            </div>
                            <button class="btn btn-success btn-block mb-2" type="submit">Agregar</button>

                                                        <!-- detalle en tabla -->
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Version</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach($tareas as $item)
                                        <tr>
                                            <th scope="row">{{$item->id }}</th><!--Nombre de los campos de las tablas-->
                                            <td>{{$item->descripcion_tarea}}</td>
                                            <td>{{$item->estado_tarea}}</td>
                                            <td>{{$item->version_tarea}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection