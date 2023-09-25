<?php

namespace App\Http\Controllers;

use no;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use App\Models\StatusPenduduk;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
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
                $data = Penduduk::with('keluargas')->orderBy('nama', 'asc')->filter()->paginate(10)->withQueryString();
            }else{
            $data = Penduduk::whereHas('keluargas.users', function ($query) use ($address) {
                $query->where('address', $address);
            })
            ->orderBy('nama', 'asc')->filter()->paginate(10)->withQueryString();
            }
        // $data = Penduduk::with('keluargas')->orderBy('nama', 'asc')->filter()->paginate(10)->withQueryString();
        }else{
            $data = Penduduk::with('keluargas')->orderBy('nama', 'asc')->filter()->paginate(10)->withQueryString();
        }
        return view('pages.penduduk.index')->with([
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
        return view('pages.penduduk.create', compact('data', 'id'));
        // return view('pages.penduduk.create', compact('kk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data =$request->all();
        $validator = Validator::make($request->all(), [
            'keluarga_id' => 'required|max:255',
            'nama' => 'required|max:100',
            'nik' => 'required|max:100|unique:penduduk',
            'keterangan' => 'required|max:100',
            'jenis_kelamin' => 'required|max:100',
            'tanggal_lahir' => 'required|max:100',
            'status_perkawinan' => 'required|max:100',
            'hub_keluarga' => 'required|max:100',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }elseif(count($data['keluarga_id'])){
            foreach ($data['keluarga_id'] as $item => $value){
                $data2 = array(
                    'keluarga_id' => $data['keluarga_id'][$item],
                    'nama' => $data['nama'][$item],
                    'nik' => $data['nik'][$item],
                    'keterangan' => $data['keterangan'][$item],
                    'jenis_kelamin' => $data['jenis_kelamin'][$item],
                    'tanggal_lahir' => $data['tanggal_lahir'][$item],
                    'status_perkawinan' => $data['status_perkawinan'][$item],
                    'hub_keluarga' => $data['hub_keluarga'][$item],
                );
                Penduduk::create($data2);
            }
            return response()->json(['success' => true, 'message' => 'Data Penduduk Berhasil Disimpan!!!']);
        }
    }


    public function fetchpenduduk()
    {
        $penduduk = Penduduk::all();
        return response()->json([
            'penduduk' => $penduduk,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Penduduk::paginate(5);
        return view('pages.penduduk.show')->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk, $id)
    {
        $data = Penduduk::findOrFail($id);
        $keluarga = Keluarga::all();
        // dd($data);
        return view('pages.penduduk.edit')->with([
            'data' => $data,
            'id' => $id,
            'keluarga' => $keluarga,
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
            'keluarga_id' => 'required|max:100',
            'nama' => 'required|max:100',
            'nik' => 'required|max:100',
            'keterangan' => 'required|max:100',
            'jenis_kelamin' => 'required|max:100',
            'tanggal_lahir' => 'required|max:100',
            'status_perkawinan' => 'required|max:100',
            'hub_keluarga' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = Penduduk::findOrFail($id);
            $data->keluarga_id = $request->input('keluarga_id');
            $data->nama = $request->input('nama');
            $data->nik = $request->input('nik');
            $data->keterangan = $request->input('keterangan');
            $data->jenis_kelamin = $request->input('jenis_kelamin');
            $data->tanggal_lahir = $request->input('tanggal_lahir');
            $data->status_perkawinan = $request->input('status_perkawinan');
            $data->hub_keluarga = $request->input('hub_keluarga');
            $data->update();
            return response()->json(['success' => true, 'message' => 'Data Berhasil Di Ubah!!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk, $id)
    {
        Penduduk::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Berhasil Dihapus!!!']);
    }
}
