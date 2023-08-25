@extends('layouts.app')
@section('container')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('pages.penduduk.modal') --}}
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
                                    <h3>Data Aset Rumah</h3>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form action="/rumah" method="GET">
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

                                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
                                id="show">
                                    <!-- table-responsive -->
                                    <ul id="saveform_errList"></ul>
                                    <div id="succes_message"></div>
                                    <table class="table d-inline">
                                        <thead>
                                            <tr>
                                                @guest
                                                    @else
                                                    <th><i class="bi bi-gear-wide"> Aksi</i></th>
                                                @endguest
                                                <th>No</th>
                                                @guest
                                                @else
                                                <th>No KK</th>
                                                @endguest
                                                <th>Sts Kepemilikan</th>
                                                <th>Surat Kepemilikan</th>
                                                <th>Luas Lantai</th>
                                                <th>Jenis Lantai</th>
                                                <th>Jenis Dinding</th>
                                                <th>Jenis Atap</th>
                                                <th>Sumber Air Minum</th>
                                                <th>Sumber Penerangan</th>
                                                <th>Daya Penerangan</th>
                                                <th>Bahan Bakar Masak</th>
                                                <th>Fasilitas Toilet</th>
                                                <th>Jenis Kloset</th>
                                                <th>Pembuangan Toilet</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table font-size-11">
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
                                                                    <a href="/rumah/edit/{{ $item->id }}">
                                                                        <button type="button"
                                                                        class="badge bg-warning dropdown-item edit_penduduk">
                                                                            <i class="bi bi-tools"> Edit Data</i>
                                                                        </button>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form action="/rumah/delete/{{ $item->id }}"
                                                                        method="POST">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button class="badge bg-danger dropdown-item"
                                                                        onclick="return confirm('Anda Yakin?')">
                                                                        <span><i class="bi bi-trash2"></i>
                                                                                Hapus Data
                                                                            </span>
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
                                                    <td>{{ $item->keluarga_id }}</td>
                                                    @endguest
                                                    <td>{{ $item->sts_kepemilikan }}</td>
                                                    <td>{{ $item->surat_kepemilikan }}</td>
                                                    <td>{{ $item->luas_lantai }}</td>
                                                    <td>{{ $item->jenis_lantai }}</td>
                                                    <td>{{ $item->jenis_dinding }}</td>
                                                    <td>{{ $item->jenis_atap }}</td>
                                                    <td>{{ $item->air_minum }}</td>
                                                    @if ($item->daya_penerangan == '')
                                                        <td>{{ $item->sumber_penerangan }}</td>
                                                        <td class="text-center">-</td>
                                                    @else
                                                        <td>{{ $item->sumber_penerangan }}</td>
                                                        <td>{{ $item->daya_penerangan }}</td>
                                                    @endif
                                                    <td>{{ $item->bahan_masak }}</td>
                                                    <td>{{ $item->fasilitas_toilet }}</td>
                                                    <td>{{ $item->jenis_kloset }}</td>
                                                    <td>{{ $item->pembuangan }}</td>
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

    {{-- @include('pages.penduduk.create') --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function(data, status) {


        });
        // $('#jumlah').on('change', function() {
        //     const bangunan = $('#sts_bangunan option:selected').data('bangunan');
        //     const lantai = $('#jns_lantai option:selected').data('lantai');

        //     const totaldiscount = (bangunan + lantai)
        //     const total = totaldiscount;

        //     $('[name=keterangan]').val(`${total}`);
        // });

        function create() {
            $.get("{{ url('rumah/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Tambah Data Aset Rumah');
                $("#page").html(data);
                $("#exampleModal").modal('show');
                $("#PLN").hide();

            });
        }

        function store() {
            var data = {
                'keluarga_id': $('.keluarga_id').val(),
                'sts_bangunan': $('.sts_bangunan').val(),
                'luas_tanah': $('.luas_tanah').val(),
                'jns_lantai': $('.jns_lantai').val(),
                'jns_dinding': $('.jns_dinding').val(),
                'jns_atap': $('.jns_atap').val(),
                'air_minum': $('.air_minum').val(),
                'sumber_penerangan': $('.sumber_penerangan').val(),
                'daya_penerangan': $('.daya_penerangan').val(),
                'bahan_bakar': $('.bahan_bakar').val(),
                'tmpt_pembuangan': $('.tmpt_pembuangan').val(),
                'jns_pembuangan': $('.jns_pembuangan').val(),
                'pembuangan_akhir': $('.pembuangan_akhir').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/rumah",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#saveform_errList').append('<li>' + err_values +
                                '</li>');
                        });
                    } else {
                        $('#saveform_errList').html("");
                        $('#succes_message').addClass('alert alert-success')
                        $('#succes_message').text(response.message)
                        // $('#AddPendudukModal').modal('hide');
                        $('.btn_close').click();
                        $('#exampleModal').find('input').val("");
                        $('.table').load(location.href + ' .table');
                    }
                }
            });
        }

        function update(id) {
            var data = {
                'keluarga_id': $('.keluarga_id').val(),
                'sts_bangunan': $('.sts_bangunan').val(),
                'luas_tanah': $('.luas_tanah').val(),
                'jns_lantai': $('.jns_lantai').val(),
                'jns_dinding': $('.jns_dinding').val(),
                'jns_atap': $('.jns_atap').val(),
                'air_minum': $('.air_minum').val(),
                'sumber_penerangan': $('.sumber_penerangan').val(),
                'daya_penerangan': $('.daya_penerangan').val(),
                'bahan_bakar': $('.bahan_bakar').val(),
                'tmpt_pembuangan': $('.tmpt_pembuangan').val(),
                'jns_pembuangan': $('.jns_pembuangan').val(),
                'pembuangan_akhir': $('.pembuangan_akhir').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "rumah/update/" + id,
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#saveform_errList').append('<li>' + err_values +
                                '</li>');
                        });
                    } else {
                        $('#saveform_errList').html("");
                        $('#succes_message').addClass('alert alert-success')
                        $('#succes_message').text(response.message)
                        // $('#AddPendudukModal').modal('hide');
                        $('.btn_close').click();
                        $('#exampleModal').find('input').val("");
                        $('.table').load(location.href + ' .table');
                    }
                }
            });
        }

        function edit(id) {
            $.get("{{ url('rumah/edit') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Tambah Data Penduduk');
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
    </script>
@endsection
