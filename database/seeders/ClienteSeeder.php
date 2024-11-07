<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cliente = new Cliente();
        $cliente -> nombre = "Luis";
        $cliente -> ap = "Hernandez";
        $cliente -> am = "Fuentes";
        $cliente -> email = "Luis@gmail.com";
        $cliente -> contrasena = Hash::make('1234');
        $cliente -> profile_image = "https://cdn.shopify.com/s/files/1/1414/2472/files/5-The_School_of_Athens__by_Raffaello_Sanzio_da_Urbino.jpg?v=1558424890";
        $cliente -> assignRole(roles:'cliente');
        $cliente -> save();
    }
}
