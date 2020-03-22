@extends('plantilla')

@section('seccion')
        <h1 class="display-4">TAREAS</h1>
        @if ( session('mensaje') )
            <div class="alert alert-success">
                {{ session('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form method="POST" action="{{ route('tareas.crearTarea') }}">
            @csrf
            <!--EN LOS INPUTS, el campo name = "nombre deL CAMPO DE LA tabla de la BD"-->
            <input 
                type="text" 
                name="version_tarea" 
                placeholder="Version" 
                class="form-control mb-2" 
                value="{{ old('version_tarea') }}"
            />
            <input 
                type="text" 
                name="prioridad_tarea" 
                placeholder="Prioridad" 
                class="form-control mb-2" 
                value="{{ old('prioridad_tarea') }}"
            />
            <input 
                type="text" 
                name="estado_tarea" 
                placeholder="Estado" 
                class="form-control mb-2" 
                value="{{ old('estado_tarea') }}"
            />
            <input 
                type="text" 
                name="descripcion_tarea" 
                placeholder="Descripcion" 
                class="form-control mb-2" 
                value="{{ old('descripcion_tarea') }}"
                />
            <input  
                type="text" 
                name="observacion_tarea" 
                placeholder="Observacion" 
                class="form-control mb-2" 
                value="{{ old('observacion_tarea') }}"
                />
            <input  
                type="text" 
                name="id_padre_tarea" 
                placeholder="Tarea Padre" 
                class="form-control mb-2" 
                value="{{ old('id_padre_tarea') }}"
                />
            <button class="btn btn-primary btn-block mb-2" type="submit">Agregar</button>
        </form>
       

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Versión</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Observación</th>
                    <th scope="col">Tarea Padre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tareas as $item)
            <tr>
                <th scope="row">{{$item->id_tarea }}</th>
                <td>{{$item->version_tarea }}</td>
                <td>{{$item->prioridad_tarea }}</td>
                <td>{{$item->estado_tarea }}</td>
                <td>{{$item->descripcion_tarea }}</td>
                <td>{{$item->observacion_tarea }}</td>
                <td>{{$item->id_padre_tarea }}</td>
                <td><a href="{{ route('tareas.editarTarea', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tareas.eliminarTarea', $item) }}" method="POST" class="d-inline"> 
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tareas->links() }}<!--Boton de paginacion-->
@endsection
 