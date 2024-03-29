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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('Order_uuid');
            $table->foreignId('Customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->string('Product');
            $table->bigInteger('Quantity');
            $table->bigInteger('Price');
            $table->bigInteger('SubTotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
