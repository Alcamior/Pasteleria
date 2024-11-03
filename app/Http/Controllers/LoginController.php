<?php

namespace App\Http\Controllers;

use App\Models\Empleado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Requests\StoreLogin;


class LoginController extends Controller
{
    use HasFactory, HasRoles; 

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

    public function validarSesion(Request $request)
    {
        //validar las credenciales
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'contrasena' => ['required','string'],
        ],[
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'contrasena.required' => 'El campo contraseña es obligatorio.',
        ]);

        $empleado = Empleado::where('email', $credentials['email'])->first();

        //Realizando el intento de autenticación
        if (Auth::guard('empleado')->attempt(['email' => $credentials['email'], 'password' => $credentials['contrasena']])){
            Auth::guard('empleado')->login($empleado);

            $request->session()->regenerate();
            return redirect()->intended('/')->with('user', Auth::guard('empleado')->user());
        }

    // Devolver error de autenticación
    return back()->withErrors(['usuario' => 'Las credenciales proporcionadas son incorrectas.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('empleado')->logout();
    
        //Regenerar la sesión y redirigir al usuario
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/'); // Redirige a la página principal
    }

    public function stencil(){
        return view('layaout/stencil');
    }
}
