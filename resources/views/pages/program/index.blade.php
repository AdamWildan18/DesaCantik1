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
                                <h4>Data Keterangan Progam, Asset, dan Layanan</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form action="/program" method="GET">
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
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            @guest
                                            @else
                                            <th><i class="bi bi-gear-wide">Aksi</i></th>
                                            @endguest
                                            <th>No</th>
                                            @guest
                                            @else
                                            <th>No Kartu Keluarga</th>
                                            @endguest
                                            <th>Nama Kepala Keluarga</th>
                                            <th>Program Bantuan</th>
                                            <th>Asset Bergerak</th>
                                            <th>Lahan Lain</th>
                                            <th>Bangunan Lain</th>
                                            <th>Sapi</th>
                                            <th>Kerbau</th>
                                            <th>Kuda</th>
                                            <th>Kambing/Domba</th>
                                            <th>Akses Internet</th>
                                            <th>Rekening/Dompet Digital</th>
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
                                                            <a href="/program/edit/{{ $item->id }}">
                                                                <button type="button" class="badge bg-warning dropdown-item">
                                                                    <i class="bi bi-tools"> Edit Data</i>
                                                                </button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="/program/delete/{{ $item->id }}" class="programdelete"
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
                                            @guest
                                            @else
                                            <td>{{ $item->keluargas->id}}</td>
                                            @endguest
                                            <td>{{ $item->keluargas->nama_kepala_keluarga}}</td>
                                            <td> 
                                                {{ $item->bantuan }}
                                            </td>
                                            <td> 
                                                {{ $item->asset_bergerak }}
                                            </td>
                                            <td>
                                                @if ($item->lahan_lain == '')
                                                    Tidak Memiliki
                                                @else
                                                    
                                                {{ $item->lahan_lain }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->bangunan_lain == '')
                                                    Tidak Memiliki
                                                @else
                                                    
                                                {{ $item->bangunan_lain }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->sapi == null)
                                                0
                                                @else
                                                {{ $item->sapi }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->kerbau == null)
                                                0
                                                @else
                                                {{ $item->kerbau }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->kuda == null)
                                                0
                                                @else
                                                {{ $item->kuda }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->kambing == null)
                                                0
                                                @else
                                                {{ $item->kambing }}
                                                @endif
                                            </td>
                                            <td>{{ $item->akses_internet  }}</td>
                                            <td>{{ $item->rekening_dompetdigital  }}</td>
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
    $(document).on('submit', '.programdelete', function (event) {
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