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
        Schema::create('data_enum_details', function (Blueprint $table) {
            $table->id();
            $table->string('rule_name', 50)->nullable();
            $table->unsignedBigInteger('rule_value')->nullable();
            $table->string('description', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_enum_details');
    }
};
