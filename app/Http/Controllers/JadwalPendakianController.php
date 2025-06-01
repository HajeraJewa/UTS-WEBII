<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gunung;
use App\Models\Jalur;
use App\Models\JadwalPendakian;
use Illuminate\Support\Facades\Gate;

class JadwalPendakianController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view-jadwal-pendakians')) {
            abort(401);
        }

        $jadwals = JadwalPendakian::with(['gunung', 'jalur'])->get();
        return view('jadwal_pendakians.index', compact('jadwals'));
    }

    public function create()
    {
        if (!Gate::allows('store-jadwal-pendakians')) {
            abort(401);
        }

        $gunungs = Gunung::all();
        $jalurs = Jalur::all();
        return view('jadwal_pendakians.create', compact('gunungs', 'jalurs'));
    }


    public function store(Request $request)
    {
        if (!Gate::allows('store-jadwal-pendakians')) {
            abort(401);
        }

        $request->validate([
            'gunung_id' => 'required|exists:gunungs,id',
            'jalur_id' => 'required|exists:jalurs,id',
            'tanggal_pendakian' => 'required|date',
            'kuota' => 'required|integer|min:1',
        ]);

        $data = $request->only(['gunung_id', 'jalur_id', 'tanggal_pendakian', 'kuota']);
        JadwalPendakian::create($data);

        return redirect()->route('jadwal_pendakians.index')->with('success', 'Data jadwal berhasil disimpan!');
    }

    public function show($id)
    {
        if (!Gate::allows('view-jadwal-pendakians')) {
            abort(401);
        }

        $jadwal = JadwalPendakian::with(['gunung', 'jalur'])->findOrFail($id);
        return view('jadwal_pendakians.show', compact('jadwal'));
    }

    public function edit($id)
    {
        if (!Gate::allows('edit-jadwal-pendakians')) {
            abort(401);
        }

        $jadwal = JadwalPendakian::findOrFail($id);
        $gunungs = Gunung::all();
        $jalurs = Jalur::all();
        return view('jadwal_pendakians.edit', compact('jadwal', 'gunungs', 'jalurs'));
    }
    public function update(Request $request, $id)
    {
        if (!Gate::allows('edit-jadwal-pendakians')) {
            abort(401);
        }

        $request->validate([
            'gunung_id' => 'required|exists:gunungs,id',
            'jalur_id' => 'required|exists:jalurs,id',
            'tanggal_pendakian' => 'required|date',
            'kuota' => 'required|integer|min:1',
        ]);

        $jadwal = JadwalPendakian::findOrFail($id);
        $data = $request->only(['gunung_id', 'jalur_id', 'tanggal_pendakian', 'kuota']);
        $jadwal->update($data);

        return redirect()->route('jadwal_pendakians.index')->with('success', 'Data jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (!Gate::allows('destroy-jadwal-pendakians')) {
            abort(401);
        }

        $jadwal = JadwalPendakian::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal_pendakians.index')->with('success', 'Data jadwal berhasil dihapus!');
    }
}
