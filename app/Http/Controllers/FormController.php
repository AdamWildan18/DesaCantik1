<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Relasi;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index($id)
    {
        $data = Keluarga::with('rumahs', 'penduduks', 'pendidikans', 'pekerjaans', 'kesehatans', 'sosials', 'programs')->findOrFail($id);
        // $penduduk = Penduduk::with('pendidikans')->findOrFail($id);
        // $data->rumahs()->attach($id);  
        return view('pages.form.index', compact('data', 'id'));
    }

    // public function show()
    // {
        
    // }

    public function verif()
    {
        $datauser = Auth()->user();
        if ($datauser) {
            $address = $datauser->address;
            if ($address === 'Pemkot'){
                $data = Keluarga::with('penduduks')->get();
            }else{
            $data = Keluarga::whereHas('penduduks.keluargas.users', function ($query) use ($address) {
                $query->where('address', $address);
            })
            ->get();
            }

            return view('pages.form.show')->with([
                'data' => $data,
            ]);
        }
    //     $data = Keluarga::with('rumahs','penduduks' )->get();
    //     return view('pages.form.show', compact('data'));
    }
}
