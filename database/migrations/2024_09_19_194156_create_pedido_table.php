<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements("idpe");
            $table->date("fecPed");
            $table->date("fecEntrega");
            $table->float("subtotal");
            $table->float("total");
            $table->String("direccion");
            $table->String("descripcion");
            $table->unsignedBigInteger("idcli");
            $table->unsignedBigInteger("ide");
            $table->foreign('idcli')->references('idcli')->on('cliente')->onDelete('cascade');
            $table->foreign('ide')->references('ide')->on('empleado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
