<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleado = new Empleado();
        $empleado -> nombre = "Kevin";
        $empleado -> ap = "Trinidad";
        $empleado -> am = "Medina";
        $empleado -> telefono = "7774571517";
        $empleado -> email = "kevinyahirt@gmail.com";
        $empleado -> contrasena = Hash::make(value:'123456');

        $empleado -> assignRole(roles:'super-admin');
        $empleado -> save();

        $empleado = new Empleado();
        $empleado -> nombre = "Camila";
        $empleado -> ap = "Alor";
        $empleado -> am = "Contreras";
        $empleado -> telefono = "7774081082";
        $empleado -> email = "acco220170@upemor.edu.mx";
        $empleado -> contrasena = Hash::make(value:'123456');

        $empleado -> assignRole(roles:'admin');
        $empleado -> save();

    }
}
