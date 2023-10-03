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
            $table->string('approval_code')->nullable();
            $table->string('va_number')->nullable();
            $table->string('biller_code')->nullable();
            $table->string('bank')->nullable();
            $table->string('card_type')->nullable();
            $table->string('masked_card')->nullable();
            $table->string('fraud_status');
            $table->decimal('gross_amount', 10, 2);
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