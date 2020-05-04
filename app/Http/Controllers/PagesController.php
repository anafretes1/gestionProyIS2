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
        $tareas = App\Tarea::all();
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

    public function agregarTarea(){
        $proyectos = App\Proyecto::findOrFail($id);

        return view('agregarTarea',compact('proyectos'));
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
        //$proyectoNuevo->lineabase_id = $request->lineabase_id;
        //$proyectoNuevo->tarea_id = $request->tarea_id;
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
        $tareaNuevo->fecha_inicio = $request->fecha_inicio;
        $tareaNuevo->fecha_fin = $request->fecha_fin;
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
        $lineabaseNuevo->fecha_inicio = $request->fecha_inicio;
        $lineabaseNuevo->fecha_fin = $request->fecha_fin;
        //$lineabaseNuevo->proyecto_id = $request->proyecto_id;
        //$lineabaseNuevo->tarea_id = $request->tarea_id;
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
        //$proyectoUpdate->tarea_id = $request->tarea_id;
        //dd($proyectoUpdate);

        $proyectoUpdate->save();
            return back()->with('mensaje', 'Proyecto Editado!!!');
    }

    public function editarTarea($id)
    {
        $tareas = App\Tarea::findOrFail($id);
        $estados = App\Estado::all();//->pluck('nombre');
        $proyectos = App\Proyecto::all();//agregado para prueba de asignacion
        $tareasTodo = App\Tarea::all();//->pluck('nombre');

        return view('editarTarea', compact('tareas','estados','proyectos','tareasTodo'));
    }  
    public function updateTarea(Request $request, $id)
    {
        $tareaUpdate = App\Tarea::findOrFail($id);
        $tareaUpdate->proyecto_id = $request->proyecto_id;
        $tareaUpdate->version_tarea = $request->version_tarea;
        $tareaUpdate->prioridad_tarea = $request->prioridad_tarea;
        $tareaUpdate->estado_tarea = $request->estado_tarea;
        $tareaUpdate->descripcion_tarea = $request->descripcion_tarea;
        $tareaUpdate->observacion_tarea = $request->observacion_tarea;
        $tareaUpdate->tarea_id = $request->tarea_id;
        $tareaUpdate->fecha_inicio = $request->fecha_inicio;
        $tareaUpdate->fecha_fin = $request->fecha_fin;
        $tareaUpdate->save();
            return back()->with('mensaje', 'Tarea Editada!!!');
    }
//PRUEBA - EDITAR EL ESTADO DE LA TAREA ---    ELIMINAR
/*
public function editarTareaProyecto( $idProyecto)
{
    $proyecto = App\Proyecto::findOrFail($idProyecto);// devuelve datos del proyecto
    $tareas = App\Tarea::findOrFail($idProyecto);//este esta mal no se puede utilizar el mismo id para proyectos y tareas
    $tareasAll = App\Tarea::all();  //todas las tareas
    $estados = App\Estado::all();//->pluck('nombre');
    //$tareass = $tareas->proyecto;
    $tareasAsignadas = $proyecto->tareas; // las tareas correspondientes al id del proyecto recibido
    //echo $tareasAsignadas;
   //echo $tareass;
   // echo  $proyecto->tareas;
    return view('editarTareaProyecto', compact('tareas','tareasAsignadas','proyecto','tareasAll','estados'));
}  
public function updateTareaProyecto(Request $request, $idTarea)//recibe id de tarea
{
    
    $tareaUpdate = App\Tarea::findOrFail($idTarea);
    //$tareaUpdate = $tareaUpda->tareas; 
    $tareaUpdate->proyecto_id = $request->$idTarea;
    //echo($tareaUpdate);

    //$tareaUpdate->version_tarea = $request->version_tarea;
    //$tareaUpdate->prioridad_tarea = $request->prioridad_tarea;
    //$tareaUpdate->estado_tarea = $request->estado_tarea;
    //$tareaUpdate->descripcion_tarea = $request->descripcion_tarea;
    //$tareaUpdate->observacion_tarea = $request->observacion_tarea;
    //$tareaUpdate->tarea_id = $request->tarea_id;
    //   echo $id;// retorna el id del proyecto
      // echo $tareaUpdate;
    $tareaUpdate->save();
    return back()->with('mensaje', 'TAREA ASIGNADA - PROY!!!');
        
}*/
public function editarTareaProyecto($id)
{
    $tareas = App\Tarea::findOrFail($id);
    $estados = App\Estado::all();//->pluck('nombre');
    $proyectos = App\Proyecto::all();//agregado para prueba de asignacion
    $tareasTodo = App\Tarea::all();//->pluck('nombre');

    return view('editarTareaProyecto', compact('tareas','estados','proyectos','tareasTodo'));
}  
public function updateTareaProyecto(Request $request, $id)
{
    $tareaUpdate = App\Tarea::findOrFail($id);
    $tareaUpdate->proyecto_id = $request->proyecto_id;
    $tareaUpdate->version_tarea = $request->version_tarea;
    $tareaUpdate->prioridad_tarea = $request->prioridad_tarea;
    $tareaUpdate->estado_tarea = $request->estado_tarea;
    $tareaUpdate->descripcion_tarea = $request->descripcion_tarea;
    $tareaUpdate->observacion_tarea = $request->observacion_tarea;
    $tareaUpdate->tarea_id = $request->tarea_id;

    $tareaUpdate->save();
        return back()->with('mensaje', 'Tarea Editada!!!');
}

