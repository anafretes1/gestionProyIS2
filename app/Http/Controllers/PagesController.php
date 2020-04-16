<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
class PagesController extends Controller
{
    public function inicio()
    {
        return view('welcome');
    }
    public function permisos(){
        $permisos = App\Permission::paginate(3);//metodo para la paginacion
        return view('permisos',compact('permisos'));
    }
    public function roles(){
        $roles = App\Role::paginate(3);
        return view('roles',compact('roles'));
    }
    public function administracion(){
        $administracion = App\Administracion::paginate(3);
        return view('administracion',compact('administracion'));
    }
    public function desarrollo(){
        $desarrollo = App\Desarrollo::paginate(3);
        return view('desarrollo',compact('desarrollo'));
    }
    public function proyectos(){
        $proyectos = App\Proyecto::paginate(3);
        $estados = App\Estado::all();
        $tareas = App\Tarea::all();
        //$prueba = App\Proyecto::find(3)->estado;// busca  el id del estado al proyecto
        
        return view('proyectos',compact('proyectos','estados','tareas'));
    }
    public function tareas(){
        $tareas = App\Tarea::paginate(3);
        $estados = App\Estado::all();

        return view('tareas',compact('tareas','estados'));
    }
    public function estados(){
        $estados = App\Estado::paginate(3);
        return view('estados',compact('estados'));
    }

    public function configuracion(){
        return view('configuracion');
    }

    public function lineasBases(){
        $lineasbases = App\LineaBase::paginate(3);
        $proyectos = App\Proyecto::all();
        $tareas = App\Tarea::all();
        return view('lineasBases',compact('proyectos','tareas','lineasbases'));
    }


    public function crear(Request $request)
    {
        // return $request->all();
        //validaciones de los campos "name" de los inputs     name="nombre_permiso"
        $request->validate([
            'name' => 'required'
        ]);
        $permisoNuevo = new App\Permiso;
        $permisoNuevo->name = $request->name;
        //$permisoNuevo->guard_name = 'web'; //$request->descripcion_permiso;
        $permisoNuevo->save();
        return back()->with('mensaje', 'Permiso agregado!!!');
    }
    public function crearRol(Request $request)
    {
        // return $request->all();
        //validaciones de los campos "name" de los inputs     name="nombre_permiso"
        $request->validate([
            'name' => 'required'
            //'descripcion_rol' => 'required'
        ]);
        $rolNuevo = new App\Role;
        $rolNuevo->name = $request->name;
        $rolNuevo->guard_name = 'web';///agregado solucion al error null de la bd 
        //$rolNuevo->descripcion_rol = $request->descripcion_rol;
        $rolNuevo->save();
        return back()->with('mensaje', 'Rol agregado!!!');
    }
    public function crearProyecto(Request $request)
    { 
        $request->validate([
            'nombre_proyecto' => 'required',
            'descripcion_proyecto' => 'required'
        ]);
        $proyectoNuevo = new App\Proyecto;
        $proyectoNuevo->nombre_proyecto = $request->nombre_proyecto;
        $proyectoNuevo->descripcion_proyecto = $request->descripcion_proyecto;
        $proyectoNuevo->fecha_inicio = $request->fecha_inicio;
        $proyectoNuevo->fecha_fin_estimada = $request->fecha_fin_estimada;
        $proyectoNuevo->estado_id = $request->estado_id;
        $proyectoNuevo->tarea_id = $request->tarea_id;
        //dd($proyectoNuevo);
        $proyectoNuevo->save();
        return back()->with('mensaje', 'Proyecto agregado!!!');
    }
    public function crearTarea(Request $request)
    {
        $tareaNuevo = new App\Tarea;
        $tareaNuevo->version_tarea = $request->version_tarea;
        $tareaNuevo->prioridad_tarea = $request->prioridad_tarea;
        $tareaNuevo->estado_tarea = $request->estado_tarea;
        $tareaNuevo->descripcion_tarea = $request->descripcion_tarea;
        $tareaNuevo->observacion_tarea = $request->observacion_tarea;
        $tareaNuevo->tarea_id = $request->tarea_id;
        $tareaNuevo->save();
        return back()->with('mensaje', 'Tarea agregada!!!');
    }
    public function crearEstado(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $estadoNuevo = new App\Estado;
        $estadoNuevo->nombre = $request->nombre;
        $estadoNuevo->save();
        return back()->with('mensaje', 'Estado agregado!!!');
    }
    public function crearLineaBase(Request $request)
    { 
        $request->validate([
            'nombre' => 'required'
        ]);
        $lineabaseNuevo = new App\LineaBase;
        $lineabaseNuevo->nombre = $request->nombre;
        $lineabaseNuevo->proyecto_id = $request->proyecto_id;
        $lineabaseNuevo->tarea_id = $request->tarea_id;
        $lineabaseNuevo->save();
        return back()->with('mensaje', 'Linea Base agregada!!!');
    }

                                        //SECCION EDITAR

