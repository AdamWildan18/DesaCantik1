<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\Program;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Keluarga::with('programs', 'bantuans')->get();
        return view('pages.bantuan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) 
{
    $data = Keluarga::with('penduduks')->findOrFail($id);
    return view('pages.bantuan.create', compact('data'));
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'keluarga_id' => 'max:50|required',
            'bpnt'=> 'max:50',
            'pkh'=> 'max:50',
            'blt'=> 'max:50',
            'listrik'=> 'max:50',
            'pupuk'=> 'max:50',
            'lpg'=> 'max:50',
        ]);
        

        if ($data->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $data->messages(),
            ]);
        }else{
            $data = new Bantuan;
            $data->keluarga_id = $request->input('keluarga_id');
            $data->bpnt = $request->input('bpnt');
            $data->pkh = $request->input('pkh');
            $data->blt = $request->input('blt');
            $data->listrik = $request->input('listrik');
            $data->pupuk = $request->input('pupuk');
            $data->lpg = $request->input('lpg');

            $data->save();
        
            return response()->json(['success' => true, 'message' => 'Data Bantuan Berhasil Disimpan!!!']);
        }
    }

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
    public function edit($id)
    {
        //
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
        //
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
