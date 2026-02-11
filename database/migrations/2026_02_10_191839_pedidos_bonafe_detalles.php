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
        Schema::create('pedido_bonafe_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_bonafe_id')->constrained('pedidos_bonafe')->cascadeOnDelete();
            $table->foreignId('producto_id')->constrained('productos_bonafe')->cascadeOnDelete();
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2); // precio al momento del pedido
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_bonafe_detalles');
    }
};
