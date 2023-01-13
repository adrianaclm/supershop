<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('lastname');
            $table->string('cedula');
            $table->string('email');
            $table->timestamp('email_verified_at');
            $table->string('password')->default('12345'); //prueba
            $table->boolean('tipo')->default(1); // 1=cliente , 0=admin
            $table->boolean('estado')->default(1); // 1=activado, 0=no activado
            $table->string('telefono')->nullable();
            $table->text('address')->nullable();
            $table->rememberToken();
            
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
};
