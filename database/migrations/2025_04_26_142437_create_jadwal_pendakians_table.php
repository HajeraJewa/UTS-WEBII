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
        Schema::create('jadwal_pendakians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gunung_id')
                ->constrained('gunungs', 'id')
                ->onDelete('cascade');

            $table->foreignId('jalur_id')
                ->constrained('jalurs', 'id')
                ->onDelete('cascade');

            $table->date('tanggal_pendakian');
            $table->integer('kuota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pendakians');
    }
};
