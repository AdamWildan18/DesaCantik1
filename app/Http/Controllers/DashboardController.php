<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

class DashboardController extends Controller
{
    public function index()
    {

        return view('pages.home');
    }

    public function getData(Request $request) {
        $selectedYear = $request->input('year');
    
        if ($selectedYear === null) {
            $pendudukCount = Penduduk::count();
            $keluargaCount = Keluarga::count();
            $pindahCount = Penduduk::where('keterangan', 'Pindah Ke Wilayah Lain', 'Pindah ke Negara Lain')->count();
            $meninggalCount = Penduduk::where('keterangan', 'Meninggal')->count();
            $lakiCount = Penduduk::where('jenis_kelamin', 'Laki-laki')->count();
            $perempuanCount = Penduduk::where('jenis_kelamin', 'Perempuan')->count();
        } else {
            $pendudukCount = Penduduk::whereYear('created_at', $selectedYear)->count();
            $keluargaCount = Keluarga::whereYear('created_at', $selectedYear)->count();
            $pindahCount = Penduduk::where('keterangan', 'Pindah Ke Wilayah Lain', 'Pindah ke Negara Lain')->whereYear('created_at', $selectedYear)->count();
            $meninggalCount = Penduduk::where('keterangan', 'Meninggal')->whereYear('created_at', $selectedYear)->count();
            $lakiCount = Penduduk::where('jenis_kelamin', 'Laki-laki')->whereYear('created_at', $selectedYear)->count();
            $perempuanCount = Penduduk::where('jenis_kelamin', 'Perempuan')->whereYear('created_at', $selectedYear)->count();
        }
        
    // Retrieve statistics from your database using Eloquent or DB queries
    

    // Return the statistics as a JSON response
    return response()->json([
        'penduduk' => $pendudukCount,
        'keluarga' => $keluargaCount,
        'pindah' => $pindahCount,
        'meninggal' => $meninggalCount,
        'laki' => $lakiCount,
        'perempuan' => $perempuanCount,
    ]);
    }

    public function chart()
    {
        $startYear = 2020;
        $currentYear = date('Y');

        $years = range($startYear, $currentYear);

        $data = [];

        foreach ($years as $year) {
            $penduduk = Penduduk::whereYear('created_at', $year)->count();
            $laki = Penduduk::where('jenis_kelamin', 'Laki-laki')->whereYear('created_at', $year)->count();
            $perempuan = Penduduk::where('jenis_kelamin', 'Perempuan')->whereYear('created_at', $year)->count();
            $meninggal = Penduduk::where('keterangan', 'Meninggal')->whereYear('created_at', $year)->count();
            $pindah = Penduduk::where('keterangan', 'Pindah Ke Wilayah lain', 'Pindah ke Negara Lain')->whereYear('created_at', $year)->count();

            $keluargaData = Keluarga::whereYear('created_at', $year)
                ->count();

            $data[] = [
                'year' => $year,
                'total_laki_laki' => $laki,
                'total_perempuan' => $perempuan,
                'total_pindah_kota' => $pindah,
                'total_meninggal' => $meninggal,
                'total_keluarga' => $keluargaData,
                'total_penduduk' => $penduduk
            ];
        }

        return response()->json($data);
    }
}
