<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gunung;
use App\Models\Jalur;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class JalurController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view-jalurs')) {
            abort(401);
        }

        $jalurs = Jalur::with('gunung')->get();
        return view('jalurs.index', compact('jalurs'));
    }

    public function create()
    {
        if (!Gate::allows('store-jalurs')) {
            abort(401);
        }

        $gunungs = Gunung::all();
        return view('jalurs.create', compact('gunungs'));
    }
    public function store(Request $request)
    {
        if (!Gate::allows('store-jalurs')) {
            abort(401);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'gunung_id' => 'required|exists:gunungs,id',
            'status' => 'required|in:Aktif,Tidak Aktif,Ditutup',
        ]);

        Jalur::create($request->only(['nama', 'gunung_id', 'status']));

        return redirect()->route('jalurs.index')->with('success', 'Data jalur berhasil disimpan!');
    }
    public function show($id)
    {
        if (!Gate::allows('view-jalurs')) {
            abort(401);
        }

        $jalur = Jalur::with('gunung')->findOrFail($id);
        return view('jalurs.show', compact('jalur'));
    }

    public function edit($id)
    {
        if (!Gate::allows('edit-jalurs')) {
            abort(401);
        }

        $jalur = Jalur::findOrFail($id);
        $gunungs = Gunung::all();
        return view('jalurs.edit', compact('jalur', 'gunungs'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('edit-jalurs')) {
            abort(401);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'gunung_id' => 'required|exists:gunungs,id',
            'status' => 'required|in:Aktif,Tidak Aktif,Ditutup',
        ]);

        $jalur = Jalur::findOrFail($id);
        $jalur->update($request->only(['nama', 'gunung_id', 'status']));

        return redirect()->route('jalurs.index')->with('success', 'Data jalur berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (!Gate::allows('destroy-jalurs')) {
            abort(401);
        }

        $jalur = Jalur::findOrFail($id);
        $jalur->delete();

        return redirect()->route('jalurs.index')->with('success', 'Data jalur berhasil dihapus!');
    }
}
