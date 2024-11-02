<?php

use App\Models\Cliente;
use App\Http\Controllers\AlmacenajeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ExhibicionController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReporteController;
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
        'profile_image' => $user_google->avatar
    ]);

    Auth::guard('cliente')->login($user);
    return redirect('/');
});

//Pagina donde se mostrarán los productos
Route::get('/',[ExhibicionController::class,'dashboard'])->name('principal');

//Rutas para producto
Route::get('producto/create',[ProductoController::class,'create'])
    ->middleware(['auth:empleado','can:crear producto,crud producto'])
    ->name('producto.create');
Route::post('producto',[ProductoController::class,'store'])->name('producto.store');

Route::get('producto/{id}/edit',[ProductoController::class,'edit'])
    ->middleware(['auth:empleado','can:crud producto,editar producto'])
    ->name('producto.edit');
Route::put('producto/{id}',[ProductoController::class,'update'])->name('producto.update');

Route::delete('producto/{id}', [ProductoController::class, 'destroy'])
    ->middleware(['auth:empleado','can:crud producto,eliminar producto'])
    ->name('producto.destroy');

Route::get('consultar-producto', [ProductoController::class, 'consultarProducto'])
    ->middleware(['auth:empleado', 'can:crud producto,consultar producto'])
    ->name('consultar-producto');


//Rutas para almacenaje
Route::get('almacenaje/create',[AlmacenajeController::class,'create'])
    ->middleware(['auth:empleado','can:crud almacenaje,crear almacenaje'])
    ->name('almacenaje.create');
Route::post('almacenaje',[AlmacenajeController::class,'store'])->name('almacenaje.store');

Route::get('almacenaje/{id}/edit',[AlmacenajeController::class,'edit'])
    ->middleware(['auth:empleado','can:crud almacenaje,editar almacenaje'])
    ->name('almacenaje.edit');
Route::put('almacenaje/{id}',[AlmacenajeController::class,'update'])->name('almacenaje.update');

Route::delete('almacenaje/{id}', [AlmacenajeController::class, 'destroy'])
    ->middleware(['auth:empleado','can:crud almacenaje,eliminar almacenaje'])
    ->name('almacenaje.destroy');

Route::get('consultar-almacenaje', [AlmacenajeController::class, 'consultarAlmacenaje'])
    ->middleware(['auth:empleado','can:crud almacenaje,consultar almacenaje'])
    ->name('consultar-almacenaje');


//Rutas para horario
Route::get('horario/create',[HorarioController::class,'create'])
    ->middleware(['auth:empleado','can:crud horario,crear horario'])
    ->name('horario.create');
Route::post('horario',[HorarioController::class,'store'])->name('horario.store');

Route::get('horario/{id}/edit',[HorarioController::class,'edit'])
    ->middleware(['auth:empleado','can:crud horario,editar horario'])
    ->name('horario.edit');
Route::put('horario/{id}',[HorarioController::class,'update'])->name('horario.update');

Route::delete('horario/{id}', [HorarioController::class, 'destroy'])
    ->middleware(['auth:empleado','can:crud horario,eliminar horario'])
    ->name('horario.destroy');

Route::get('consultar-horario', [HorarioController::class, 'consultarHorario'])
    ->middleware(['auth:empleado','can:crud horario,consultar horario'])
    ->name('consultar-horario');


//Rutas para promocion
Route::get('promocion/create',[PromocionController::class,'create'])
    ->middleware(['auth:empleado','can:crud promocion,crear promocion'])
    ->name('promocion.create');
Route::post('promocion',[PromocionController::class,'store'])->name('promocion.store');

Route::get('promocion/{id}/edit',[PromocionController::class,'edit'])
    ->middleware(['auth:empleado','can:crud promocion,editar promocion'])
    ->name('promocion.edit');
Route::put('promocion/{id}',[PromocionController::class,'update'])->name('promocion.update');

Route::delete('promocion/{id}', [PromocionController::class, 'destroy'])
    ->middleware(['auth:empleado','can:crud promocion,eliminar promocion'])
    ->name('promocion.destroy');

Route::get('consultar-promocion', [PromocionController::class, 'consultarPromocion'])
    ->middleware(['auth:empleado','can:crud promocion,consultar promocion'])
    ->name('consultar-promocion');


//Rutas para cliente
Route::get('cliente/create',[ClienteController::class,'create'])
    ->middleware(['auth:empleado','can:crud cliente,crear cliente'])
    ->name('cliente.create');
Route::post('cliente',[ClienteController::class,'store'])->name('cliente.store');

Route::get('cliente/{id}/edit',[ClienteController::class,'edit'])
    ->middleware(['auth:empleado','can:crud cliente,editar cliente'])
    ->name('cliente.edit');
Route::put('cliente/{id}',[ClienteController::class,'update'])->name('cliente.update');

Route::delete('cliente/{id}', [ClienteController::class, 'destroy'])
    ->middleware(['auth:empleado','can:crud cliente,eliminar cliente'])
    ->name('cliente.destroy');

Route::get('consultar-cliente', [ClienteController::class, 'consultarCliente'])
    ->middleware(['auth:empleado','can:crud cliente,consultar cliente'])
    ->name('consultar-cliente');


//Rutas para empleado
Route::get('empleado/create',[EmpleadoController::class,'create'])
    ->middleware(['auth:empleado','can:crud empleado,crear empleado'])
    ->name('empleado.create');
Route::post('empleado',[EmpleadoController::class,'store'])->name('empleado.store');

Route::get('empleado/{id}/edit',[EmpleadoController::class,'edit'])
    ->middleware(['auth:empleado','can:crud empleado,editar empleado'])
    ->name('empleado.edit');
Route::put('empleado/{id}',[EmpleadoController::class,'update'])->name('empleado.update');

Route::delete('empleado/{id}', [EmpleadoController::class, 'destroy'])
    ->middleware(['auth:empleado','can:crud empleado,eliminar empleado'])
    ->name('empleado.destroy');

Route::get('consultar-empleado', [EmpleadoController::class, 'consultarEmpleado'])
    ->middleware(['auth:empleado','can:crud empleado,consultar empleado'])
    ->name('consultar-empleado');


//rutas para pedido
Route::get('pedido/create',[PedidoController::class,'create'])
    ->middleware(['auth:empleado','can:crud pedido,crear pedido'])
    ->name('pedido.create');
Route::post('empleado',[PedidoController::class,'store'])->name('pedido.store');


//Páginas para la validación de los datos insertados
Route::post('validar-registro',[LoginController::class,'validarRegistro'])->name('validar-registro');


//Página para la el inicio de sesión
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('validar-sesion',[LoginController::class,'validarSesion'])->name('validar-sesion');

//Página para registrarse
Route::get('signup',[LoginController::class,'signup'])->name('signup');
Route::post('logout',[LoginController::class,'logout'])->name('logout');


//Rutas para los reportes
Route::get('reportes', [ReporteController::class,'show'])->name('reportes.dashboard');

Route::get('reportes/ventas', [ReporteController::class,'showVentas'])->name('reportes.ventas');
Route::post('reportes/ventas-generar', [ReporteController::class,'showVentasReporte'])->name('ventas.generar');




