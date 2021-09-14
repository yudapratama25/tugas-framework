<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('name', 'asc')->get();
        return view('dashboard', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil diubah');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
