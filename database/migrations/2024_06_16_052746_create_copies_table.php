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
        Schema::create('copies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('numCopy');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('shelf_id');
            $table->timestamps();
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('shelf_id')->references('id')->on('shelves');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copies');
    }
};
