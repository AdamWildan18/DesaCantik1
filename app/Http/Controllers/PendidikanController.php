<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;

class PendidikanController extends Controller
{
    public function index(Request $request)
    {
        $datauser = Auth()->user();
        $input = $request->input('search');
        if ($datauser) {
            $address = $datauser->address;
            if ($address === 'Pemkot'){
                $data = Pendidikan::with('penduduks')->get();
            }else{
            $data = Pendidikan::whereHas('penduduks.keluargas.users', function ($query) use ($address) {
                $query->where('address', $address);
            })
            ->whereHas('penduduks', function ($query)use($input){
                    $query->where('nama', 'LIKE', '%' . $input . '%');
            })
            ->get();
            }
        }else{
            $data = Pendidikan::with('penduduks')->get();
        }
        return view('pages.pendidikan.index')->with([
            'data' => $data,
        ]);
    }
    public function create($id)
    {
        $data = Keluarga::with('penduduks')->findOrFail($id);
        $count = Penduduk::where('keluarga_id', $id)->count();
        return view('pages.pendidikan.create', compact('data', 'id', 'count'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penduduk_id.*' => 'required|integer', 
            'partisipasi_sekolah.*' => 'max:100', 
            'jenjang_tertinggi.*' => 'max:100', 
            'kelas_tertinggi.*' => 'max:100', 
            'ijajah.*' => 'max:100', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            foreach ($request->penduduk_id as $key => $pendudukId) {

                $kesehatan = new Pendidikan();
                $kesehatan->penduduk_id = $pendudukId;
                $kesehatan->partisipasi_sekolah = $request->partisipasi_sekolah[$key];
                $kesehatan->jenjang_tertinggi = $request->jenjang_tertinggi[$key];
                $kesehatan->kelas_tertinggi = $request->kelas_tertinggi[$key];
                $kesehatan->ijajah = $request->ijajah[$key];
                $kesehatan->save();
            }
            return response()->json(['success' => true, 'message' => 'Data Pendidikan Berhasil Disimpan']);
        }
    }

    public function edit($id)
    {
        $data = Pendidikan::with('penduduks')->findOrFail($id);
        // dd($data);
        return view('pages.pendidikan.edit', compact('data', 'id'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'penduduk_id.*' => 'required|integer', 
            'partisipasi_sekolah.*' => 'max:100', 
            'jenjang_tertinggi.*' => 'max:100', 
            'kelas_tertinggi.*' => 'max:100', 
            'ijajah.*' => 'max:100', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $kesehatan = Pendidikan::findOrFail($id);
            // $kesehatan->penduduk_id = $pendudukId;
            $kesehatan->partisipasi_sekolah = $request->partisipasi_sekolah;
            $kesehatan->jenjang_tertinggi = $request->jenjang_tertinggi;
            $kesehatan->kelas_tertinggi = $request->kelas_tertinggi;
            $kesehatan->ijajah = $request->ijajah;
            $kesehatan->update();
            return response()->json(['success' => true, 'message' => 'Data Pendidikan Berhasil Diubah!!!']);
        }
    }

    public function destroy($id)
    {
        Pendidikan::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Pendidikan Berhasil Dihapus!!!']);
    }

}
