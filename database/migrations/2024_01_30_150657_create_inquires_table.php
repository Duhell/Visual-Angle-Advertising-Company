<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inquires', function (Blueprint $table) {
            $table->id();
            $table->uuid('inquire_uuid')->default(Uuid::uuid4());
            $table->string('FullName');
            $table->string('Email');
            $table->string('PhoneNumber');
            $table->text('Message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquires');
    }
};
