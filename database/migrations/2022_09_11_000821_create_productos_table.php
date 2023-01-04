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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 25)->nullable();
            $table->string('seo_title', 67)->nullable();
            $table->string('seo_description', 155)->nullable();
            $table->string('seo_image', 100)->nullable();

            $table->string('nombre', 25)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('image', 100)->nullable();
            $table->string('stock')->default(0);
            $table->string('cod_barra', 30)->nullable();
            $table->string('serial', 30)->nullable();
            $table->float('pvp_detal', 7, 2)->default(0.00);
            $table->float('pvp_mayor', 7, 2)->default(0.00);

            $table->string('orden')->nullable();
            $table->boolean('publicado')->default(0);

            $table->foreignId('subcategoria_id')->references('id')->on('subcategorias');
            $table->foreignId('marca_id')->references('id')->on('marcas');
            $table->foreignId('modelo_id')->references('id')->on('modelos');
            $table->foreignId('proveedor_id')->references('id')->on('proveedors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
