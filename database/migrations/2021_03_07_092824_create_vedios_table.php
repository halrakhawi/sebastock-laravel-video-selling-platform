<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vedios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('details');
            $table->string('url');
            $table->string('Videopicture')->nullable();
            $table->string('hashtag');
            $table->integer('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->double('price')->nullable();
            $table->integer('rating');
            $table->integer('fivecount');
            $table->integer('fourcount');
            $table->integer('threecount');
            $table->integer('twocount');
            $table->integer('onecount');
            $table->integer('views');
            $table->integer('sales');
            $table->integer('share');
            $table->integer('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers');
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
        Schema::dropIfExists('vedios');
    }
}
