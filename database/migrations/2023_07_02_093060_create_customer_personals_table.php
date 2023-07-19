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
        Schema::create('customer_personals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->string('full_name', 200);
            $table->string('phone', 200);
            $table->unsignedBigInteger('gender_id');
            $table->date('date_of_birth');
            $table->string('place_of_birth', 200);
            $table->unsignedBigInteger('nationality_id');
            $table->unsignedBigInteger('identity_id');
            $table->string('identity_no', 200);
            $table->longText('identity_picture');
            $table->longText('selfie_picture');
            $table->string('npwp_no', 200);
            $table->longText('npwp_picture');
            $table->string('mother_name', 200);
            $table->string('identity_address', 200)->nullable();
            $table->unsignedBigInteger('identity_village_id');
            $table->foreign('identity_village_id')->references('id')->on('villages');
            $table->string('domicile_address', 200)->nullable();
            $table->unsignedBigInteger('domicile_village_id')->nullable();
            $table->foreign('domicile_village_id')->references('id')->on('villages');
            $table->boolean('is_domicile_match')->default('false');
            $table->unsignedBigInteger('updated_by_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_personal');
    }
};
