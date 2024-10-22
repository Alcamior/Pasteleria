<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class exhibicionController extends Controller
{
    public function dashboard(){
        /* $correo = Auth::user()->email; */
        return view('dashboard');
    }
}
