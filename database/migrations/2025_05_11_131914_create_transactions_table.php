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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
             $table->foreignId('people_id')->constrained('people')->onDelete('cascade');
             $table->foreignId('products_id')->constrained('products')->onDelete('cascade');
             $table->string('target_number');
             $table->integer('amount');
             $table->enum('status', ['pending', 'paid', 'success', 'failed', 'expired'])->default('pending');
             $table->text('reference')->nullable(); // URL or merchant_ref
             $table->string('payment_method')->nullable();
             $table->string('payment_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
