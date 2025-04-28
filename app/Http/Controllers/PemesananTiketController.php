<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\JadwalPendakian;

class PemesananTiketController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('jadwalPendakian')->get();
        return view('pemesanans.index', compact('pemesanans'));
    }

    public function create()
    {
        $jadwals = JadwalPendakian::all();
        return view('pemesanans.create', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jadwal_pendakian_id' => 'required|exists:jadwal_pendakians,id',
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'jumlah_tiket' => 'required|integer|min:1',
            'status' => 'required|in:Tertunda,Terkonfirmasi,Dibatalkan',
        ]);

        Pemesanan::create($request->all());

        return redirect()->route('pemesanans.index')->with('success', 'Tiket berhasil dipesan!');
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::with('jadwalPendakian')->findOrFail($id);
        return view('pemesanans.show', compact('pemesanan'));
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $jadwals = JadwalPendakian::all();
        return view('pemesanans.edit', compact('pemesanan', 'jadwals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jadwal_pendakian_id' => 'required|exists:jadwal_pendakians,id',
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'jumlah_tiket' => 'required|integer|min:1',
            'status' => 'required|in:Tertunda,Terkonfirmasi,Dibatalkan',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($request->all());

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan tiket berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan tiket berhasil dihapus!');
    }
}
