@extends('layouts.app')
@section('container')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_body">
            <div class="QA_section">
                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
                    id="show">
                    <!-- table-responsive -->
                    <ul id="saveform_errList"></ul>
                    <div id="succes_message"></div>
                    {{-- @foreach ($data as $item) --}}
                    <form action="/penduduk/update/{{ $id }}" class="pendudukform" method="POST">
                        @csrf
                        <div id="keluarga" style="display: ">
                            <table class="table" id="append">
                                <thead class="thead" >
                                    <tr>
                                        <th colspan="2">II. Keterangan Demografi</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr>
                                        <td>Nomor Kartu Keluarga</td>
                                        <td><input class="form-control form-control-sm" list="datalistOptions" name="keluarga_id" id="exampleDataList" value="{{ $data->keluarga_id }}" placeholder="Type to search...">
                                        <datalist id="datalistOptions">
                                            @foreach ($keluarga as $keluargas)
                                            <option value="{{ $keluargas->id }}">{{ $keluargas->nama_kepala_keluarga }}</option>
                                            @endforeach
                                        </datalist></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Induk Kependudukan </td>
                                        <td>
                                            <div>
                                                <input type="number" name="nik" value="{{ $data->nik }}" class="form-control form-control-sm" required>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Anggota Keluarga</td>
                                        <td>
                                            <div>
                                                <input type="text" name="nama" value="{{ $data->nama }}" class="nama form-control form-control-sm" >
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>
                                            <div>
                                                <input type="date" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" class="form-control form-control-sm" required>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            @if ($data->jenis_kelamin === 'Laki-laki') 
                                            <input type="radio" value="Laki-laki" name="jenis_kelamin" checked> Laki-laki <br>
                                            <input type="radio" value="Perempuan" name="jenis_kelamin"> Perempuan
                                            @else
                                            <input type="radio" value="Laki-laki" name="jenis_kelamin"> Laki-laki <br>
                                            <input type="radio" value="Perempuan" name="jenis_kelamin" checked> Perempuan
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan Keberadaan Anggota Keluarga</td>
                                        <td>
                                            <select name="keterangan" class="form-select form-select-sm" required>
                                                <option value="{{ $data->keterangan }}">{{ $data->keterangan }}</option>
                                                <option value="Tinggal Bersama Keluarga">Tinggal Bersama Keluarga</option>
                                                <option value="Meninggal">Meninggal</option>
                                                <option value="Pindah Ke Wilayah lain">Pindah Ke Wilayah lain</option>
                                                <option value="Pindah ke Negara Lain">Pindah ke Negara Lain</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status Perkawinan</td>
                                        <td>
                                            <select name="status_perkawinan" class="form-select form-select-sm" required>
                                                <option value="{{ $data->status_perkawinan }}">{{ $data->status_perkawinan }}</option>
                                                <option value="Belum Kawin / Belum Menikah">Belum Kawin / Belum Menikah</option>
                                                <option value="Kawin / Menikah">Kawin / Menikah</option>
                                                <option value="Cerai Hidup">Cerai Hidup</option>
                                                <option value="Cerai Mati">Cerai Mati</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status Hubungan Dengan Kepala Keluarga</td>
                                        <td>
                                            <select name="hub_keluarga" class="form-select form-select-sm" required>
                                                <option value="{{ $data->hub_keluarga }}">{{ $data->hub_keluarga }}</option>
                                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                <option value="Istri">Istri</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Menantu">Menantu</option>
                                                <option value="Cucu">Cucu</option>
                                                <option value="Pembantu / Supir">Pembantu / Supir</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm m-1" id="btn_penduduk">Simpan</button>
                        </div>
                    </form>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    {{-- @include('pages.penduduk.create') --}}
@endsection

@section('scripts')
<script>

    $(document).on('submit', '.pendudukform', function (event) {
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
            alert('An error occurred while processing the form.'); // Show a generic error message
        });
    });
</script>

@endsection
