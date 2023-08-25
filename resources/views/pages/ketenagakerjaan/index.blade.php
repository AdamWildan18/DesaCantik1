@extends('layouts.app')
@section('container')
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <div id="succes_message"></div>

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
                                    <h3>Data Ketenagakerjaan</h3>
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
                                        <div class="add_button ms-2">
                                            <button class="btn_1" onclick="create()">Tambah Data</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_30"
                                    id="show">
                                    <!-- table-responsive -->
                                    <ul id="saveform_errList"></ul>
                                    <div id="succes_message"></div>
                                    <table class="table d-inline " id="">
                                        <thead>
                                            <tr>
                                                <th rowspan=""><i class="bi bi-gear-wide"> Aksi</i></th>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Jenis Pekerjaan</th>
                                                <th>Jam Kerja</th>
                                                <th>Status Pekerjaan</th>
                                                <th>Omset Pekerjaan</th>
                                                <th>Jumlah Usaha</th>
                                                <th>Jenis Usaha</th>
                                                <th>Jumlah Pekerja</th>
                                                <th>ijin Usaha</th>
                                                <th>Omset Usaha</th>
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
                                                                    <button type="button"
                                                                        class="badge bg-warning dropdown-item edit_penduduk"
                                                                        onclick="edit({{ $item->id }})">
                                                                        <i class="bi bi-tools"> Edit Data</i>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <form action="/penduduk/{{ $item->id }}"
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
                                                                <li>
                                                                    <button type="button"
                                                                        class="badge bg-primary dropdown-item"
                                                                        onclick="statusdasar({{ $item->id }})">
                                                                        <i class="bi bi-gear"> Aksi Dasar</i>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->penduduk_id }}</td>
                                                    <td>{{ $item->jenis_pekerjaan }}</td>
                                                    <td>{{ $item->jam_kerja }}</td>
                                                    <td>{{ $item->status_pekerjaan }}</td>
                                                    <td>{{ $item->Omset_pekerjaan }}</td>
                                                    <td>{{ $item->jumlah_usaha }}</td>
                                                    <td>{{ $item->jenis_usaha }}</td>
                                                    <td>{{ $item->jumlah_pekerja }}</td>
                                                    <td>{{ $item->ijin_usaha }}</td>
                                                    <td>{{ $item->ket_usaha }}</td>
                                                    <td>{{ $item->nama }}</td>
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

            // show()


        });

        // function show() {
        //     $.get("{{ url('penduduk/{penduduk}') }}", {}, function(data, status) {
        //         $("#show").html(data);
        //     });
        // }

        function create() {
            $.get("{{ url('ketenagakerjaan/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Tambah Data Penduduk');
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function store() {
            $.ajax({
                type: "POST",
                url: "/ketenagakerjaan",
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
                'nik': $('.nik').val(),
                'keluarga_id': $('.keluarga_id').val(),
                'nama': $('.nama').val(),
                'tempat_lahir': $('.tempat_lahir').val(),
                'tanggal_lahir': $('.tanggal_lahir').val(),
                'jenis_kelamin': $('.jenis_kelamin').val(),
                'agama': $('.agama').val(),
                'pendidikan': $('.pendidikan').val(),
                'pekerjaan': $('.pekerjaan').val(),
                'pernikahan': $('.pernikahan').val(),
                'hub_keluarga': $('.kewarganegaraan').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "/update/" + id,
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
            $.get("{{ url('edit') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Tambah Data Penduduk');
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

        function statusdasar(id) {
            $.get("{{ url('stsdasar') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Status Penduduk');
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

        function statustore() {
            var data = {
                'nik': $('.nik').val(),
                'status': $('.status').val(),
                'tanggal': $('.tanggal').val(),
                'keterangan': $('.keterangan').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: "/statusdasar",
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
    </script>
@endsection
