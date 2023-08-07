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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default(true);
            $table->unsignedBigInteger('colorId')->nullable();
            $table->foreign('colorId')
            ->references('id')
            ->on('colors')
            ->onDelete('cascade');
            $table->unsignedBigInteger('productId')->nullable();
            $table->foreign('productId')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
