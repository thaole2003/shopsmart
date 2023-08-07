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
        Schema::create('category_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryId')->nullable();
            $table->foreign('categoryId')
            ->references('id')
            ->on('categories')
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
        Schema::dropIfExists('category_products');
    }
};
