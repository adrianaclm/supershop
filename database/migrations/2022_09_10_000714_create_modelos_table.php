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
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50)->unique();
            $table->string('ano', 4);
            $table->float('peso', 5,2)->nullable();
            $table->string('talla', 3)->nullable();
            $table->string('tamano')->nullable();
            $table->string('color')->nullable();
            $table->string('cod_imei')->nullable();
            $table->boolean('garantia');
            $table->string('tipo_garantia');
            $table->foreignId('marca_id')->references('id')->on('marcas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos');
    }
};