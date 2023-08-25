
@extends('layouts.app')
@section('container')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_body">
            <div class="QA_section">
                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
                    id="show">
                    <!-- table-responsive -->
                    <ul id="saveform_errList">
                        @error('penduduk_id')
                            <div class="alert alert-danger">NIK Sudah Tersedia</div>
                        @enderror
                    </ul>
                    <div id="succes_message"></div>
                    <div id="keluarga">
                        <table class="table" id="append">
                            <thead class="thead" >
                                <tr>
                                    <th colspan="2">Keterangan Pendidikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form class="formpendidikan" action="/pendidikan/update/{{ $data->id }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>Nomor Induk Kependudukan </td>
                                        <td>
                                            <div class="form-control form-control-sm">
                                                {{ $data->penduduks->nik }}
                                                <input type="number" id="kk" name="penduduk_id" value="{{ $data->penduduk_id }}" readonly class="form-control form-control-sm @error('penduduk_id') is-invalid @enderror" value="{{ $data->penduduk_id }}" style="display: none">
                                                
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Anggota Keluarga</td>
                                        <td>
                                            <div class="form-control form-control-sm">
                                                {{-- @foreach ($data->penduduks as $item) --}}
                                                {{ $data->penduduks->nama }}
                                                {{-- @endforeach --}}
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Partisipasi Sekolah</td>
                                        <td>
                                            <select name="partisipasi_sekolah" id="" class="form-select form-select-sm">
                                                <option value="{{ $data->partisipasi_sekolah }}">{{ $data->partisipasi_sekolah }}</option>
                                                <option value="Tidak Pernah Sekolah">Tidak Pernah Sekolah</option>
                                                <option value="Tidak Bersekolah Lagi">Tidak Bersekolah Lagi</option>
                                                <option value="Belum Sekolah">Belum Sekolah</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenjang Tertinggi yang pernah diduduki
                                        </td>
                                        <td>
                                            <select name="jenjang_tertinggi" id="" class="form-select form-select-sm">
                                                <option value="{{ $data->jenjang_tertinggi }}">{{ $data->jenjang_tertinggi }}</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA/SMK">SMA/SMK</option>
                                                <option value="PERGURUAN TINGGI">PERGURUAN TINGGI</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Kelas tertinggi yang pernah diduduki
                                        </td>
                                        <td>
                                            <select name="kelas_tertinggi" id="" class="form-select form-select-sm">
                                                <option value="{{ $data->kelas_tertinggi }}">{{ $data->kelas_tertinggi }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="Lulus/Tamat">Lulus/Tamat</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenjang Tertinggi yang pernah diduduki
                                        </td>
                                        <td>
                                            <select name="ijajah" id="" class="form-select form-select-sm">
                                                <option value="{{ $data->ijajah }}">{{ $data->ijajah }}</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA/SMK">SMA/SMK</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4/S1">D4/S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary btn-sm m-1">Simpan</button>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script>
    $(document).on('submit', '.formpendidikan', function (event) {
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





