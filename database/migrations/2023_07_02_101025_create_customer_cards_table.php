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
        Schema::create('customer_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_account_id');
            $table->foreign('customer_account_id')->references('id')->on('customer_accounts');
            $table->string('card_no', 200);
            $table->date('expired_date');
            $table->integer('cvc');
            $table->unsignedBigInteger('card_type_id');
            $table->foreign('card_type_id')->references('id')->on('card_types');
            $table->string('card_name', 100);
            $table->float('transaction_limit');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_cards');
    }
};
