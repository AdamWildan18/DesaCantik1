<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->input('search');
        $data = Program::whereHas('keluargas', function ($query)use($input){
            $query->where('nama_kepala_keluarga', 'LIKE', '%' . $input . '%');
        })->get();
        return view('pages.program.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Keluarga::findOrFail($id);
        return view('pages.program.create', compact('data','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // $data = $request->all();

        $validator = Validator::make($request->all(), [
            'keluarga_id' => 'required|max:50',
            'bantuan.*' => 'max:255',
            'tanggal_bantuan.*' => 'max:255',
            'asset_bergerak.*' => 'max:255',
            'lahan_lain' => 'max:255',
            'bangunan_lain' => 'max:255',
            'sapi' => 'max:255',
            'kerbau' => 'max:255',
            'kuda' => 'max:255',
            'kambing' => 'max:255',
            'akses_internet' => 'max:255',
            'rekening_dompetdigital' => 'max:255',
            'point' => 'max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $bantuanstring = implode(',', $request->bantuan ?? []);
            $tanggalstring = implode(',', $request->tanggal_bantuan ?? []);
            $assetstring = implode(',', $request->asset_bergerak ?? []);
            $internet = implode(',', $request->akses_internet ?? []);
            $digital = implode(',', $request->rekening_dompetdigital ?? []);
        
            $data = Program::create([
                'keluarga_id' => $request->keluarga_id,
                'bantuan' => $bantuanstring,
                'tanggal_bantuan' => $tanggalstring,
                'asset_bergerak' => $assetstring,
                'lahan_lain' => $request->lahan_lain,
                'bangunan_lain' => $request->bangunan_lain,
                'sapi' => $request->sapi,
                'kerbau' => $request->kerbau,
                'kuda' => $request->kuda,
                'kambing' => $request->kambing,
                'akses_internet' => $internet,
                'point' => $request->point,
                'rekening_dompetdigital' => $digital,
            ]);
            return response()->json(['success' => true, 'message' => 'Data saved successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program, Request $request, $id)
    {
        $data = Program::with('keluargas')->find($id);
        $bantuanstring = explode(',', $data->bantuan);
        $tanggalstring = explode(',', $data->tanggal_bantuan);
        $assetbergerak = explode(',', $data->asset_bergerak);
        $internet = explode(',', $data->akses_internet);
        $digital = explode(',', $data->rekening_dompetdigital);
        $datadigital = [
            'Usaha',
            'Pribadi',
            'Usaha Dan Pribadi',
        ];
        $datainternet = [
            'Internet dan TV Digital Berlangganan',
            'Wifi',
            'Internet HandPhone',
        ];
        $databantuan = [
            'Program Bantuan Sosial Sembako/BPNT',
            'Program Keluarga Harapan (PKH)',
            'Program Bantuan Langsung Tunai (BLT)Desa',
            'Program Subsidi Listrik (gratis/pemotongan biaya)',
            'Program Bantuan Subsidi Pupuk',
            'Program Bantuan Subsidi LPG',
        ];
        $dataasset1 = [
            'Tabung Gas Min.5.5',
            'Lemari Es/Kulkas',
            'Air Conditioner (AC)',
            'Water Heater',
            'Telepon Rumah',
            'SmartPhone',
        ];
        $dataasset2 = [
            'Televisi Layar Datar (Min.30inc)',
            'Emas/Perhiasan (Min.10gram)',
            'Komputer/Laptop/Tablet',
            'Sepeda Motor',
            'Sepeda',
            'Mobil',
        ];

        return view('pages.program.edit', compact('data','dataasset1','dataasset2','assetbergerak','tanggalstring', 'bantuanstring', 'databantuan', 'datainternet', 'internet', 'digital', 'datadigital'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'keluarga_id' => 'required|max:50',
            'bantuan.*' => 'max:255',
            'tanggal_bantuan.*' => 'max:255',
            'asset_bergerak.*' => 'max:255',
            'lahan_lain' => 'max:255',
            'bangunan_lain' => 'max:255',
            'sapi' => 'max:255',
            'kerbau' => 'max:255',
            'kuda' => 'max:255',
            'kambing' => 'max:255',
            'akses_internet' => 'max:255',
            'rekening_dompetdigital' => 'max:255',
            'point' => 'max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $bantuanstring = implode(',', $request->bantuan ?? []);
            $tanggalstring = implode(',', $request->tanggal_bantuan ?? []);
            $assetstring = implode(',', $request->asset_bergerak ?? []);
            $internet = implode(',', $request->akses_internet ?? []);
            $digital = implode(',', $request->rekening_dompetdigital ?? []);
        
            $data = Program::findOrFail($id);
            $data->bantuan = $bantuanstring;
            $data->tanggal_bantuan = $tanggalstring;
            $data->asset_bergerak = $assetstring;
            $data->lahan_lain = $request->lahan_lain;
            $data->bangunan_lain = $request->bangunan_lain;
            $data->sapi = $request->sapi;
            $data->kerbau = $request->kerbau;
            $data->kuda = $request->kuda;
            $data->kambing = $request->kambing;
            $data->akses_internet = $internet;
            $data->point = $request->point;
            $data->rekening_dompetdigital = $digital;

            $data->update();
            return response()->json(['success' => true, 'message' => 'Data Program Berhasil Disimpan!!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program, $id)
    {
        Program::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Data Program Berhasil Dihapus!!!']);
    }
}
