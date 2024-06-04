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
        Schema::table('post_images', function (Blueprint $table) {
            $table->integer('order')->nullable()->after('id');
            $table->string('post_id_temporal')->nullable()->after('post_id');
            $table->unsignedBigInteger('post_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_images', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->dropColumn('post_id_temporal');
        });
    }
};
