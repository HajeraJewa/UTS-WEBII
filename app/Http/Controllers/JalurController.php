<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gunung;
use App\Models\Jalur;

class JalurController extends Controller
{
    public function index()
    {
        $jalurs = Jalur::with('gunung')->get();
        return view('jalurs.index', compact('jalurs'));
    }

    public function create()
    {
        $gunungs = Gunung::all();
        return view('jalurs.create', compact('gunungs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gunung_id' => 'required|exists:gunungs,id',
            'status' => 'required',
        ]);

        Jalur::create($request->all());

        return redirect()->route('jalurs.index')->with('success', 'Data jalur berhasil disimpan!');
    }

    public function edit($id)
    {
        $jalur = Jalur::findOrFail($id);
        $gunungs = Gunung::all();
        return view('jalurs.edit', compact('jalur', 'gunungs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'gunung_id' => 'required|exists:gunungs,id',
            'status' => 'required',
        ]);

        $jalur = Jalur::findOrFail($id);
        $jalur->update($request->all());

        return redirect()->route('jalurs.index')->with('success', 'Data jalur berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jalur = Jalur::findOrFail($id);
        $jalur->delete();

        return redirect()->route('jalurs.index')->with('success', 'Data jalur berhasil dihapus!');
    }

    public function show($id)
    {
        $jalur = Jalur::with('gunung')->findOrFail($id);
        return view('jalurs.show', compact('jalur'));
    }
}
