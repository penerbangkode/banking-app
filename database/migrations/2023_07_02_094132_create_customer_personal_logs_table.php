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
        Schema::create('customer_personal_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_personal_id');
            $table->foreign('customer_personal_id')->references('id')->on('customer_personals');
            $table->longText('old_value');
            $table->longText('new_value');
            $table->unsignedBigInteger('created_by_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_personal_logs');
    }
};
