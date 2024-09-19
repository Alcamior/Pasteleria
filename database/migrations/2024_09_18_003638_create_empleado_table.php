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
        Schema::create('empleado', function (Blueprint $table) {
            $table->bigIncrements("ide");
            $table->String("nombre");
            $table->String("ap");
            $table->String("am");
            $table->date("fenac");
            $table->String("direccion");
            $table->String("telefono");
            $table->String("email");
            $table->String("contrasena")->nullable();
            $table->String("google_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
