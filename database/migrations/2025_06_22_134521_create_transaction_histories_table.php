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
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('person_id');
        $table->enum('type', ['topup', 'transfer', 'purchase']);
        $table->unsignedBigInteger('reference_id'); // ID dari tabel asli (topup_id, transfer_id, atau purchase_id)
        $table->integer('amount');
        $table->timestamp('transaction_date');
        $table->timestamps();

        $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_histories');
    }
};
