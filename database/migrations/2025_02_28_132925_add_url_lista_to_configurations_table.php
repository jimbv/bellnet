<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->string('url_lista')->after('url_devolucion')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->dropColumn('url_lista');
        });
    }
};
