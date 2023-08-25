<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeluargaController extends Controller
{
    public function index(Keluarga $keluarga)
    {

        // 

        return view('pages.keluarga.index', [
            'keluarga' => Keluarga::all()
            // 'keluarga' => Keluarga::withCount('penduduk')->get(),
        ]);
    }
    public function show(Keluarga $keluarga)
    {
        return view('pages.keluarga.detail', compact('keluarga'));
    }

    public function create()
    {
        $kk = Keluarga::all();
        return view('pages.keluarga.create', compact("kk"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required|max:255',
            'alamat' => 'required|max:255',
            'rt' => 'required|max:255',
            'rw' => 'required|max:255',
            'desa' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kabupaten' => 'required|max:255',
            'provinsi' => 'required|max:255',
        ]);
        Keluarga::create($validatedData);
        return redirect('/keluarga')->with('success', 'Data Berhasil Di Simpan!');
    }
    public function edit(Keluarga $keluarga)
    {
        $kk = Keluarga::with('penduduk')->paginate(10);
        return view('pages.keluarga.edit', compact('keluarga', 'kk'));
    }

    public function destroy(Keluarga $keluarga)
    {
        Keluarga::where('no_kk', $keluarga->no_kk)
            ->delete();
        return redirect('/keluarga')->with('success', 'Data Berhasil Di Ubah!');
    }
}
