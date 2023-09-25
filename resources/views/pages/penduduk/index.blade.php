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
                                    <h3>Data Penduduk</h3>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form action="/penduduk" method="GET">
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

                                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
                                    id="show">
                                    <!-- table-responsive -->
                                    <ul id="saveform_errList"></ul>
                                    <div id="succes_message"></div>
                                    <table class="table d-inline " id="">
                                        <thead>
                                            <tr>
                                                @guest
                                                @else
                                                <th><i class="bi bi-gear-wide">Aksi</i></th>
                                                @endguest
                                                <th>No</th>
                                                @guest
                                                @else
                                                <th>Nik</th>
                                                @endguest
                                                <th>Nama Lengkap</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Usia</th>
                                                <th>Jenis kelamin</th>
                                                <th>Keterangan Keberadaaan</th>
                                                <th>Status Pernikahan</th>
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
                                                                    <a href="/penduduk/edit/{{ $item->id }}">
                                                                        <button type="button"
                                                                            class="badge bg-warning dropdown-item edit_penduduk">
                                                                            <i class="bi bi-tools"> Edit Data</i>
                                                                        </button>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form action="/penduduk/delete/{{ $item->id }}" id="deletependuduk"
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
                                                    
                                                    @endguest
                                                    <td>{{ $loop->iteration }}</td>
                                                    @guest
                                                    @else
                                                    <td>{{ $item->nik }}</td>
                                                    @endguest
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->tanggal_lahir }}</td>
                                                    <td>{{ $item->usia }}</td>
                                                    <td>{{ $item->jenis_kelamin }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>{{ $item->status_perkawinan }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $data->links() }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('pages.penduduk.create') --}}
@endsection

@section('scripts')
    <script>

    $(document).on('submit', '#deletependuduk', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function (response) {
            // Handle the server response
            if (response.success) {
                alert(response.message);
                location.reload();
            } else {
                alert('Gagal Data sudah ada atau ada kesalahan input'); // Show error message
            }
        }).fail(function () {
            alert('Terjadi kesalahan saat memproses formulir.'); // Show a generic error message
        });
    });
    </script>
@endsection
