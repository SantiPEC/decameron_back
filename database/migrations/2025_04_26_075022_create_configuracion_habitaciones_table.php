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
        Schema::create('configuracion_habitaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hotel')->constrained('hoteles');
            $table->foreignId('id_tipo_acomodacion')->constrained('tipo_acomodaciones');
            $table->foreignId('id_tipo_habitacion')->constrained('tipo_habitaciones');
            $table->integer('cantidad');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracion_habitaciones');
    }
};
