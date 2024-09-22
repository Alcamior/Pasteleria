<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasteleriaController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});


//Pagina donde se mostrarán los productos
Route::get('principal',function(){
    return "Hola";
})->name('principal');

//Página para la el inicio de sesión
Route::get('login',[PasteleriaController::class,'login'])->name('login');

//Página para registrarse
Route::get('signup',[LoginController::class,'signup'])->name('signup');


//Páginas para la validación de los datos insertados
Route::post('validar-registro',[LoginController::class,'validarRegistro'])->name('validar-registro');

 
Route::get('login-google', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('google-callback', function () {
    $user = Socialite::driver('google')->user();
 
    dd($user);
    //$user->token
});