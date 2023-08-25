@extends('pages.form.form')
@section('form')
<!-- table-responsive -->
<ul id="saveform_errList"></ul>
<div id="succes_message"></div>
<div id="keluarga"style="display: ">
    <table class="table table-sm">
        <thead class="thead" >
            <tr>
                <th>No</th>
                <th>Nomor Kartu Keluarga</th>
                <th>Nama Kepala Keluarga</th>
                <th>Keterangan Rumah</th>
                <th>Keterangan Demografi</th>
                <th>Pendidikan</th>
                <th>Ketenaga Kerjaan</th>
                <th>Usaha</th>
                <th>Kesehatan</th>
                <th>Program Perlindungan Sosial</th>
                <th>Program dan Layanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_kepala_keluarga }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        @if ($item->rumahs)
                        <button class="badge btn-success"> TerVerifikasi</button>
                        @else
                        <a href="/rumah/create/{{ $item->id }}">
                            <button class="badge btn-warning"> Verifikasi</button>
                        </a>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        @if ($item->penduduks->isEmpty())
                            <a href="/penduduk/create/{{ $item->id }}">
                                <button class="badge btn-warning"> Verifikasi</button>
                            </a>
                        @else
                            <button class="badge btn-success"> TerVerifikasi</button>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        @if ($item->pendidikans->isEmpty())
                            <a href="/pendidikan/create/{{ $item->id }}">
                                <button class="badge btn-warning"> Verifikasi</button>
                            </a>
                        @else
                            <button class="badge btn-success"> TerVerifikasi</button>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        @if ($item->pekerjaans->isEmpty())
                            <a href="/pekerjaan/create/{{ $item->id }}">
                                <button class="badge btn-warning"> Verifikasi</button>
                            </a>
                        @else
                            <button class="badge btn-success"> TerVerifikasi</button>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        @if ($item->usahas->isEmpty())
                            <a href="/usaha/create/{{ $item->id }}">
                                <button class="badge btn-warning"> Verifikasi</button>
                            </a>
                        @else
                            <button class="badge btn-success"> TerVerifikasi</button>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        @if ($item->kesehatans->isEmpty())
                            <a href="/kesehatan/create/{{ $item->id }}">
                                <button class="badge btn-warning"> Verifikasi</button>
                            </a>
                        @else
                            <button class="badge btn-success"> TerVerifikasi</button>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        @if ($item->sosials->isEmpty())
                            <a href="/sosial/create/{{ $item->id }}">
                                <button class="badge btn-warning"> Verifikasi</button>
                            </a>
                        @else
                            <button class="badge btn-success"> TerVerifikasi</button>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        @if ($item->programs)
                            <button class="badge btn-success"> TerVerifikasi</button>
                            @else
                            <a href="/program/create/{{ $item->id }}">
                                <button class="badge btn-warning"> Verifikasi</button>
                            </a>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">
                    <a href="/" class="btn btn-primary btn-sm">Selesai</a>
                </td>
            </tr>
        </tbody>
    </table>

</div>

<script>
    function reload(){
        location.reload()
    }
</script>



@endsection

