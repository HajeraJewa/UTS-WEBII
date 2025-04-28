<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalPendakian extends Model
{
    /**
     * Relasi: Setiap Jadwal Pendakian berhubungan dengan satu Gunung.
     */
    public function gunung(): BelongsTo
    {
        return $this->belongsTo(Gunung::class, 'gunung_id');
    }

    /**
     * Relasi: Setiap Jadwal Pendakian berhubungan dengan satu Jalur.
     */
    public function jalur(): BelongsTo
    {
        return $this->belongsTo(Jalur::class, 'jalur_id');
    }

    /**
     * Atribut yang bisa diisi secara massal.
     */
    protected $fillable = [
        'gunung_id',
        'jalur_id',
        'tanggal_pendakian',
        'kuota',
    ];
}
