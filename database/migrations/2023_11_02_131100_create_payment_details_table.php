<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->increments('payment_detail_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('order_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('province');
            $table->string('phone_number');
            $table->string('email');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
