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
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->unsignedInteger('blog_id');
            $table->unsignedInteger('user_id');
            $table->string('text');
            $table->text('image_url')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('blog_id')->references('blog_id')->on('blogs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_comments');
    }
};
