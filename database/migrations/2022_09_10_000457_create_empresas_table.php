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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();            
            $table->string('razonSocial', 50)->nullable();
            $table->string('rif', 15)->nullable();
            $table->string('direccion', 150)->nullable();

            $table->string('celular', 13)->nullable();
            $table->string('email',100)->nullable();
            $table->string('facebook',100)->nullable();
            $table->string('instagram',100)->nullable();

            $table->text('somos')->nullable();
            $table->string('urlsomos',67)->nullable();
            $table->text('historia')->nullable();
            $table->string('urlhistoria',67)->nullable();
            $table->text('mision')->nullable();
            $table->string('urlmision',67)->nullable();
            $table->text('vision')->nullable();
            $table->string('urlvision',67)->nullable();
            $table->text('valores')->nullable();
            $table->string('urlvalores',67)->nullable();

            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};