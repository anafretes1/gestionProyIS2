<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    //public function __construct()
    //{
    //    $this->middleware(['permission:create user'], ['only' => ['create', 'store']]);
    //    $this->middleware(['permission:read users'], ['only' => 'index']);
    //    $this->middleware(['permission:update user'], ['only' => ['edit', 'update']]);
    //    $this->middleware(['permission:delete user'], ['only' => 'delete']);
    //}

    public function index()
    {
        $users = User::paginate(3);//metodo para la paginacion
        return view('usuarios.index', compact('users'));
    }
    
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);

        if ($usuario->save()) {
          // asignar el rol
          $usuario->assignRole($request->rol);
          return redirect('/usuarios');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Role::all()->pluck('name', 'id');
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if ($request->password != null) {
            $usuario->password = $request->password;
        }
        $usuario->syncRoles($request->rol);
        $usuario->save();
        return redirect('/usuarios');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->removeRole($usuario->roles->implode('name', ', '));
        if ($usuario->delete()) {
            return redirect('/usuarios');
        }
        else {
            return response()->json([
                'mensaje' => 'Error al eliminar el usuario.'
            ]); 
        }
    }
}
