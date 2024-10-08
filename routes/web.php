<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasteleriaController;
use App\Http\Controllers\ProductoController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});


//Pagina donde se mostrarán los productos
Route::get('principal',function(){
    return "Hola";
})->name('principal');




//Páginas para la validación de los datos insertados
Route::post('validar-registro',[LoginController::class,'validarRegistro'])->name('validar-registro');

//Rutas para producto
Route::post('validar-producto',[ProductoController::class,'validarProducto'])->name('validar-producto');
Route::get('registro-producto',[ProductoController::class,'producto'])->name('registro-producto');

Route::middleware(['auth:empleado', 'can:crud tablas'])->group(function () {
    Route::get('consultar-producto', [ProductoController::class, 'consultarProducto'])->name('consultar-producto');
});


Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);
Route::get('editar-producto/{id}',[ProductoController::class,'editarProducto'])->name('editar-producto');
Route::post('actualizar-producto/{id}',[ProductoController::class,'actualizarProducto'])->name('actualizar-producto');

 

//paginas para el logeo
Route::get('login-google', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('google-callback', function () {
    $user = Socialite::driver('google')->user();
 
    dd($user);
    //$user->token
});


//Página para la el inicio de sesión
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('validar-sesion',[LoginController::class,'validarSesion'])->name('validar-sesion');

//Página para registrarse
Route::get('signup',[LoginController::class,'signup'])->name('signup');
Route::get('cerrar-sesion',[LoginController::class,'cerrarSesion'])->name('cerrar-sesion');
Route::post('logout',[LoginController::class,'logout'])->name('logout');
