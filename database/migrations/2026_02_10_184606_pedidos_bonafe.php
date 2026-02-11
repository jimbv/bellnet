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
        Schema::create('pedidos_bonafe', function (Blueprint $table) {
            $table->id();
            $table->string('cliente'); // jose, maria, kiosco_123
            $table->enum('estado', ['abierto', 'cerrado'])->default('abierto');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_bonafe');
    }
};
