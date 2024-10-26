<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto = new Producto();
        $producto->idpro = 1;
        $producto->nombre = 'Pastel de Chocolate';
        $producto->tipo = 'pastelería';
        $producto->descripcion = 'Delicioso pastel de chocolate';
        $producto->precio = 150.00;
        $producto->save();
    
        $producto = new Producto();
        $producto->idpro = 2;
        $producto->nombre = 'Café Americano';
        $producto->tipo = 'cafetería';
        $producto->descripcion = 'Café negro preparado al estilo americano';
        $producto->precio = 30.00;
        $producto->save();
    
        $producto = new Producto();
        $producto->idpro = 3;
        $producto->nombre = 'Croissant';
        $producto->tipo = 'cafetería';
        $producto->descripcion = 'Crujiente croissant de mantequilla';
        $producto->precio = 25.00;
        $producto->save();
    
        $producto = new Producto();
        $producto->idpro = 4;
        $producto->nombre = 'Pastel de Zanahoria';
        $producto->tipo = 'pastelería';
        $producto->descripcion = 'Pastel con zanahoria y especias';
        $producto->precio = 180.00;
        $producto->save();
    }
}
