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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_code')->after('order_id');
        });

        DB::unprepared('
            CREATE TRIGGER generate_order_code
            BEFORE INSERT ON orders
            FOR EACH ROW
            BEGIN
                DECLARE random_num INT;
                SET random_num = FLOOR(RAND() * 10000);
                SET NEW.order_code = CONCAT("ORDER", LPAD(random_num, 4, "0"));
            END
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_code');
        });

        DB::unprepared('DROP TRIGGER IF EXISTS generate_order_code');
    }
};
