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
        Schema::create('kyc_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_type_id');
            $table->unsignedBigInteger('related_model_id');
            $table->foreign('related_model_id')->references('id')->on('customer_personal');
            $table->smallInteger('task_status');
            $table->timestamp('finished_date');
            $table->unsignedBigInteger('finished_by_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_tasks');
    }
};
