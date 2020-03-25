<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <!-- BARRA DE NAVEGACION -->
  <div class="container my-4">
    <a href="{{ route('inicio') }}" class="btn btn-outline-primary">INICIO</a>

    <!--<a href="{{ route('administracion') }}" class="btn btn-primary">ADMINISTRACIÓN</a>-->
    <!--<a href="{{ route('permiso') }}" class="btn btn-primary">PERMISOS</a>
    <a href="{{ route('rol') }}" class="btn btn-primary">ROLES</a>-->

    <!--<a href="{{ route('desarrollo') }}" class="btn btn-primary">DESARROLLO</a>-->
    <!--<a href="{{ route('proyecto') }}" class="btn btn-primary">PROYECTOS</a>
    <a href="{{ route('tarea') }}" class="btn btn-primary">TAREAS</a>-->
    
    <!--<a href="{{ route('config') }}" class="btn btn-primary">CONFIGURACION</a>-->

  </div>
    <div class="container my-4">
        <!-- Plantilla Maestra de estilos, yield extiende el contenido dinamico -->
        @yield('seccion') 
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>