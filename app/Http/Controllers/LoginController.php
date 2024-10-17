<?php

namespace App\Http\Controllers;

use App\Models\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;



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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'contrasena' => ['required'],
        ]);
        $empleado = Empleado::where('email', $credentials['email'])->first();
        if (Auth::guard('empleado')->attempt(['email' => $credentials['email'], 'password' => $credentials['contrasena']])){
            Auth::guard('empleado')->login($empleado);
        // Obtener los permisos asignados al empleado usando Spatie
        $permisos = $empleado->getAllPermissions()->pluck('name'); // Obtén una lista de los nombres de los permisos

        // Guardar los permisos en el archivo de log
        Log::info('El usuario con email: ' . $empleado->email . ' ha iniciado sesión con los siguientes permisos: ' . $permisos->implode(', '));

            $request->session()->regenerate();
            return redirect()->intended('consultar-producto')->with('user', Auth::guard('empleado')->user());
        }
        Log::warning('Error de autenticación. Las credenciales no son válidas.', $credentials);
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function cerrarSesion(){
        return view('logout');
    }


    public function logout(Request $request)
    {
        Auth::guard('empleado')->logout();
    
        // Opcional: Regenerar la sesión y redirigir al usuario
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login'); // Redirige a la página de login o a donde desees
    }
}
