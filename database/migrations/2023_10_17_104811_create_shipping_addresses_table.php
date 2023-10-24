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
        Schema::dropIfExists('shipping_addresses');

        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->increments('address_id');
            $table->unsignedInteger('user_id');
            $table->string('street_address');
            $table->string('city',100);
            $table->string('state',100);
            $table->string('postal_code', 20);
            $table->string('country', 100);
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
