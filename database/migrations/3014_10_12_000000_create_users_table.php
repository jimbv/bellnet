<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('apellido'); 
            $table->string('nombres');  
            $table->bigInteger('telefono');
            $table->date('nacimiento');
            $table->bigInteger('cuit')->unique(); 
            $table->string('calle');
            $table->integer('numero');
            $table->string('depto')->nullable(); 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('localidad_id');
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->date('baja')->nullable();
            $table->text('observaciones')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
