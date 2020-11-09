@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <h2>Bienvenido {{ Auth::user()->name }} !</h2>

                        <div class="card-deck">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                <img src="{{asset('imagenes/manager.jpg')}}" class="card-img-top" alt="manager">
                                <div class="card-body">
                                    <!--<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                                    <a href="{{ route('administracion') }}" class="btn btn-light">ADMINISTRACIÓN</a>

                                </div>
                            </div>
                            <div  class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <img src="{{asset('imagenes/desarrollo.jpg')}}" class="card-img-top" alt="desarrollo">
                                <div class="card-body">
                                    <a href="{{ route('desarrollo') }}" class="btn btn-light">DESARROLLO</a>

                                </div>
                            </div>
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <img src="{{asset('imagenes/logo.jpg')}}" class="card-img-top" alt="logo">
                                <div class="card-body">
                                    <a href="{{ route('config') }}" class="btn btn-light">CONFIGURACION</a>

                                </div>
                            </div>
                        </div>



                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
