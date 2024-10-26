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
            $table->bigIncrements("idped");
            $table->String("descripcion");
            $table->integer("cantidad");
            $table->date("fePed");
            $table->float("subtotal");
            $table->float("descuento");
            $table->float("totalP");
            $table->String("status");
            $table->unsignedBigInteger("idpro");
            $table->unsignedBigInteger("idv");
            $table->unsignedBigInteger("idprom");
            $table->foreign('idpro')->references('idpro')->on('producto')->onDelete('cascade');
            $table->foreign('idv')->references('idv')->on('venta')->onDelete('cascade');
            $table->foreign('idprom')->references('idprom')->on('promocion')->onDelete('cascade');
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
