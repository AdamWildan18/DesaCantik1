<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\StatusPenduduk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nik)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nik = $request->nik;
        $data = array(
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        );
        StatusPenduduk::updateOrInsert(['nik' => $nik], $data);
        return redirect('/penduduk');
    }
    //     $validator = Validator::make($request->all(), [
    //         'nik' => 'required|max:255',
    //         'status' => 'required|max:255',
    //         'tanggal' => 'required|max:255',
    //         'keterangan' => 'required|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 400,
    //             'errors' => $validator->messages(),
    //         ]);
    //     } else {
    //         $status = new StatusPenduduk();
    //         $status->nik = $request->input('nik');
    //         $status->tanggal = $request->input('tanggal');
    //         $status->keterangan = $request->input('keterangan');
    //         $status->save();
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Tambah Data Penduduk Berhasil',
    //         ]);
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $data = Penduduk::findOrFail($nik);
        return view('pages.penduduk.statusdasar')->with([
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusPenduduk $statusPenduduk)
    {
        // $validatedData = $request->validate([
        //     'nik' => 'required|max:255|unique:penduduk',
        //     'status' => 'required|max:255',
        //     'tanggal' => 'required|max:255',
        //     'keterangan' => 'required|max:255',
        // ]);

        // StatusPenduduk::where('nik', $statusPenduduk->nik)
        //     ->update($validatedData);
        // return redirect('/penduduk')->with('success', 'Data Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
