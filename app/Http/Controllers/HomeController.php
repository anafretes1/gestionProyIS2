<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /*$user = Auth::user();
        $rol = $user->roles->implode('name', ', ');
        switch ($rol)
        {
          case 'super-admin':
            $saludo = 'Bienvenido super-admin';
            return view('home', compact('saludo'));
            break;
          case 'moderador':
            $saludo = 'Bienvenido moderador';
            return view('home', compact('saludo'));
            break;
          case 'editor':
            $saludo = 'Bienvenido editor';
            return view('home', compact('saludo'));
            break;
        }*/
        return view('home');
    }
}
