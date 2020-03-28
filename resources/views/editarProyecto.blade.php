@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-16">
        <div class="card">
          <div class="card-header"><h1>Editar Proyecto</h1></div>
            <div class="card-body">
              @if (session('mensaje'))
                <div class="alert alert-success">
                  {{ session('mensaje') }}
                </div>
              @endif
              <form action="{{ route('proyectos.updateProyecto', $proyectos->id) }}" method="POST">
                @method('PUT')
                @csrf

                @error('nombre')
                    <div class="alert alert-danger">
                        El nombre es obligatorio
                    </div>
                @enderror

                @error('descripcion')
                    <div class="alert alert-danger">
                        La descripción es obligatoria
                    </div>
                @enderror
                <div class="form-group">
                  <label for="nombre_proyecto">Nombre</label>
                    <input type="text" name="nombre_proyecto" placeholder="Nombre del Proyecto" class="form-control mb-2" value="{{ $proyectos->nombre_proyecto }}">
                </div>
                <div class="form-group">
                  <label for="descripcion_proyecto">Descripcion</label>
                    <input type="text" name="descripcion_proyecto" placeholder="Descripcion del Proyecto" class="form-control mb-2" value="{{ $proyectos->descripcion_proyecto }}">
                </div>
                <div class="form-group">
                  <label for="fecha_inicio">Fecha Inicio</label>
                    <input type="text" name="fecha_inicio" placeholder="Fecha Inicio" class="form-control mb-2" value="{{ $proyectos->fecha_inicio }}">
                </div>
                <div class="form-group">
                  <label for="fecha_fin_estimada">Fecha Fin</label>
                    <input type="text" name="fecha_fin_estimada" placeholder="Fecha Fin estimada" class="form-control mb-2" value="{{ $proyectos->fecha_fin_estimada }}">
                </div>
                <div class="form-group">
                  <label for="anho_proyecto">Año</label>
                    <input type="number"  name="anho_proyecto" placeholder="Año del Proyecto" class="form-control mb-2"  value="{{ old('anho_proyecto') }}"/>
                </div>
                <div class="form-group">
                  <label for="estado_proyecto">Estado</label>
                      <select class="form-control" name="estado_proyecto" >
                        <option value="">-- Asignar el estado --</option>
                          @foreach ($estados as $key)
                            <option value="{{ $key['nombre'] }}">{{ $key['nombre'] }}</option>
                          @endforeach
                        </select>
                  </div>
                <div class="form-group">
                  <label for="nombre_proyecto">Nombre</label>
                    <input type="text" name="id_fase" placeholder="Fase" class="form-control mb-2" value="{{ $proyectos->id_fase }}">
                </div>
                <button class="btn btn-warning btn-block mb-2" type="submit">Editar</button>
              </form>
            </div>
          </div>
          <a href="{{ url('desarrollo/proyectos') }}" class="btn btn-primary">ATRAS</a>
        </div>
      </div>
    </div>
  </div>
@endsection
