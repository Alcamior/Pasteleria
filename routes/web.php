<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasteleriaController;

Route::get('/', function () {
    //return view('welcome');
    return "hola";
});

Route::get('principal',function(){
    return "Hola";
})->name('principal');

Route::get('signin',[PasteleriaController::class,'signin'])->name('login');