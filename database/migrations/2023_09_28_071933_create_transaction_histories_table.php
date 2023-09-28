<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->string('approval_code');
            $table->string('bank');
            $table->string('card_type');
            $table->string('fraud_status');
            $table->decimal('gross_amount', 10, 2);
            $table->string('masked_card');
            $table->string('payment_type');
            $table->string('status_message');
            $table->string('transaction_id');
            $table->string('transaction_status');
            $table->dateTime('transaction_time');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
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