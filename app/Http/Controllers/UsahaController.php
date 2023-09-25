<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datauser = Auth()->user();
        $input = $request->input('search');
        if ($datauser) {
            $address = $datauser->address;
            if ($address === 'Pemkot'){
                $data = Usaha::with('penduduks')->get();
            }else{
            $data = Usaha::whereHas('penduduks.keluargas.users', function ($query) use ($address) {
                $query->where('address', $address);
            })
            ->whereHas('penduduks', function ($query)use($input){
                    $query->where('nama', 'LIKE', '%' . $input . '%');
            })
            ->get();
            }
        }else{
            $data = Usaha::with('penduduks')->get();
        }
        return view('pages.usaha.index')->with([
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
        $data = Keluarga::with('penduduks')->findOrFail($id);
        return view('pages.usaha.create', compact('data', 'id'));
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
            'penduduk_id.*' => 'required|integer', 
            'kepemilikan_usaha.*' => 'max:50', 
            'internet_usaha.*' => 'max:50', 
            'jumlah_pekerja.*' => 'max:50', 
            'lapangan_usaha.*' => 'max:50', 
            'jumlah_usaha.*' => 'max:50', 
            'omset_usaha.*' => 'max:50', 
            'point.*' => 'max:100', 
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            foreach ($request->penduduk_id as $key => $pendudukId) {
                $data = new Usaha();
                $data->penduduk_id = $pendudukId;
                $data->kepemilikan_usaha = $request->kepemilikan_usaha[$pendudukId];
                $data->internet_usaha = $request->internet_usaha[$pendudukId];
                $data->jumlah_pekerja = $request->jumlah_pekerja[$key];
                $data->lapangan_usaha = $request->lapangan_usaha[$key];
                $data->jumlah_usaha = $request->jumlah_usaha[$key];
                $data->omset_usaha = $request->omset_usaha[$key];
                $data->point = $request->point[$pendudukId];
                $data->save();
            }
            return response()->json(['success' => true, 'message' => 'Data Usaha Berhasi Disimpan!!!']);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function show(Usaha $usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function edit(Usaha $usaha, $id)
    {
        $data = Usaha::findOrFail($id);
        return view('pages.usaha.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $validator = Validator::make($request->all(), [
                'kepemilikan_usaha.*' => 'max:50', 
                'internet_usaha.*' => 'max:50', 
                'jumlah_pekerja.*' => 'max:50', 
                'lapangan_usaha.*' => 'max:50', 
                'jumlah_usaha.*' => 'max:50', 
                'omset_usaha.*' => 'max:50', 
                'point.*' => 'max:100', 
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->messages(),
                ]);
            }else{
                $data = Usaha::findOrFail($id);
                $data->kepemilikan_usaha = $request->kepemilikan_usaha;
                $data->internet_usaha = $request->internet_usaha;
                $data->jumlah_pekerja = $request->jumlah_pekerja;
                $data->lapangan_usaha = $request->lapangan_usaha;
                $data->jumlah_usaha = $request->jumlah_usaha;
                $data->omset_usaha = $request->omset_usaha;
                $data->point = $request->point;
                $data->update();

                return response()->json(['success' => true, 'message' => 'Data Usaha Berhasi Diubah!!!']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usaha $usaha, $id)
    {
        Usaha::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Usaha Berhasi Dihapus!!!']);
    }
}
