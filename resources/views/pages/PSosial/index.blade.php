@extends('layouts.app')
@section('container')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            @if (session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="white_box_tittle list_header">
                                <h3>Data Keterangan Kesehatan</h3>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form action="/sosial" method="GET">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control border-primary"
                                                        name="search" placeholder="Search..">
                                                    <button class="btn btn-outline-secondary btn-primary btn-sm"
                                                        type="submit" id="button-addon2"><i
                                                            class="bi bi-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="QA_table"
                                id="show">
                                <!-- table-responsive -->
                                <ul id="saveform_errList"></ul>
                                <div id="succes_message"></div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            @guest
                                            @else
                                            <th><i class="bi bi-gear-wide">Aksi</i></th>
                                            @endguest
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jaminan Kesehatan</th>
                                            <th>Program</th>
                                            <th>Jaminan ketenagakerjaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                @guest
                                                @else
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-secondary dropdown-toggle badge"
                                                            href="#" role="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span><i class="bi bi-gear"></i></a></span>
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="/sosial/edit/{{ $item->id }}">
                                                                    <button type="button"
                                                                    class="badge bg-warning dropdown-item edit_penduduk">
                                                                    <i class="bi bi-tools"> Edit Data</i>
                                                                    </button>
                                                                </a>
                                                                
                                                            </li>
                                                            <li>
                                                                <form action="/sosial/delete/{{ $item->id }}" class="deletesosial"
                                                                    method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="badge bg-danger dropdown-item"
                                                                        onclick="return confirm('Anda Yakin?')"><span><i
                                                                                class="bi bi-trash2"></i>
                                                                            Hapus Data</span>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                @endguest
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="col-2">{{ $item->penduduks->nama}}</td>
                                                <td>
                                                    @if ($item->jaminan_kesehatan == null)
                                                        -
                                                    @else
                                                        {{ $item->jaminan_kesehatan }}</td>
                                                    @endif
                                                <td>
                                                    @if($item->pra_kerja == 0)
                                                    @else
                                                    {{ $item->pra_kerja }} <br>
                                                    @endif

                                                    @if($item->kur == 0)
                                                    @else
                                                    {{ $item->kur }}<br>
                                                    @endif

                                                    @if($item->ultra_mikro == 0)
                                                    @else
                                                    {{ $item->ultra_mikro }}<br>
                                                    @endif

                                                    @if($item->pip == 0)
                                                    @else
                                                    {{ $item->pip }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->jaminan_ketenagakerjaan == 0)
                                                        -
                                                    @else
                                                        {{ $item->jaminan_ketenagakerjaan }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).on('submit', '.deletesosial', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function (response) {
            // Handle the server response
            if (response.success) {
                alert(response.message)
                location.reload(); // Redirect to a success page if needed
            } else {
                alert('Gagal Data sudah ada atau ada kesalahan input'); // Show error message
            }
        }).fail(function () {
            alert('Terjadi kesalahan saat memproses formulir.'); // Show a generic error message
        });
    });

</script>
@endsection