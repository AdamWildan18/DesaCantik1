<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\Ketenagakejaan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class KetenagakerjaanController extends Controller
{
    public function index(Request $request)
    {
        $datauser = Auth()->user();
        $input = $request->input('search');
        if ($datauser) {
            $address = $datauser->address;
            if ($address === 'Pemkot'){
                $data = Ketenagakejaan::with('penduduks')->get();
            }else{
            $data = Ketenagakejaan::whereHas('penduduks.keluargas.users', function ($query) use ($address) {
                $query->where('address', $address);
            })
            ->whereHas('penduduks', function ($query)use($input){
                    $query->where('nama', 'LIKE', '%' . $input . '%');
            })
            ->get();
            }
        }else{
            $data = Ketenagakejaan::with('penduduks')->get();
        }
        return view('pages.pekerjaan.index')->with([
            'data' => $data,
        ]);
    }
    public function create(Request $request, $id)
    {
        $data = Keluarga::with('penduduks')->findOrFail($id);
        return view('pages.pekerjaan.create', compact('data', 'id'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id.*' => 'required|integer', 
            'sts_bekerja.*' => 'max:100', 
            'jam_kerja.*' => 'max:100', 
            'lapangan_kerja.*' => 'max:100', 
        ]);

        foreach ($request->penduduk_id as $key => $pendudukId) {

            $kesehatan = new Ketenagakejaan();
            $kesehatan->penduduk_id = $pendudukId;
            $kesehatan->sts_bekerja = $request->sts_bekerja[$key];
            $kesehatan->jam_kerja = $request->jam_kerja[$key];
            $kesehatan->lapangan_kerja = $request->lapangan_kerja[$key];
            $kesehatan->save();
        }
        return response()->json(['success' => true, 'message' => 'Data Ketenagakerjaan Berhasil Disimpan!!!']);
    }

    public function edit($id)
    {
        $data = Ketenagakejaan::with('penduduks')->findOrFail($id);
        return view('pages.pekerjaan.edit', compact('data', 'id'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'sts_bekerja.*' => 'max:100', 
            'jam_kerja.*' => 'max:100', 
            'lapangan_kerja.*' => 'max:100', 
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $kesehatan = Ketenagakejaan::findOrFail($id);
            $kesehatan->sts_bekerja = $request->sts_bekerja;
            $kesehatan->jam_kerja = $request->jam_kerja;
            $kesehatan->lapangan_kerja = $request->lapangan_kerja;
            $kesehatan->update();
            return response()->json(['success' => true, 'message' => 'Data Ketenagakerjaan Berhasil Diubah!!!']);
        }
    }

    public function destroy($id)
    {
        Ketenagakejaan::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Ketenagakerjaan Berhasil Dihapus!!!']);
    }
}
