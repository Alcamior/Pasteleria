<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasteleriaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('principal',function(){
    return "Hola";
})->name('principal');