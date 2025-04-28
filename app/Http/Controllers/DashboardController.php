<?php

namespace App\Http\Controllers;

use App\Models\Gunung;
use App\Models\Jalur;
use App\Models\JadwalPendakian;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGunung = Gunung::count();
        $totalJalur = Jalur::count();
        $totalJadwal = JadwalPendakian::count();
        $totalPemesanan = Pemesanan::count();

        $jadwals = JadwalPendakian::with('gunung', 'jalur')
            ->orderBy('tanggal_pendakian', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact('totalGunung', 'totalJalur', 'totalJadwal',          'jadwals',            'totalPemesanan'));
    }
}
