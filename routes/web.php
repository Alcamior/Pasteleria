<?php

use App\Models\Cliente;
use App\Http\Controllers\AlmacenajeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ExhibicionController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasteleriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PromocionController;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

//Inicio de sesión con google
Route::get('login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('login-google');
 
Route::get('google-callback', function () {
    $user_google = Socialite::driver('google')->user();
    $user = Cliente::updateOrCreate([
        'google_id'=>$user_google->id,
    ],[
        'nombre'=>$user_google->name,
        'email'=>$user_google->email,
    ]);

    Auth::login($user);
    return redirect('principal');
});

//Pagina donde se mostrarán los productos
Route::get('/',[ExhibicionController::class,'dashboard'])->name('principal');

//Páginas para la validación de los datos insertados
Route::post('validar-registro',[LoginController::class,'validarRegistro'])->name('validar-registro');

//Rutas para producto
Route::get('producto/create',[ProductoController::class,'create'])->name('producto.create');
Route::post('producto',[ProductoController::class,'store'])->name('producto.store');

Route::get('producto/{id}/edit',[ProductoController::class,'edit'])->name('producto.edit');
Route::put('producto/{id}',[ProductoController::class,'update'])->name('producto.update');
Route::delete('producto/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');

Route::middleware(['auth:empleado', 'can:crud tablas'])->group(function () {
    Route::get('consultar-producto', [ProductoController::class, 'consultarProdcuto'])->name('consultar-producto');
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


//Rutas para promocion
Route::get('promocion/create',[PromocionController::class,'create'])->name('promocion.create');
Route::post('promocion',[PromocionController::class,'store'])->name('promocion.store');

Route::get('promocion/{id}/edit',[PromocionController::class,'edit'])->name('promocion.edit');
Route::put('promocion/{id}',[PromocionController::class,'update'])->name('promocion.update');
Route::delete('promocion/{id}', [PromocionController::class, 'destroy'])->name('promocion.destroy');

Route::middleware(['auth:empleado', 'can:crud promocion'])->group(function () {
    Route::get('consultar-promocion', [PromocionController::class, 'consultarPromocion'])->name('consultar-promocion');
});


//Rutas para cliente
Route::get('cliente/create',[ClienteController::class,'create'])->name('cliente.create');
Route::post('cliente',[ClienteController::class,'store'])->name('cliente.store');

Route::get('cliente/{id}/edit',[ClienteController::class,'edit'])->name('cliente.edit');
Route::put('cliente/{id}',[ClienteController::class,'update'])->name('cliente.update');
Route::delete('cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

Route::middleware(['auth:empleado', 'can:crud tablas'])->group(function () {
    Route::get('consultar-cliente', [ClienteController::class, 'consultarCliente'])->name('consultar-cliente');
});

//Rutas para empleado
Route::get('empleado/create',[EmpleadoController::class,'create'])->name('empleado.create');
Route::post('empleado',[EmpleadoController::class,'store'])->name('empleado.store');

Route::get('empleado/{id}/edit',[EmpleadoController::class,'edit'])->name('empleado.edit');
Route::put('empleado/{id}',[EmpleadoController::class,'update'])->name('empleado.update');
Route::delete('empleado/{id}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');

Route::middleware(['auth:empleado', 'can:crud tablas'])->group(function () {
    Route::get('consultar-empleado', [EmpleadoController::class, 'consultarEmpleado'])->name('consultar-empleado');
});

//rutas para pedido
Route::get('pedido/create',[PedidoController::class,'create'])->name('pedido.create');
Route::post('empleado',[PedidoController::class,'store'])->name('pedido.store');

//Página para la el inicio de sesión
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('validar-sesion',[LoginController::class,'validarSesion'])->name('validar-sesion');

//Página para registrarse
Route::get('signup',[LoginController::class,'signup'])->name('signup');
Route::get('cerrar-sesion',[LoginController::class,'cerrarSesion'])->name('cerrar-sesion');
Route::post('logout',[LoginController::class,'logout'])->name('logout');

//ELIMINAR ----------------------------------------------------------------------
Route::get('stencil',[LoginController::class,'stencil'])->name('stencil');
