<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pedido;


class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pedido = new Pedido();
        $pedido->descripcion = "Pastel de cumpleaños";
        $pedido->cantidad = 2;
        $pedido->fePed = "2024-10-01";
        $pedido->subtotal = 300.00;
        $pedido->descuento = 0.00;
        $pedido->totalP = 300.00;
        $pedido->status = "Aprobado";
        $pedido->idpro = 1;
        $pedido->idv = 1;
        $pedido->idprom = null;
        $pedido->save();

        $pedido = new Pedido();
        $pedido->descripcion = "Caja de cupcakes";
        $pedido->cantidad = 1;
        $pedido->fePed = "2024-10-01";
        $pedido->subtotal = 120.00;
        $pedido->descuento = 0.00;
        $pedido->totalP = 120.00;
        $pedido->status = "Aprobado";
        $pedido->idpro = 2;
        $pedido->idv = 1;
        $pedido->idprom = null;
        $pedido->save();

        $pedido = new Pedido();
        $pedido->descripcion = "Paquete de galletas";
        $pedido->cantidad = 3;
        $pedido->fePed = "2024-10-05";
        $pedido->subtotal = 75.00;
        $pedido->descuento = 0.00;
        $pedido->totalP = 75.00;
        $pedido->status = "Aprobado";
        $pedido->idpro = 3;
        $pedido->idv = 2;
        $pedido->idprom = null;
        $pedido->save();

        $pedido = new Pedido();
        $pedido->descripcion = "Baguette especial";
        $pedido->cantidad = 2;
        $pedido->fePed = "2024-10-08";
        $pedido->subtotal = 80.00;
        $pedido->descuento = 0.00;
        $pedido->totalP = 80.00;
        $pedido->status = "Aprobado";
        $pedido->idpro = 4;
        $pedido->idv = 2;
        $pedido->idprom = null;
        $pedido->save();

        $pedido = new Pedido();
        $pedido->descripcion = "Tarta";
        $pedido->cantidad = 1;
        $pedido->fePed = "2024-10-10";
        $pedido->subtotal = 150.00;
        $pedido->descuento = 0.00;
        $pedido->totalP = 150.00;
        $pedido->status = "Aprobado";
        $pedido->idpro = 1;
        $pedido->idv = 3;
        $pedido->idprom = null;
        $pedido->save();
    }
}
