<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gunung;
use App\Models\Jalur;
use App\Models\JadwalPendakian;

class JadwalPendakianController extends Controller
{
    public function index()
    {
        $jadwals = JadwalPendakian::with('gunung', 'jalur')->get();
        return view('jadwal_pendakians.index', compact('jadwals'));
    }

    public function create()
    {
        $gunungs = Gunung::all();
        $jalurs = Jalur::all();
        return view('jadwal_pendakians.create', compact('gunungs', 'jalurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gunung_id' => 'required|exists:gunungs,id',
            'jalur_id' => 'required|exists:jalurs,id',
            'tanggal_pendakian' => 'required|date',
            'kuota' => 'required|integer|min:1',
        ]);

        JadwalPendakian::create($request->all());

        return redirect()->route('jadwal_pendakians.index')->with('success', 'Data Jadwal berhasil disimpan!');
    }

    public function show($id)
    {
        $jadwal = JadwalPendakian::with('gunung', 'jalur')->findOrFail($id);
        return view('jadwal_pendakians.show', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = JadwalPendakian::findOrFail($id);
        $gunungs = Gunung::all();
        $jalurs = Jalur::all();
        return view('jadwal_pendakians.edit', compact('jadwal', 'gunungs', 'jalurs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gunung_id' => 'required|exists:gunungs,id',
            'jalur_id' => 'required|exists:jalurs,id',
            'tanggal_pendakian' => 'required|date',
            'kuota' => 'required|integer|min:1',
        ]);

        $jadwal = JadwalPendakian::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal_pendakians.index')->with('success', 'Data Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPendakian::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal_pendakians.index')->with('success', 'Data jadwal berhasil dihapus!');
    }
}
