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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('original_price', 10, 0)->after('price');

            // DB::statement('update products set original_price = price');

            // Schema::dropColumn('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->after('original_price');
        });
    
        // DB::statement('UPDATE products SET price = original_price');
    
        // Schema::table('products', function (Blueprint $table) {
        //     $table->dropColumn('original_price');
        // });
    }
};
