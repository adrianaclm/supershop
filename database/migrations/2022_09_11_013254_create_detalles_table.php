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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->string('cantidad')->default(0);
            $table->string('preciototal')->default(0.00);
            $table->foreignId('pedido_id')->references('id')->on('pedidos');
            $table->foreignId('producto_id')->references('id')->on('productos');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
};
