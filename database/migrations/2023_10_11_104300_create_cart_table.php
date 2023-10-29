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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->unsignedBigInteger('letchon_id')->nullable();
            $table->unsignedBigInteger('orders_id')->nullable();
            $table->string('shop')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('freeb1')->nullable();
            $table->unsignedBigInteger('freeb2')->nullable();
            $table->string('priceCake')->nullable();
            $table->string('priceMom')->nullable();
            $table->string('sizeCake')->nullable();
            $table->string('sizeMom')->nullable();
            $table->timestamps();

            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('letchon_id')->references('id')->on('letchons')->onDelete('cascade');
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');
            
            $table->foreign('freeb1')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('freeb2')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};

