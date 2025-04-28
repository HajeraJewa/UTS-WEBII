<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jalur extends Model
{
    /**
     * Relasi: Setiap Jalur berhubungan dengan satu Gunung.
     */
    public function gunung(): BelongsTo
    {
        return $this->belongsTo(Gunung::class, 'gunung_id');
    }

    /**
     * Atribut yang bisa diisi secara massal.
     */
    protected $fillable = [
        'nama',
        'status',
        'gunung_id',
    ];
}
