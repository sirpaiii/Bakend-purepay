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
        Schema::table('topups', function (Blueprint $table) {
           Schema::table('topups', function (Blueprint $table) {
        $table->string('merchant_order_id')->nullable()->after('amount')->unique();
    });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('topups', function (Blueprint $table) {
            //
        });
    }
};
