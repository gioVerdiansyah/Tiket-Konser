<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jumlah_tiket');
            $table->string('harga1');
            $table->string('harga2')->nullable();
            $table->string('harga3')->nullable();
            $table->string('harga4')->nullable();
            $table->string('harga5')->nullable();
            $table->foreignId('konser_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};