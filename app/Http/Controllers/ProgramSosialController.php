<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\ProgramSosial;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class ProgramSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->input('search');
        $data = ProgramSosial::whereHas('penduduks', function ($query)use($input){
            $query->where('nama', 'LIKE', '%' . $input . '%');
        })->get();
        return view('pages.PSosial.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Keluarga::with('penduduks')->findOrFail($id);
        return view('pages.PSosial.create', compact('data','id'));
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
            'penduduk_id.*' => 'required|integer|unique:sosial,penduduk_id', 
            'jaminan_kesehatan.*' => 'max:50', 
            'pra_kerja.*' => 'max:50|nullable', 
            'kur.*' => 'max:50|nullable', 
            'ultra_mikro.*' => 'max:50|nullable', 
            'pip.*' => 'max:50|nullable', 
            'jaminan_ketenagakerjaan.*' => 'max:255|nullable', 
            'point.*' => 'max:255|nullable', 
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else{
            foreach ($request->penduduk_id as $pendudukId) {
                $data = new ProgramSosial();
                $data->penduduk_id = $pendudukId;
                $data->jaminan_kesehatan = $request->input("jaminan_kesehatan.$pendudukId");
                $data->pra_kerja = $request->input("pra_kerja.$pendudukId");
                $data->kur = $request->input("kur.$pendudukId");
                $data->ultra_mikro = $request->input("ultra_mikro.$pendudukId");
                $data->pip = $request->input("pip.$pendudukId");
                $data->point = $request->input("point.$pendudukId");
                
                // For jaminan_ketenagakerjaan, you need to handle it differently
                $Jketenegakerjaan = implode(',', $request->input("jaminan_ketenagakerjaan.$pendudukId", []));
                $data->jaminan_ketenagakerjaan = $Jketenegakerjaan;
                
                $data->save();
            }
            return response()->json(['success' => true, 'message' => 'Data Program Sosial Berhasil Disimpan!!']);
        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramSosial  $programSosial
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramSosial $programSosial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramSosial  $programSosial
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramSosial $programSosial, $id)
    {
        $data = ProgramSosial::findOrFail($id);
        $jaminan = explode(',', $data->jaminan_ketenagakerjaan);
        $ketenagakerjaan = [
            'BPJS Kecelakaan Kerja',
            'BPJS Jaminan Kematian',
            'BPJS Jaminan Hari Tua',
            'BPJS Jaminan Pensiun',
        ];


        return view('pages.Psosial.edit', compact('data', 'id', 'jaminan', 'ketenagakerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramSosial  $programSosial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jaminan_kesehatan.*' => 'max:50', 
            'pra_kerja.*' => 'max:50|nullable', 
            'kur.*' => 'max:50|nullable', 
            'ultra_mikro.*' => 'max:50|nullable', 
            'pip.*' => 'max:50|nullable', 
            'jaminan_ketenagakerjaan.*' => 'max:255|nullable', 
            'point.*' => 'max:255|nullable', 
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else{
                $Jketenegakerjaan = implode(',', $request->jaminan_ketenagakerjaan ?? []);
                $data = ProgramSosial::findOrFail($id);
                $data->jaminan_kesehatan = $request->jaminan_kesehatan;
                $data->pra_kerja = $request->pra_kerja;
                $data->kur = $request->kur;
                $data->ultra_mikro = $request->ultra_mikro;
                $data->pip = $request->pip;
                $data->point = $request->point;
                $data->jaminan_ketenagakerjaan = $Jketenegakerjaan;
                $data->update();
                return response()->json(['success' => true, 'message' => 'Data Program Sosial Berhasil Diubah!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramSosial  $programSosial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramSosial $programSosial, $id)
    {
        ProgramSosial::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Program Sosial Berhasil Dihapus!!']);
    }
}
