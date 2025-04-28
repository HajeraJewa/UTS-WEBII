<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gunungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lokasi');
            $table->integer('ketinggian');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Meletus']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gunungs');
    }
};
