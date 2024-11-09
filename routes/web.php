<?php

use App\Models\Cliente;
use App\Http\Controllers\AlmacenajeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ExhibicionController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReporteVentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasteleriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ReporteProductoController;
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
    ->middleware(['auth:empleado','can:crear producto'])
    ->name('producto.create');
Route::post('producto',[ProductoController::class,'store'])->name('producto.store');

Route::get('producto/{id}/edit',[ProductoController::class,'edit'])
    ->middleware(['auth:empleado','can:editar producto'])
    ->name('producto.edit');
Route::put('producto/{id}',[ProductoController::class,'update'])->name('producto.update');


Route::delete('producto/{id}', [ProductoController::class, 'destroy'])
    ->middleware(['auth:empleado','can:eliminar producto'])
    ->name('producto.destroy');

Route::get('consultar-producto', [ProductoController::class, 'consultarProducto'])
    ->middleware(['auth:empleado', 'can:consultar producto'])
    ->name('consultar-producto');


//Rutas para almacenaje
Route::get('almacenaje/create',[AlmacenajeController::class,'create'])
    ->middleware(['auth:empleado','can:crear almacenaje'])
    ->name('almacenaje.create');
Route::post('almacenaje',[AlmacenajeController::class,'store'])->name('almacenaje.store');

Route::get('almacenaje/{id}/edit',[AlmacenajeController::class,'edit'])
    ->middleware(['auth:empleado','can:editar almacenaje'])
    ->name('almacenaje.edit');
Route::put('almacenaje/{id}',[AlmacenajeController::class,'update'])->name('almacenaje.update');

Route::delete('almacenaje/{id}', [AlmacenajeController::class, 'destroy'])
    ->middleware(['auth:empleado','can:eliminar almacenaje'])
    ->name('almacenaje.destroy');

Route::get('consultar-almacenaje', [AlmacenajeController::class, 'consultarAlmacenaje'])
    ->middleware(['auth:empleado','can:consultar almacenaje'])
    ->name('consultar-almacenaje');


//Rutas para horario
Route::get('horario/create',[HorarioController::class,'create'])
    ->middleware(['auth:empleado','can:crear horario'])
    ->name('horario.create');
Route::post('horario',[HorarioController::class,'store'])->name('horario.store');

Route::get('horario/{id}/edit',[HorarioController::class,'edit'])
    ->middleware(['auth:empleado','can:editar horario'])
    ->name('horario.edit');
Route::put('horario/{id}',[HorarioController::class,'update'])->name('horario.update');


Route::delete('horario/{id}', [HorarioController::class, 'destroy'])
    ->middleware(['auth:empleado','can:eliminar horario'])
    ->name('horario.destroy');

Route::get('consultar-horario', [HorarioController::class, 'consultarHorario'])
    ->middleware(['auth:empleado','can:consultar horario'])
    ->name('consultar-horario');


//Rutas para promocion
Route::get('promocion/create',[PromocionController::class,'create'])
    ->middleware(['auth:empleado','can:crear promocion'])
    ->name('promocion.create');
Route::post('promocion',[PromocionController::class,'store'])->name('promocion.store');

Route::get('promocion/{id}/edit',[PromocionController::class,'edit'])
    ->middleware(['auth:empleado','can:editar promocion'])
    ->name('promocion.edit');
Route::put('promocion/{id}',[PromocionController::class,'update'])->name('promocion.update');

Route::delete('promocion/{id}', [PromocionController::class, 'destroy'])
    ->middleware(['auth:empleado','can:eliminar promocion'])
    ->name('promocion.destroy');

Route::get('consultar-promocion', [PromocionController::class, 'consultarPromocion'])
    ->middleware(['auth:empleado','can:consultar promocion'])
    ->name('consultar-promocion');


//Rutas para cliente
Route::get('cliente/create',[ClienteController::class,'create'])
    ->middleware(['auth:empleado','can:crear cliente'])
    ->name('cliente.create');
Route::post('cliente',[ClienteController::class,'store'])->name('cliente.store');

