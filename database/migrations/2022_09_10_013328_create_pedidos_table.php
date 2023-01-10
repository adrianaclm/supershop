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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->float('subtotal', 7, 2)->nullable();
            $table->float('impuesto', 7, 2)->default(16.00);
            $table->float('total', 7, 2)->nullable();
            $table->timestamp('fecha')->now();
            $table->string('cedula');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('cart_id');
            $table->foreignId('estados_id')->references('id')->on('estados')->default(1);          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
