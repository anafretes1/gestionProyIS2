@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Editar Rol Id= {{ $roles->id }}</h1></div>
                    <div class="card-body">
                        @if (session('mensaje'))
                            <div class="alert alert-success">
                                {{ session('mensaje') }}
                            </div>
                        @endif
                        <form action="{{ route('roles.updateRol', $roles->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @error('nombre')
                        <div class="alert alert-danger">
                            El nombre es obligatorio
                        </div>
                        @enderror
                       <!-- @error('descripcion')
                            <div class="alert alert-danger">
                                La descripción es obligatoria
                            </div>
                        @enderror-->
                        <div class="form-group">
                        <input type="text" name="name" placeholder="Nombre" class="form-control mb-2" value="{{ $roles->name }}">
                        <!-- <input type="text" name="descripcion_rol" placeholder="Descripcion" class="form-control mb-2" 
                        value="{{ $roles->descripcion_rol }}">-->
                        <div class="justify-content-end">
                            <button class="btn btn-success btn-inline-block" type="submit">Editar</button>
                        </div>
                        </div>
                        </form>
                    </div>
                    </div>
                    <a href="{{ url('administracion/roles') }}" class="btn btn-primary">ATRAS</a>
                </div>
            </div>
        </div>
    </div>
@endsection