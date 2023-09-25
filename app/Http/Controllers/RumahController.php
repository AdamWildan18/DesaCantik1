<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datauser = Auth()->user();

        if ($datauser) {
            $address = $datauser->address;
            if ($address === 'Pemkot'){
                $data = Rumah::with('keluargas')->filter()->paginate(10)->withQueryString();
            }else{
            $data = Rumah::whereHas('keluargas.users', function ($query) use ($address) {
                $query->where('address', $address);
            })
            ->filter()->paginate(10)->withQueryString();
            }
            // $data = Penduduk::with('keluargas')->orderBy('nama', 'asc')->filter()->paginate(10)->withQueryString();
        }else{
            $data = Rumah::with('keluargas')->filter()->paginate(10)->withQueryString();
        }
        return view('pages.rumah.index')->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kk = Keluarga::all();
        return view('pages.rumah.create', compact('kk', 'id'));
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
            'keluarga_id' => 'max:100|required|unique:rumah',
            'sts_kepemilikan' => 'max:100|required',
            'surat_kepemilikan' => 'max:100|required',
            'luas_lantai' => 'max:100|required',
            'jenis_lantai' => 'max:100|required',
            'jenis_dinding' => 'max:100|required',
            'jenis_atap' => 'max:100|required',
            'air_minum' => 'max:100|required',
            'sumber_penerangan' => 'max:100|required',
            'daya_penerangan' => 'max:100|required',
            'bahan_masak' => 'max:100|required',
            'fasilitas_toilet' => 'max:100|required',
            'jenis_kloset' => 'max:100|required',
            'pembuangan' => 'max:100|required',
            'point' => 'max:100|required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $rumah = new Rumah;
            $rumah->keluarga_id = $request->keluarga_id;
            $rumah->sts_kepemilikan = $request->input('sts_kepemilikan');
            $rumah->surat_kepemilikan = $request->input('surat_kepemilikan');
            $rumah->luas_lantai = $request->input('luas_lantai');
            $rumah->jenis_lantai = $request->input('jenis_lantai');
            $rumah->jenis_dinding = $request->input('jenis_dinding');
            $rumah->jenis_atap = $request->input('jenis_atap');
            $rumah->air_minum = $request->input('air_minum');
            $rumah->sumber_penerangan = $request->input('sumber_penerangan');
            $rumah->daya_penerangan = $request->input('daya_penerangan');
            $rumah->bahan_masak = $request->input('bahan_masak');
            $rumah->fasilitas_toilet = $request->input('fasilitas_toilet');
            $rumah->jenis_kloset = $request->input('jenis_kloset');
            $rumah->pembuangan = $request->input('pembuangan');
            $rumah->point = $request->input('point');
            $rumah->save();
            return response()->json([
                'status' => 200,
                'message' => 'Tambah Data Aset Rumah Berhasil',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Rumah::findOrFail($id)->get();
        return view('pages.rumah.edit')->with([
            'data' => $data,
            'id' => $id

        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'keluarga_id' => 'max:100',
            'sts_kepemilikan' => 'max:100',
            'surat_kepemilikan' => 'max:100',
            'jenis_lantai' => 'max:100',
            'jenis_dinding' => 'max:100',
            'jenis_atap' => 'max:100',
            'air_minum' => 'max:100',
            'sumber_penerangan' => 'max:100',
            'daya_penerangan' => 'max:100',
            'bahan_masak' => 'max:100',
            'fasilitas_toilet' => 'max:100',
            'jenis_kloset' => 'max:100',
            'pembuangan' => 'max:100',
            'point' => 'max:100',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = Rumah::findOrFail($id);
            $data->keluarga_id = $request->input('keluarga_id');
            $data->sts_kepemilikan = $request->input('sts_kepemilikan');
            $data->surat_kepemilikan = $request->input('surat_kepemilikan');
            $data->jenis_lantai = $request->input('jenis_lantai');
            $data->jenis_dinding = $request->input('jenis_dinding');
            $data->jenis_atap = $request->input('jenis_atap');
            $data->air_minum = $request->input('air_minum');
            $data->sumber_penerangan = $request->input('sumber_penerangan');
            $data->daya_penerangan = $request->input('daya_penerangan');
            $data->bahan_masak = $request->input('bahan_masak');
            $data->fasilitas_toilet = $request->input('fasilitas_toilet');
            $data->jenis_kloset = $request->input('jenis_kloset');
            $data->pembuangan = $request->input('pembuangan');
            $data->point = $request->input('point');
            $data->update();
            return response()->json([
                'status' => 200,
                'message' => 'Edit Data Keluarga Berhasil',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rumah $rumah, $id)
    {
        Rumah::where('id', $id)->delete();
        return redirect('/rumah')->with('success', 'Data Berhasil Di Hapus');
    }
}
