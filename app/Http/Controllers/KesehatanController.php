<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Kesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Exception;

class KesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->input('search');
        $data = Kesehatan::whereHas('penduduks', function ($query)use($input){
            $query->where('nama', 'LIKE', '%' . $input . '%');
        })->get();
        return view('pages.kesehatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Keluarga::with('penduduks')->findOrFail($id);
        return view('pages.kesehatan.create', compact('data','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penduduk_id.*' => 'required|integer|unique:kesehatan,penduduk_id', // Assuming penduduk_id is an integer
            'giji_anak.*' => 'required',
            'point.*' => 'max:100',
            // Add more validation rules for checkboxes as needed
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            foreach ($request->penduduk_id as $key => $pendudukId) {

                $gangguanString = implode(',', $request->gangguan[$pendudukId] ?? []);
                $kesehatanKronisString = implode(',', $request->kesehatan_kronis[$pendudukId] ?? []);
    
    
                $kesehatan = new Kesehatan();
                $kesehatan->penduduk_id = $pendudukId;
                $kesehatan->point = $request->point[$pendudukId];
                $kesehatan->giji_anak = $request->giji_anak[$pendudukId];
                $kesehatan->gangguan = $gangguanString;
                $kesehatan->kesehatan_kronis = $kesehatanKronisString;
                $kesehatan->save();
            }
            return response()->json(['success' => true, 'message' => 'Data Kesehatan Berhasil Disimpan!!!']);
        }
        

    }

    public function show(Kesehatan $kesehatan)
    {
        //
    }

    public function edit(Kesehatan $kesehatan, $id)
    {
        $data = Kesehatan::findOrFail($id);
        $gangguan = explode(',', $data->gangguan);
        $kesehatan = explode(',', $data->kesehatan_kronis);
        $dataGangguan = [
            'Gangguan mata',
            'Gangguan Jari',
            'Gangguan Kemampuan Intelektual',
            'Gangguan perilaku',
            'Gangguan Komunikasi',
            'Gangguan Mengurus Diri',
            'Gangguan Konsentrasi',
            'Gangguan Depresi'
        ];
        $kronis = [
            'Darah Tinggi',
            'Rematik',
            'Asma',
            'Masalah Jantung',
            'Kencing Manis',
            'TBC',
            'Stroke',
            'Kangker / Tumor Ganas',
            'Gagal Ginjal',
            'HIV / AIDS',
            'Kolestrol',
            'Sirosis Hati',
            'Thalasemia',
            'Hemofilia',
        ];
        // dd($dataGangguan);

        return view('pages.kesehatan.edit', compact('data', 'gangguan', 'kesehatan', 'dataGangguan', 'kronis', 'id'));
    }


    public function update(Request $request, Kesehatan $kesehatan, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'penduduk_id.*' => 'required|integer|unique:kesehatan,penduduk_id', // Assuming penduduk_id is an integer
            'giji_anak.*' => 'required', 
            'point.*' => 'max:100', 
            // Add more validation rules for checkboxes as needed
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            // foreach ($request->penduduk_id as $key => $pendudukId) {

                $gangguanString = implode(',', $request->gangguan ?? []);
                $kesehatanKronisString = implode(',', $request->kesehatan_kronis ?? []);
    
    
                $kesehatan = Kesehatan::findOrFail($id);
                $kesehatan->giji_anak = $request->giji_anak;
                $kesehatan->gangguan = $gangguanString;
                $kesehatan->kesehatan_kronis = $kesehatanKronisString;
                $kesehatan->point = $request->point;
                $kesehatan->update();
            // }
            return response()->json(['success' => true, 'message' => 'Data Kesehatan Berhasil Disimpan!!!']);
        }
    }


    public function destroy(Kesehatan $kesehatan, $id)
    {
        Kesehatan::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Kesehatan Berhasil Dihapus!!!']);
    }
}
