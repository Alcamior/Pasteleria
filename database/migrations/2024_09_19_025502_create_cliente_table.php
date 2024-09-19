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
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments("idcli");
            $table->String("nombre");
            $table->String("ap");
            $table->String("am")->nullable();
            $table->String("direccion")->nullable();
            $table->date("fenac")->nullable();
            $table->String("telefono");
            $table->String("email")->nullable();
            $table->String("contrasena")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
