<?php

namespace App\Http\Controllers;

use App\Models\asset;
use App\Models\Penduduk;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.ekonomi.index', [
            'data' => Asset::all(),
            'relasi' => Penduduk::all()
            // 'keluarga' => Keluarga::withCount('penduduk')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Penduduk::all();
        return view('pages.asset.create', compact("penduduk"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreassetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'asset_id' => 'required|max:255',
            'asset' => 'required|max:255',
            'jenis_asset' => 'required|max:255',
            // 'kondisi_asset' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $asset = new Asset;
            $asset->asset_id = $request->input('asset_id');
            $asset->asset = $request->input('asset');
            $asset->jenis_asset = $request->input('jenis_asset');
            // $asset->kondisi_asset = $request->input('kondisi_asset');
            $asset->save();
            return response()->json([
                'status' => 200,
                'message' => 'Tambah Data Asset Berhasil',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateassetRequest  $request
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateassetRequest $request, asset $asset)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(asset $asset)
    {
        //
    }
}
