<?php

namespace App\Http\Controllers;

use App\Models\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;



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
        $credentials = $request->only('email', 'contrasena');
        $empleado = Empleado::where('email', $credentials['email'])->first();
    
        Log::info('Empleado encontrado:', (array) $empleado);

        if ($empleado && Hash::check($credentials['contrasena'], $empleado->contrasena)) {
            Auth::guard('empleado')->login($empleado); 
            $rol = $empleado->role; // Obtener el rol
            $permisos = $empleado->permissions; // Obtener los permisos
        
            dd($rol, $permisos); // Verificar rol y permisos
            return redirect()->intended('consultar-producto');  
        } else {
            return redirect('registro-producto')->withErrors(['error' => 'Credenciales incorrectas']);
        }
    }

    public function logout(Request $request){

    }

}
