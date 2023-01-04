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
        Schema::create('carruofertas', function (Blueprint $table) {
            $table->id();          
            $table->string('description', 200);
            $table->string('urlfoto', 100);
            $table->string('link', 100)->nullable();
            $table->string('orden')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carruofertas');
    }
};