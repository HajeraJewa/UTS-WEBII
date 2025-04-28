<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gunung extends Model
{
    /**
     * Relasi: Setiap Gunung memiliki banyak Jalur.
     */
    public function jalurs(): HasMany
    {
        return $this->hasMany(Jalur::class);
    }

    public function jadwalPendakians(): HasMany
    {
        return $this->hasMany(JadwalPendakian::class);
    }

    /**
     * Atribut yang bisa diisi secara massal.
     */
    protected $fillable = [
        'nama',
        'lokasi',
        'ketinggian',
        'status',
    ];
}
