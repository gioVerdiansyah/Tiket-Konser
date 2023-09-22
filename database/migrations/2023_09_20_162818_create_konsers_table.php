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
        Schema::create('konsers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_konser');
            $table->string('banner');
            $table->string('nama_penyelenggara')->nullable();
            $table->string('photo_penyelenggara')->nullable();
            $table->string('tanggal_konser');
            $table->string('tempat');
            $table->string('alamat');
            $table->double('lat');
            $table->double('lon');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->text('deskripsi');
            $table->string('denah');
            $table->foreignId('kategori_id')->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsers');
    }
};