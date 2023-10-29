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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to the users table
            $table->string('name');
            $table->string('phone_number');
            $table->string('location');
            $table->string('barangay');
            $table->string('street');
            $table->string('deliveryDate');
            $table->string('deliveryTime');
            $table->string('modeOfPayment');
            $table->string('status');
            $table->string('referral_code')->nullable();
            $table->string('payment');
            $table->string('proofPayment')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
