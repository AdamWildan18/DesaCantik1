@extends('layouts.app')
@section('container')
    <div class="container py-5">
        <div class="card text-center">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header border-2 border-primary">
                        <h1>Kartu Keluarga</h1>
                        {{-- <h2>No. {{ $keluarga->no_kk }}</h2> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="text-start">
                        <div class="card-body">
                            <table>
                                {{-- <tr>
                                    <td>Nama Kepala Keluarga</td>
                                    <td>:</td>
                                    <td>{{ $keluarga->kpl_keluarga }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $keluarga->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Rt/Rw</td>
                                    <td>:</td>
                                    <td>{{ $keluarga->rt }}/{{ $keluarga->rw }}</td>
                                </tr> --}}
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                    <div class="text-start">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>Desa/Kelurhan</td>
                                    <td>:</td>
                                    <td>{{ $keluarga->des_kel }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>:</td>
                                    <td>{{ $keluarga->kec }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-light">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama lengkap</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>pendidikan</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($keluarga->penduduk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->jns_kelamin }}</td>
                            <td>Bandung</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->pendidikan }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
            <table class="table table-bordered table-striped table-light">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Status Perkawinan</th>
                        <th>Tanggal Perkawinan</th>
                        <th>Status Hubungan Dalam keluarga</th>
                        <th>Kewarganegaraan</th>
                        <th>Ayah</th>
                        <th>Ibu</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($keluarga->penduduk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>{{ $item->sts_pernikahan }}</td>
                            <td>{{ $item->tgl_perkawinan }}</td>
                            <td>{{ $item->hubungan }}</td>
                            <td>{{ $item->kewarganegaraan }}</td>
                            <td>{{ $item->ayah }}</td>
                            <td>{{ $item->ibu }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
