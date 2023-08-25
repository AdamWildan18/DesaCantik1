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
                                    <h3>Data Keterangan Keluarga</h3>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form action="/keluarga" method="GET">
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
                                        {{-- <div class="add_button ms-2">
                                            <button class="btn_1" onclick="create()">Tambah Data</button>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="QA_table"
                                    id="show">
                                    <!-- table-responsive -->
                                    <ul id="saveform_errList"></ul>
                                    <div id="succes_message"></div>
                                    <table class="table" id="table1">
                                        <thead>
                                            <tr>
                                                @guest
                                                    @else
                                                    <th><i class="bi bi-gear-wide">Aksi</i></th>
                                                @endguest
                                                <th>No</th>
                                                @guest
                                                @else
                                                <th>No KK</th>
                                                @endguest
                                                    @foreach ($data as $item)
                                                    @once
                                                        
                                                    @if ($item->penduduks->isEmpty())
                                                    <th>Penduduk Tidak Valid</th>
                                                    @else
                                                    <th>Anggota Keluarga</th>
                                                    <th>Hubungan Keluarga</th>
                                                    @endif
                                                    @endonce
                                                    @endforeach
                                                
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
                                                                    <a href="/keluarga/{{ $item->id }}/edit">
                                                                        <button type="button" class="badge bg-warning dropdown-item"><i class="bi bi-tools"> Edit Data</i></button>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form action="/keluarga/delete/{{ $item->id }}"
                                                                        method="POST">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button class="badge bg-danger dropdown-item"
                                                                            onclick="return confirm('Anda Yakin?')">
                                                                            <span><i class="bi bi-trash2"></i>Hapus Data</span>
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
                                                    <td>
                                                        {{ $item->id }}
                                                    </td>
                                                    @endguest
                                                    @if ($item->penduduks->isEmpty())
                                                    <td>
                                                        <a href="/penduduk/create/{{ $item->id }}">
                                                        <button class="badge btn-sm btn-danger" ><i class="bi bi-pencil-square"></i> Verifikasi</button>
                                                        </a>
                                                    </td>
                                                    @else
                                                    <td>
                                                        @foreach ($item->penduduks as $penduduk)
                                                        {{ $penduduk['nama'] }}<br>
                                                        @endforeach
                                                    </td>
                                                    @endif
                                                    <td>
                                                        @foreach ($item->penduduks as $penduduk)
                                                            {{ $penduduk['hub_keluarga'] }}<br>
                                                        @endforeach
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{ $data->links() }} --}}

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

        // function show() {
        //     $.get("{{ url('penduduk/{penduduk}') }}", {}, function(data, status) {
        //         $("#show").html(data);
        //     });
        // }

        // function create() {
        //     $.get("{{ url('keluarga/create') }}", {}, function(data, status) {
        //         $("#exampleModalLabel").html('Tambah Data Keluarga');
        //         $("#page").html(data);
        //         $("#exampleModal").modal('show');
        //     });
        //     let baris = 1
        //     $(document).on('click', '#multi', function() {
        //         baris = baris + 1
        //         var html = "<div class='input-group mt-3' id='nama'" + baris + ">"
        //         html +=
        //             "<input class='form-control nama' list='datalistOptions' id='nama' name='nama' autocomplete='off'>"
        //         html +=
        //             "<datalist id='datalistOptions'>\
        //                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             @foreach ($data as $item)\
        //                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <option value='{{ $item->nik }}'></option>\
        //                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             @endforeach\
        //                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             </datalist>"
        //         html += "<button class='btn btn-danger' data-row='baris'" + baris + " id='hapus'>-</button>"
        //         html += "</div>"
        //         // var html = "<tr id='baris' + baris + ">"
        //         // html += "<td contentedtable='true' class='nama'></td>"
        //         // html += "<td><button class='btn btn-danger' id='delete'>-</button></td>"
        //         // html += "</tr>"

        //         $('#addnik').append(html)
        //     })
        //     $(document).on('click', '#hapus', function() {
        //         let hapus = $(this).data('row')
        //         $('#' + hapus).remove()
        //     })
        // }

        function store() {
            var data = {
                'no_kk': $('.no_kk').val(),
                'alamat': $('.alamat').val(),
                // 'alamat': $('.alamat').val(),
                // 'rt': $('.rt').val(),
                // 'rw': $('.rw').val(),
                // 'desa': $('.desa').val(),
                // 'kecamatan': $('.kecamatan').val(),
                // 'kab_kot': $('.kab_kot').val(),
                // 'provinsi': $('.provinsi').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/keluarga",
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
                'no_kk': $('.no_kk').val(),
                'nama': $('.nama').val(),
                // 'alamat': $('.alamat').val(),
                // 'rt': $('.rt').val(),
                // 'rw': $('.rw').val(),
                // 'desa': $('.desa').val(),
                // 'kecamatan': $('.kecamatan').val(),
                // 'kab_kot': $('.kab_kot').val(),
                // 'provinsi': $('.provinsi').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "/keluarga/update/" + id,
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

        function edit(no_kk) {
            $.get("{{ url('keluarga/edit') }}/" + no_kk, {}, function(data, status) {
                $("#exampleModalLabel").html('Tambah Data Penduduk');
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }
    </script>
@endsection
