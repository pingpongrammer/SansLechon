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
        Schema::create('freebies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('freeb1')->nullable();
            $table->unsignedBigInteger('freeb2')->nullable();
            $table->string('priceCake')->nullable();
            $table->string('priceMom')->nullable();
            $table->string('sizeCake')->nullable();
            $table->string('sizeMom')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('freebies');
    }
};
