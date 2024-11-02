<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class exhibicionController extends Controller
{
    public function dashboard(){
        if (Auth::guard('empleado')->check()) {
            // Usamos el guard 'empleado' para autenticar
            $user = Auth::guard('empleado')->user();
            return view('index', ['user' => $user]);  // Pasas la variable 'user' a la vista
        } else {
            return view('index');
        }
    }
}
