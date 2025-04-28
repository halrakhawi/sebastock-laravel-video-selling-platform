<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('mobile')->nullable();
            $table->string('password');
            $table->string('address');
            $table->string('store_name');
            $table->string('account');
            $table->string('verification_code',100)->nullable();
            $table->integer('is_verified')->nullable();
            $table->string('picture')->nullable();
            $table->double('balance');
            $table->tinyInteger('accept_reject_request');
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
        Schema::dropIfExists('sellers');
    }
}
