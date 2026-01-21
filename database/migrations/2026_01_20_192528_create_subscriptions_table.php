<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('service_id')
                  ->constrained()
                  ->restrictOnDelete();

            $table->date('start_date');
            $table->date('next_billing_date');
            $table->date('end_date')->nullable();

            $table->decimal('agreed_price', 10, 2);

            $table->enum('status', ['active', 'suspended', 'cancelled'])
                  ->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
