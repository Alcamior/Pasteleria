<?php

namespace App\Http\Controllers;

use App\Models\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function validarRegistro(Request $request){
        $empleado = new Empleado();
        $empleado -> nombre = $request->nombre;
        $empleado -> ap = $request->ap;
        $empleado -> am = $request->am;
        $empleado -> telefono = $request->telefono;
        $empleado -> email = $request -> email;
        $empleado -> contrasena = Hash::make($request->contrasena);
        $empleado -> save();

        Auth::login($empleado);
        return redirect(route('login'));
    }

    public function login(){
        return view('login');
    }

    public function validarSesion(Request $request){
        $credentials = [
            'email' => $request->email,
            'contrasena' => $request->contrasena,
        ];

        $remember=($request->has('remember')?true:false);

        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->intended();
        }else{
            return redirect('consultar-producto');  
        }
    }

    public function logout(Request $request){

    }
}