/////////////////asignar linea base 
public function editarTareaLineaBase($id)
{
    $lineaBase = App\LineaBase::all();
    $tareas = App\Tarea::findOrFail($id);
    $estados = App\Estado::all();//->pluck('nombre');
    $proyectos = App\Proyecto::all();//agregado para prueba de asignacion
    $tareasTodo = App\Tarea::all();//->pluck('nombre');

    return view('editarTareaLineaBase', compact('tareas','estados','proyectos','tareasTodo','lineaBase'));
} 
public function updateTareaLineaBase(Request $request, $id)
{
    $tareaUpdate = App\Tarea::findOrFail($id);
    $tareaUpdate->proyecto_id = $request->proyecto_id;
    $tareaUpdate->version_tarea = $request->version_tarea;
    $tareaUpdate->prioridad_tarea = $request->prioridad_tarea;
    $tareaUpdate->estado_tarea = $request->estado_tarea;
    $tareaUpdate->descripcion_tarea = $request->descripcion_tarea;
    $tareaUpdate->observacion_tarea = $request->observacion_tarea;
    $tareaUpdate->tarea_id = $request->tarea_id;
    $tareaUpdate->base_id = $request->base_id;
    $tareaUpdate->save();
        return back()->with('mensaje', 'Tarea Editada!!!');
}



public function eliminarTareaProyecto($id)// ver para no eliminar modificar el campo proyecto_id a NULL
    {
        $tareaEliminar = App\Tarea::findOrFail($id);
        $tareaEliminar->delete();
        return back()->with('mensaje', 'Tarea Eliminada!!!');
    }

    
public function asignaciones()
{
    $tareas = App\Tarea::all();
    $estados = App\Estado::all();
    return view('asignarTareaProyecto',compact('tareas','estados'));
}
public function asignacionesLineaBase()
{
    $tareas = App\Tarea::all();
    $estados = App\Estado::all();
    return view('asignarTareaLineaBase',compact('tareas','estados'));
}
/*
public function statusLineaBase()
{
    $tareas = App\Tarea::all();
    $base = App\LineaBase::all();// datos de la linea base
    $tareasProyecto = App\Proyecto::findOrFail(1)->tareas;// todas las tareas asignadas al proyecto id=1

    echo  $baseTarea;
    //return view('pruebas/statusLineaBase',compact('tareas','estados'));
}
*/

/////////////////////////////////////////////







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
        $lineabaseUpdate->fecha_inicio = $request->fecha_inicio;
        $lineabaseUpdate->fecha_fin = $request->fecha_fin;
        //$lineabaseUpdate->proyecto_id = $request->proyecto_id;
        //$lineabaseUpdate->tarea_id = $request->tarea_id;
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



// Prueba status de las lineas bases 04/05/2020

public function verLineaBase($id)
    {
        $lineasbases = App\LineaBase::findOrFail($id);// datos sobre la linea base con id =$id
       // $tareasProyecto = App\Proyecto::findOrFail($id)->tareas;// todas las tareas asignadas al proyecto id=1
        //$proyecto = App\Tarea::findOrFail($id)->proyecto;//datps del proyecto asinado a la tarea id=$id

        $tareasLineasBases = App\LineaBase::findOrFail($id)->tareas;// todas las tareas asignadas a la lb id=1
        //$tareasProyecto = App\Tarea::findOrFail($id)->lineabase;//datps del proyecto asinado a la tarea id=$id

        //echo $lineasbases;
        return view('verLineaBase', compact('tareasLineasBases','lineasbases'));
    } 








}
