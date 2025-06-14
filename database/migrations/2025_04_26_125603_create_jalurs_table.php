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
        Schema::create('jalurs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            // Menyebutkan kolom id secara eksplisit
            $table->foreignId('gunung_id')->constrained('gunungs', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jalurs');
    }
};
