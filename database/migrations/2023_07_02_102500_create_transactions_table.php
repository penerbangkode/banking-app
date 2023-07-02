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
            $table->unsignedBigInteger('customer_account_id');
            $table->foreign('customer_account_id')->references('id')->on('customer_accounts');
            $table->unsignedBigInteger('from_account_id');
            $table->foreign('from_account_id')->references('id')->on('customer_accounts');
            $table->unsignedBigInteger('to_account_id');
            $table->foreign('to_account_id')->references('id')->on('customer_accounts');
            $table->unsignedBigInteger('from_currency_id');
            $table->foreign('from_currency_id')->references('id')->on('currencies');
            $table->unsignedBigInteger('to_currency_id');
            $table->foreign('to_currency_id')->references('id')->on('currencies');
            $table->enum('transaction_type', [
                'CR',
                'DB'
            ]);
            $table->float('amount');
            $table->float('rate');
            $table->float('final_amount');
            $table->float('last_balance');
            $table->longText('trail');
            $table->smallInteger('status');
            $table->string('transaction_via');
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
