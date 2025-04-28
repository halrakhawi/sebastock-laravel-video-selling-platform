<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->Integer('cart_id');
            $table->unsignedInteger('video_id');
            $table->unsignedInteger('quantity');
            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('vedios')->onDelete('cascade');
            $table->primary(array('cart_id', 'video_id'));
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
        Schema::dropIfExists('cart_items');
    }
}
