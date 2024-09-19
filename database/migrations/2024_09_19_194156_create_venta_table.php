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
        Schema::create('venta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements("idv");
            $table->date("fechaVent");
            $table->float("subtotal");
            $table->float("total");
            $table->float("promo");
            $table->bigInteger("ide");
            $table->foreign("ide")->references("ide")->on("empleado")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta');
    }
};
