<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
  //  return view('home');
//});

////////////////////////////////prueba de datatable


Route::get('/prueba2', function () {                
    $proyectos = App\Estado::find(2)->proyectos;// VERIFICADO: TRAE TODOS LOS PROYECTOS CON EL ESTADO_ID=3
    //return  $proyectos;

    $estado = App\Proyecto::find(5)->estado->nombre;
    return  $estado;
});

Route::get('/prueba3', function () {                
    $proyectos = App\Tarea::find(7)->proyecto;// VERIFICADO: TRAE TODOS LOS PROYECTOS CON EL ESTADO_ID=3
    //return  $proyectos;
    $tarea = App\Proyecto::find(8)->tareas;// VERIFICADO: TRAE TODOS LOS PROYECTOS CON EL ESTADO_ID=3
    return  $tarea;
});

//$proyecto = App\Proyecto::find(3)->proyectos;
//return view('detalle',compact('proyecto'));
       //dd($tareas);
       //echo $tareas->tareas(7)->descripcion_tarea;

Route::get('/detalle', function () {
    $tareas = App\Tarea::all();//add prueba
    $estado = App\Proyecto::find(5)->estado->nombre;
    
    return view('detalle',compact('tareas','estado'));
});


//prueba de agregar varias tareas a un proyecto
Route::get('/prueba1', function () {
    $proyectos = App\Proyecto::paginate(3);
    $estados = App\Estado::all();
    $tareas = App\Tarea::all();
    return view('pruebas/pruebaProyecto',compact('proyectos','estados','tareas'));
});
Route::get('/prueba1/pruebaProyectoTarea', function () {
    $proyectos = App\Proyecto::paginate(3);
    $estados = App\Estado::all();
    $tareas = App\Tarea::all();
    return view('pruebas/pruebaProyectoTarea',compact('proyectos','estados','tareas'));
});




//////////////////////////////////////////


Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicio');

//#########################################################################

Route::get('/', 'PagesController@inicio')->name('home');

Route::get('administracion', 'PagesController@administracion')->name('administracion');

    Route::get('administracion/permisos', 'PagesController@permisos')->name('permiso');
    Route::post('administracion/permisos', 'PagesController@crear')->name('permisos.crear');

    Route::get('administracion/roles', 'PagesController@roles')->name('rol');
    Route::post('administracion/roles', 'PagesController@crearRol')->name('roles.crearRol');

    Route::get('administracion/usuarios', 'UsersController@index')->name('usuarios');


Route::get('desarrollo', 'PagesController@desarrollo')->name('desarrollo');

    Route::get('desarrollo/proyectos', 'PagesController@proyectos')->name('proyecto');
    Route::post('desarrollo/proyectos', 'PagesController@crearProyecto')->name('proyectos.crearProyecto');

    Route::get('desarrollo/tareas', 'PagesController@tareas')->name('tarea');
    Route::post('desarrollo/tareas', 'PagesController@crearTarea')->name('tareas.crearTarea');

    Route::get('desarrollo/estados', 'PagesController@estados')->name('estado');
    Route::post('desarrollo/estados', 'PagesController@crearEstado')->name('estados.crearEstado');
///////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('configuracion', 'PagesController@configuracion')->name('config');

    Route::get('configuracion/lineasbases', 'PagesController@lineasBases')->name('lineaBase');
    Route::post('configuracion/lineasbases', 'PagesController@crearLineaBase')->name('lineasBases.crearLineaBase');

Route::get('/editarLineaBase/{id}', 'PagesController@editarLineaBase' )->name('lineasBases.editarLineaBase');
Route::put('editarLineaBase/{id}', 'PagesController@updateLineaBase' )->name('lineasBases.updateLineaBase');
Route::delete('/eliminarLineaBase/{id}', 'PagesController@eliminarLineaBase')->name('lineasBases.eliminarLineaBase');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/editar/{id}', 'PagesController@editar' )->name('permisos.editar');
Route::put('editar/{id}', 'PagesController@update' )->name('permisos.update');

Route::get('/editarRol/{id}', 'PagesController@editarRol' )->name('roles.editarRol');
Route::put('editarRol/{id}', 'PagesController@updateRol' )->name('roles.updateRol');

Route::delete('/eliminar/{id}', 'PagesController@eliminar')->name('permisos.eliminar');
Route::delete('/eliminarRol/{id}', 'PagesController@eliminarRol')->name('roles.eliminarRol');

//PROYECTO
Route::get('/editarProyecto/{id}', 'PagesController@editarProyecto' )->name('proyectos.editarProyecto');
Route::put('editarProyecto/{id}', 'PagesController@updateProyecto' )->name('proyectos.updateProyecto');
Route::delete('/eliminarProyecto/{id}', 'PagesController@eliminarProyecto')->name('proyectos.eliminarProyecto');

//TAREAS
Route::get('/editarTarea/{id}', 'PagesController@editarTarea' )->name('tareas.editarTarea');
Route::put('editarTarea/{id}', 'PagesController@updateTarea' )->name('tareas.updateTarea');
Route::delete('/eliminarTarea/{id}', 'PagesController@eliminarTarea')->name('tareas.eliminarTarea');


//ESTADOS
Route::get('/editarEstado/{id}', 'PagesController@editarEstado' )->name('estados.editarEstado');
Route::put('editarEstado/{id}', 'PagesController@updateEstado' )->name('estados.updateEstado');
Route::delete('/eliminarEstado/{id}', 'PagesController@eliminarEstado')->name('estados.eliminarEstado');





//////////////////////////////////////////////////////prueba login
Route::resource('usuarios', 'UsersController');



