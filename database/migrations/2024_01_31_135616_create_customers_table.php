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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->uuid('Customer_uuid');
            $table->string('FullName')->nullable();
            $table->string('Email')->nullable();
            $table->string('PhoneNumber')->nullable();
            $table->string('Country')->nullable();
            $table->string('Province')->nullable();
            $table->string('City')->nullable();
            $table->string('Street')->nullable();
            $table->string('PostCode')->nullable();
            $table->date('OrderDate')->nullable();
            $table->boolean('OrderStatus')->default(false);
            $table->bigInteger('OrderSubtotal')->nullable();
            $table->bigInteger('OrderShippingFee')->nullable();
            $table->bigInteger('OrderTotal')->nullable();
            $table->string('OrderTrackNumber')->nullable();
            $table->text('AdditionalNotes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
