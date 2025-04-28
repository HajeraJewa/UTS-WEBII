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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_pendakian_id')
                ->constrained('jadwal_pendakians', 'id')
                ->onDelete('cascade');
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->integer('jumlah_tiket');
            $table->enum('status', ['Tertunda', 'Terkonfirmasi', 'Dibatalkan'])->default('Tertunda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
