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
        Schema::create('ShippingAddresses', function (Blueprint $table) {
            $table->increments('address_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('street_address')->notNull();
            $table->string('city', 100)->notNull();
            $table->string('state', 100);
            $table->string('postal_code', 20);
            $table->string('country', 100)->notNull();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ShippingAddresses');
    }
};
