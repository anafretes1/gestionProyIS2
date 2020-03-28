<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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




Route::get('configuracion', 'PagesController@configuracion')->name('config');

//////////////////////////////////////////////////////prueba login
Route::resource('usuarios', 'UsersController');



