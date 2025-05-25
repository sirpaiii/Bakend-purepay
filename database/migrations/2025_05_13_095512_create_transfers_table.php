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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
          $table->unsignedBigInteger('sender_id');
    $table->unsignedBigInteger('receiver_id');
    $table->decimal('amount', 10, 2);
    $table->text('message')->nullable();
    $table->enum('status', ['completed', 'failed']);
    $table->timestamp('transferred_at')->useCurrent();
    $table->timestamps();

    $table->foreign('sender_id')->references('id')->on('people')->onDelete('cascade');
    $table->foreign('receiver_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
