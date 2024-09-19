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
        Schema::create('producto', function (Blueprint $table) {
            $table->increments("idpro");
            $table->String("tipo");
            $table->String("descripcion");
            $table->float("precio");
            $table->String("tamano");
            $table->date("feIngreso");
            $table->date("caducidad");
            $table->String("categoria"); //Verificar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
