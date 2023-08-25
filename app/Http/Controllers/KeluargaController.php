<?php

namespace App\Http\Controllers;

// use App\Models\Relasi;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Relasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Keluarga::with('penduduks')->filter()->paginate(10)->withQueryString();
        return view('pages.keluarga.index')->with([
            'data' => $data,
            // 'pen' => $pen,
            // 'pen' => $pen,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Keluarga::with('penduduks')->get();
        return view('pages.keluarga.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Keluarga $id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|max:255|unique:keluarga',
            'nama_kepala_keluarga' => 'required|max:255',
        ]);
        // $request->session()->put('data', $validator('no_kk'));

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $keluarga = new Keluarga;
            $keluarga->id = $request->input('id');
            $keluarga->nama_kepala_keluarga = $request->input('nama_kepala_keluarga');
            $keluarga->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data Berhasil Disimpan',
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
        $data = Keluarga::paginate(5);
        return view('pages.keluarga.edit')->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Keluarga::with('penduduks')->findOrFail($id);
        return view('pages.keluarga.edit', compact('data', 'id'));
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
            'id' => 'required|max:255|unique:keluarga',
            'nama_kepala_keluarga' => 'required|max:255',
        ]);
        // $request->session()->put('data', $validator('no_kk'));

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $keluarga = Keluarga::find($id);
            $keluarga->id = $request->input('id');
            $keluarga->nama_kepala_keluarga = $request->input('nama_kepala_keluarga');
            $keluarga->update();
            return response()->json([
                'status' => 200,
                'message' => 'Data Berhasil Disimpan',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluarga $keluarga, $id)
    {
        Keluarga::destroy($id);

        return redirect('/keluarga')->with('success', 'Data Berhasil Di Hapus!');
    }
}
