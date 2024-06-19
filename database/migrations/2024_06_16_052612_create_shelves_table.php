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
        Schema::create('shelves', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('library_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('library_id')->references('id')->on('libraries');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelves');
    }
};
