<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'jadwal_pendakian_id',
        'nama_pemesan',
        'no_hp',
        'jumlah_tiket',
        'status',
    ];

    /**
     * Relasi ke JadwalPendakian
     */
    public function jadwalPendakian()
    {
        return $this->belongsTo(JadwalPendakian::class, 'jadwal_pendakian_id');
    }
}
