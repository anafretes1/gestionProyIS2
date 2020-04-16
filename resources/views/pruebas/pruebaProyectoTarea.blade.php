@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header" ><h1>Prueba Proyectos Tareas</h1></div>
                        <div class="card-body">
                            
                            <form method="POST" action="{{ route('proyectos.crearProyecto') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre_proyecto">Proyecto: GLDWEBCAM</label>
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
                        
                            <table class="table">
                                <thead class="thead-dark" >
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha Inicio</th>
                                        <th scope="col">Fecha Fin</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                @foreach($tareas as $item)
                                    <tr>
                                        <th scope="row">{{$item->id }}</th><!--Nombre de los campos de las tablas-->
                                        <td>{{$item->descripcion_tarea }}</td>
                                        <td>{{$item->created_at }}</td>
                                        <td>{{$item->created_at }}</td>
                                        <td>{{$item->estado_tarea }}</td>

                                        <td>
                                            <form action="{{ route('proyectos.eliminarProyecto', $item) }}" method="POST" class="d-inline"> 
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <a href="{{ url('prueba1') }}" class="btn btn-primary">ATRAS</a>
                        </div>
                    </div>
                    {{ $proyectos->links() }}<!--Boton de paginacion-->
                </div>
            </div>
        </div>
    </div>
@endsection
 