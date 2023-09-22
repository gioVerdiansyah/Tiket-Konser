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
        Schema::create('kategori_tiket', function (Blueprint $table) {
            $table->id();
            $table->string('kategoritiket1');
            $table->string('kategoritiket2')->nullable();
            $table->string('kategoritiket3')->nullable();
            $table->string('kategoritiket4')->nullable();
            $table->string('kategoritiket5')->nullable();
            $table->foreignId('tiket_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_tiket');
    }
};