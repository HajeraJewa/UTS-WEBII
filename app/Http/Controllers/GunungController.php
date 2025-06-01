<?php

namespace App\Http\Controllers;

use App\Models\Gunung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GunungController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view-gunungs')) {
            abort(401);
        }

        $gunungs = Gunung::all();
        return view('gunungs.index', compact('gunungs'));
    }

  
    public function create()
    {
        if (!Gate::allows('store-gunungs')) {
            abort(401);
        }

        return view('gunungs.create');
    }
    public function store(Request $request)
    {
        if (!Gate::allows('store-gunungs')) {
            abort(401);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'ketinggian' => 'required|numeric',
            'status' => 'required|in:Aktif,Tidak Aktif,Meletus',
            'gambar' => 'nullable|url',  // Validasi gambar sebagai URL
        ]);

        $data = $request->only(['nama', 'lokasi', 'ketinggian', 'status', 'gambar']);

        Gunung::create($data);

        return redirect()->route('gunungs.index')->with('success', 'Data gunung berhasil disimpan!');
    }


    public function show($id)
    {
        if (!Gate::allows('view-gunungs')) {
            abort(401);
        }

        $gunung = Gunung::findOrFail($id);
        return view('gunungs.show', compact('gunung'));
    }


    public function edit($id)
    {
        if (!Gate::allows('edit-gunungs')) {
            abort(401);
        }

        $gunung = Gunung::findOrFail($id);
        return view('gunungs.edit', compact('gunung'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('edit-gunungs')) {
            abort(401);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'ketinggian' => 'required|numeric',
            'status' => 'required|in:Aktif,Tidak Aktif,Meletus',
            'gambar' => 'nullable|url',  // Validasi gambar sebagai URL
        ]);

        $gunung = Gunung::findOrFail($id);
        $data = $request->only(['nama', 'lokasi', 'ketinggian', 'status', 'gambar']);

        $gunung->update($data);

        return redirect()->route('gunungs.index')->with('success', 'Data gunung berhasil diperbarui!');
    }
    public function destroy($id)
    {
        if (!Gate::allows('destroy-gunungs')) {
            abort(401);
        }

        $gunung = Gunung::findOrFail($id);
        $gunung->delete();

        return redirect()->route('gunungs.index')->with('success', 'Data gunung berhasil dihapus!');
    }
}
