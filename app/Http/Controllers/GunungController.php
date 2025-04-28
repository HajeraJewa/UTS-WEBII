<?php

namespace App\Http\Controllers;

use App\Models\Gunung;
use Illuminate\Http\Request;

class GunungController extends Controller
{
    // Menampilkan daftar gunung
    public function index()
    {
        $gunungs = Gunung::all();
        return view('gunungs.index', compact('gunungs'));
    }

    // Menampilkan form untuk menambah gunung baru
    public function create()
    {
        return view('gunungs.create');
    }

    // Menyimpan gunung baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'ketinggian' => 'required|numeric',
            'status' => 'required',
        ]);

        Gunung::create($request->all());

        return redirect()->route('gunungs.index')->with('success', 'Data gunung berhasil disimpan!');
    }

    // Menampilkan detail gunung berdasarkan ID
    public function show($id)
    {
        $gunung = Gunung::findOrFail($id);
        return view('gunungs.show', compact('gunung'));
    }

    // Menampilkan form untuk mengedit gunung
    public function edit($id)
    {
        $gunung = Gunung::findOrFail($id);
        return view('gunungs.edit', compact('gunung'));
    }

    // Memperbarui data gunung
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'ketinggian' => 'required|numeric',
            'status' => 'required',
        ]);

        $gunung = Gunung::findOrFail($id);
        $gunung->update($request->all());

        return redirect()->route('gunungs.index')->with('success', 'Data gunung berhasil diperbarui!');
    }

    // Menghapus gunung
    public function destroy($id)
    {
        $gunung = Gunung::findOrFail($id);
        $gunung->delete();

        return redirect()->route('gunungs.index')->with('success', 'Data gunung berhasil dihapus!');
    }
}
