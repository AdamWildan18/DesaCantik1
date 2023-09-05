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
                                <h3>Data Keterangan Bantuan</h3>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form action="/bantuan" method="GET">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control border-primary"
                                                        name="search" placeholder="Search..">
                                                    <button class="btn btn-outline-secondary btn-primary btn-sm"
                                                        type="submit" id="button-addon2"><i
                                                        class="bi bi-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="QA_table table-responsive"
                                id="show">
                                <!-- table-responsive -->
                                <ul id="saveform_errList"></ul>
                                <div id="succes_message"></div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>No</th>
                                            <th>Nomor Kartu Keluarga</th>
                                            <th>nama_kepala_keluarga</th>
                                            <th>Jenis Bantuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-secondary dropdown-toggle badge"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <span><i class="bi bi-gear"></i></a></span>
                                                    </a>

                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="/pendidikan/edit/{{ $item->id }}">
                                                                <button type="button"
                                                                    class="badge bg-warning dropdown-item edit_penduduk">
                                                                    <i class="bi bi-tools"> Edit Data</i>
                                                                </button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="/pendidikan/delete/{{ $item->id }}" class="pendidikandelete"
                                                                method="POST">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="badge bg-danger dropdown-item" type="submit"
                                                                    onclick="return confirm('Anda Yakin?')"><span><i
                                                                            class="bi bi-trash2"></i>
                                                                        Hapus Data</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id}}</td>
                                            <td>{{ $item->nama_kepala_keluarga}}</td>
                                            @if ($item->bantuans == '')
                                            <td>
                                                <a href="/bantuan/create/{{ $item->id }}">
                                                    <button class="badge btn-primary">Tambah</button>
                                                </a>
                                            </td>
                                            @endif
                                            <td class="col-auto">
                                                @if (!empty($item->bantuans->bpnt))
                                                {{ $item->bantuans->bpnt }}<br>
                                            @endif
                                            @if (!empty($item->bantuans->pkh))
                                                {{ $item->bantuans->pkh }}<br>
                                            @endif
                                            @if (!empty($item->bantuans->listrik))
                                                {{ $item->bantuans->listrik }}<br>
                                            @endif
                                            @if (!empty($item->bantuans->pupuk))
                                                {{ $item->bantuans->pupuk }}<br>
                                            @endif
                                            @if (!empty($item->bantuans->lpg))
                                                {{ $item->bantuans->lpg }}<br>
                                            @endif
                                            </td>
                                            {{-- @if ($item && $item->bantuans)
                                                <td>{{ $item->programs->bantuan }}</td>
                                            @else
                                                <td>
                                                    <a href="/bantuan/create/{{ $item->id }}">
                                                        <button class="badge btn-primary">Tambah</button>
                                                    </a>
                                                </td>
                                            @endif --}}
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
    $(document).on('submit', '.pendidikandelete', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function (response) {
            // Handle the server response
            if (response.success) {
                alert(response.message)
                window.location=document.referrer; // Redirect to a success page if needed
            } else {
                alert('Gagal Data sudah ada atau ada kesalahan input'); // Show error message
            }
        }).fail(function () {
            alert('Terjadi kesalahan saat memproses formulir.'); // Show a generic error message
        });
    });
</script>
@endsection