Route::get('cliente/{id}/edit',[ClienteController::class,'edit'])
    ->middleware(['auth:empleado','can:editar cliente'])
    ->name('cliente.edit');
Route::put('cliente/{id}',[ClienteController::class,'update'])->name('cliente.update');

Route::delete('cliente/{id}', [ClienteController::class, 'destroy'])
    ->middleware(['auth:empleado','can:eliminar cliente'])
    ->name('cliente.destroy');

Route::get('consultar-cliente', [ClienteController::class, 'consultarCliente'])
    ->middleware(['auth:empleado','can:consultar cliente'])
    ->name('consultar-cliente');


//Rutas para empleado
Route::get('empleado/create',[EmpleadoController::class,'create'])
    ->middleware(['auth:empleado','can:crear empleado'])
    ->name('empleado.create');
Route::post('empleado',[EmpleadoController::class,'store'])->name('empleado.store');

Route::get('empleado/{id}/edit',[EmpleadoController::class,'edit'])
    ->middleware(['auth:empleado','can:editar empleado'])
    ->name('empleado.edit');
Route::put('empleado/{id}',[EmpleadoController::class,'update'])->name('empleado.update');


Route::delete('empleado/{id}', [EmpleadoController::class, 'destroy'])
    ->middleware(['auth:empleado','can:eliminar empleado'])
    ->name('empleado.destroy');

Route::get('consultar-empleado', [EmpleadoController::class, 'consultarEmpleado'])
    ->middleware(['auth:empleado','can:consultar empleado'])
    ->name('consultar-empleado');


//rutas para pedido
Route::get('pedido/create',[PedidoController::class,'create'])
    ->middleware(['auth:empleado','can:crear pedido'])
    ->name('pedido.create');
Route::post('pedido',[PedidoController::class,'store'])->name('pedido.store');


//Páginas para la validación de los datos insertados
Route::post('validar-registro',[LoginController::class,'validarRegistro'])->name('validar-registro');


//Página para la el inicio de sesión
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('validar-sesion',[LoginController::class,'validarSesion'])->name('validar-sesion');

//Página para registrarse
Route::get('signup',[LoginController::class,'signup'])->name('signup');
Route::post('logout',[LoginController::class,'logout'])->name('logout');


//Rutas para los reportes
Route::get('reportes', [ReporteVentaController::class,'show'])
    ->middleware(['auth:empleado','can:reporte'])
    ->name('reportes.dashboard');

    //Rutas para reportes de ventas
    Route::get('reportes/ventas', [ReporteVentaController::class,'showVentas'])
        ->middleware(['auth:empleado','can:reporte'])
        ->name('reportes.ventas');

    Route::post('reportes/ventas-generar', [ReporteVentaController::class,'showVentasReporte'])->name('ventas.generar');

    Route::get('reportes/ventas/diarias/pdf', [ReporteVentaController::class, 'generarDiarioPDF'])
        ->middleware(['auth:empleado', 'can:reporte'])
        ->name('reportes.ventasdiarias.pdf');

    Route::get('reportes/ventas/semanales/pdf', [ReporteVentaController::class, 'generarSemanalPDF'])
    ->middleware(['auth:empleado', 'can:reporte'])
    ->name('reportes.ventassemanales.pdf');

    Route::get('reportes/ventas/mensuales/pdf', [ReporteVentaController::class, 'generarMensualPDF'])
    ->middleware(['auth:empleado', 'can:reporte'])
    ->name('reportes.ventasmensuales.pdf');

    //Rutas para reportes de productos
    Route::get('reportes/productos', [ReporteProductoController::class,'showProductos'])
        ->middleware(['auth:empleado','can:reporte'])
        ->name('reportes.productos');

    Route::post('reportes/productos-generar', [ReporteProductoController::class,'showProductosReporte'])->name('productos.generar');

    Route::get('reportes/productos/semanales/pdf', [ReporteProductoController::class, 'generarSemanalPDF'])
    ->middleware(['auth:empleado', 'can:reporte'])
    ->name('reportes.productossemanales.pdf');



