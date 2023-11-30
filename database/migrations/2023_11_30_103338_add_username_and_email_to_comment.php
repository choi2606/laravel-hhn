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
        Schema::table('blog_comments', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->change();
            $table->string('unreg_username')->nullable()->after('user_id');
            $table->string('unreg_email')->nullable()->after('unreg_username');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_comments', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable(false)->change();
            $table->dropColumn('unreg_username');
            $table->dropColumn('unreg_email');
        });
    }
};
