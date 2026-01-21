<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->enum('billing_cycle', ['monthly', 'yearly'])
                  ->after('description');
            $table->decimal('base_price', 10, 2)
                  ->after('billing_cycle');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['billing_cycle', 'base_price']);
        });
    }
};
