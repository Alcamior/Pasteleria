<?php

use App\Http\Controllers\AlmacenajeController;
use App\Http\Controllers\HorarioController;
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
Route::get('producto/create',[ProductoController::class,'create'])->name('producto.create');
Route::post('producto',[ProductoController::class,'store'])->name('producto.store');

Route::get('producto/{id}/edit',[ProductoController::class,'edit'])->name('producto.edit');
Route::put('producto/{id}',[ProductoController::class,'update'])->name('producto.update');
Route::delete('producto/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');

Route::middleware(['auth:empleado', 'can:crud tablas'])->group(function () {
    Route::get('consultar-producto', [ProductoController::class, 'consultarProducto'])->name('consultar-producto');
});


//Rutas para almacenaje
Route::get('almacenaje/create',[AlmacenajeController::class,'create'])->name('almacenaje.create');
Route::post('almacenaje',[AlmacenajeController::class,'store'])->name('almacenaje.store');

Route::get('almacenaje/{id}/edit',[AlmacenajeController::class,'edit'])->name('almacenaje.edit');
Route::put('almacenaje/{id}',[AlmacenajeController::class,'update'])->name('almacenaje.update');
Route::delete('almacenaje/{id}', [AlmacenajeController::class, 'destroy'])->name('almacenaje.destroy');

Route::middleware(['auth:empleado', 'can:crud tablas'])->group(function () {
    Route::get('consultar-almacenaje', [AlmacenajeController::class, 'consultarAlmacenaje'])->name('consultar-almacenaje');
});


//Rutas para horario
Route::get('horario/create',[HorarioController::class,'create'])->name('horario.create');
Route::post('horario',[HorarioController::class,'store'])->name('horario.store');

Route::get('horario/{id}/edit',[HorarioController::class,'edit'])->name('horario.edit');
Route::put('horario/{id}',[HorarioController::class,'update'])->name('horario.update');
Route::delete('horario/{id}', [HorarioController::class, 'destroy'])->name('horario.destroy');

Route::middleware(['auth:empleado', 'can:crud tablas'])->group(function () {
    Route::get('consultar-horario', [HorarioController::class, 'consultarHorario'])->name('consultar-horario');
});


 

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