    public function editar($id)
    {
        $permisos = App\Permiso::findOrFail($id);
            return view('editar', compact('permisos'));
    }                         
    public function update(Request $request, $id)
    {
        $permisoUpdate = App\Permiso::findOrFail($id);
        //$permisoUpdate->nombre_permiso = $request->nombre_permiso;
        //$permisoUpdate->descripcion_permiso = $request->descripcion_permiso;
        $permisoUpdate->name = $request->name;
        // $permisoUpdate->guard_name = 'web'; //$request->descripcion_permiso;
        $permisoUpdate->save();
            return back()->with('mensaje', 'Permiso Editado!!!');
    }
    public function editarRol($id)
    {
        $roles = App\Role::findOrFail($id);
            return view('editarRol', compact('roles'));
    }                         
    public function updateRol(Request $request, $id)
    {
        $rolUpdate = App\Role::findOrFail($id);
        $rolUpdate->name = $request->name;
        //$rolUpdate->descripcion_rol = $request->descripcion_rol;
        $rolUpdate->save();
            return back()->with('mensaje', 'Rol Editado!!!');
    }
    public function editarProyecto($id)
    {
        $proyectos = App\Proyecto::findOrFail($id);
        $estados = App\Estado::all();//->pluck('nombre');
        $tareas = App\Tarea::all();

        return view('editarProyecto', compact('proyectos','estados','tareas'));
    }                         
    public function updateProyecto(Request $request, $id)
    {
        $proyectoUpdate = App\Proyecto::findOrFail($id);
        $proyectoUpdate->nombre_proyecto = $request->nombre_proyecto;
        $proyectoUpdate->descripcion_proyecto = $request->descripcion_proyecto;
        $proyectoUpdate->fecha_inicio = $request->fecha_inicio;
        $proyectoUpdate->fecha_fin_estimada = $request->fecha_fin_estimada;
        $proyectoUpdate->estado_id = $request->estado_id;
        $proyectoUpdate->tarea_id = $request->tarea_id;
        //dd($proyectoUpdate);

        $proyectoUpdate->save();
            return back()->with('mensaje', 'Proyecto Editado!!!');
    }

    public function editarTarea($id)
    {
        $tareas = App\Tarea::findOrFail($id);
        $estados = App\Estado::all();//->pluck('nombre');
        return view('editarTarea', compact('tareas','estados'));
    }  
    public function updateTarea(Request $request, $id)
    {
        $tareaUpdate = App\Tarea::findOrFail($id);
        $tareaUpdate->version_tarea = $request->version_tarea;
        $tareaUpdate->prioridad_tarea = $request->prioridad_tarea;
        $tareaUpdate->estado_tarea = $request->estado_tarea;
        $tareaUpdate->descripcion_tarea = $request->descripcion_tarea;
        $tareaUpdate->observacion_tarea = $request->observacion_tarea;
        $tareaUpdate->tarea_id = $request->tarea_id;
        $tareaUpdate->save();
            return back()->with('mensaje', 'Tarea Editada!!!');
    }
    public function editarEstado($id)
    {
        $estados = App\Estado::findOrFail($id);
            return view('editarEstado', compact('estados'));
    }                         
    public function updateEstado(Request $request, $id)
    {
        $estadoUpdate = App\Estado::findOrFail($id);
        $estadoUpdate->nombre = $request->nombre;
        $estadoUpdate->save();
            return back()->with('mensaje', 'Estado Editado!!!');
    }
    public function editarLineaBase($id)
    {
        $lineasbases = App\LineaBase::findOrFail($id);
        $proyectos = App\Proyecto::all();
        $tareas = App\Tarea::all();

        return view('editarLineaBase', compact('proyectos','tareas','lineasbases'));
    }                         
    public function updateLineaBase(Request $request, $id)
    {
        $lineabaseUpdate = App\LineaBase::findOrFail($id);
        $lineabaseUpdate->nombre = $request->nombre;
        $lineabaseUpdate->proyecto_id = $request->proyecto_id;
        $lineabaseUpdate->tarea_id = $request->tarea_id;
        $lineabaseUpdate->save();
            return back()->with('mensaje', 'Linea base Editada!!!');
    }




                        //SECCION ELIMINAR
    public function eliminar($id)
    {
        $permisoEliminar = App\Permiso::findOrFail($id);
        $permisoEliminar->delete();
        return back()->with('mensaje', 'Permiso Eliminado!!!');
    }
    public function eliminarRol($id)
    {
        $rolEliminar = App\Role::findOrFail($id);
        $rolEliminar->delete();
        return back()->with('mensaje', 'Rol Eliminado!!!');
    }
    public function eliminarProyecto($id)
    {
        $proyectoEliminar = App\Proyecto::findOrFail($id);
        $proyectoEliminar->delete();
        return back()->with('mensaje', 'Proyecto Eliminado!!!');
    }
    public function eliminarTarea($id)
    {
        $tareaEliminar = App\Tarea::findOrFail($id);
        $tareaEliminar->delete();
        return back()->with('mensaje', 'Tarea Eliminada!!!');
    }
    public function eliminarEstado($id)
    {
        $estadoEliminar = App\Estado::findOrFail($id);
        $estadoEliminar->delete();
        return back()->with('mensaje', 'Estado Eliminado!!!');
    }
    public function eliminarLineaBase($id)
    {
        $lineabaseEliminar = App\LineaBase::findOrFail($id);
        $lineabaseEliminar->delete();
        return back()->with('mensaje', 'Linea Base Eliminada!!!');
    }





}
