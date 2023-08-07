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
        Schema::create('OrderDetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detailId')->nullable();
            $table->foreign('detailId')
            ->references('id')
            ->on('product_details')
            ->onDelete('cascade');
            $table->unsignedBigInteger('orderId')->nullable();
            $table->foreign('orderId')
            ->references('id')
            ->on('orders')
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
        Schema::dropIfExists('OrderDetails');
    }
};
