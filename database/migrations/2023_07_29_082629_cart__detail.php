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
        //
        Schema::create('CartDetails', function (Blueprint $table) {
            $table->id();
            $table->double('product_price');
            $table->string('product_color');
            $table->unsignedBigInteger('userId')->nullable();
            $table->foreign('userId')
            ->references('id')
            ->on('users')
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
        //
        Schema::dropIfExists('CartDetails');

    }
};
