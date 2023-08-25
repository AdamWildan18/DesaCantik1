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
                    {{-- <form class="usahaform"> --}}
                        {{-- @csrf --}}
                        <div id="keluarga" style="display: ">
                            <table class="table" id="append">
                                <thead class="thead" >
                                    <tr>
                                        <th colspan="3">Keterangan Pendidikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form class="usahaform" action="/usaha/update/{{ $data->id }}" method="POST">
                                        @csrf
                                        <tr>
                                            <td>Nomor Induk Kependudukan </td>
                                            <td colspan="2">
                                                <div class="form-control form-control-sm">
                                                    {{ $data->penduduks->nik }}
                                                    <input type="number" id="kk" name="penduduk_id" readonly class="form-control form-control-sm" value="{{ $data->id }}" style="display: none">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Anggota Keluarga</td>
                                            <td colspan="2">
                                                <div class="form-control form-control-sm">
                                                    {{ $data->penduduks->nama }}
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Apakah Nama Memilkiki Usaha Sendiri?</td>
                                            <td colspan="2">
                                                <div class="form-check d-inline">
                                                    <input type="radio" data-point="1" value="Mempunyai Usaha" name="kepemilikan_usaha" {{ $data->jenis_kloset == 'Mempunyai Usaha' ? 'checked' : '' }}>
                                                    <label for="kepemilikan_usaha">Ya</label>
                                                </div>
                                                <div class="form-check d-inline">
                                                    <input type="radio" data-point="0" value="Tidak Mempunyai Usaha" name="kepemilikan_usaha" {{ $data->jenis_kloset == 'Tidak Mempunyai Usaha' ? 'checked' : '' }}>
                                                    <label for="kepemilikan_usaha">Tidak</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Berupa Jumlah Usaha Yang Dimiliki ?
                                            </td>
                                            <td colspan="2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" name="jumlah_usaha" value="{{ $data->jumlah_usaha }}" class="form-control">
                                                    <span class="input-group-text">Units</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Apakah Lapangan Usaha Dari Usaha Utama ?
                                            </td>
                                            <td colspan="2">
                                                <input type="text" name="lapangan_usaha" value="{{ $data->lapangan_usaha }}" class="form-control form-control-sm">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Jumlah Pekerja ?
                                            </td>
                                            <td colspan="2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" value="{{ $data->jumlah_pekerja }}" name="jumlah_pekerja" class="form-control">
                                                    <span class="input-group-text">Orang</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                omset Usaha Utama Pertahun ?
                                            </td>
                                            <td colspan="2">
                                                <div class="input-group input-group-sm">
                                                    <select name="omset_usaha" class="form-select form-select-sm">
                                                        <option data-point="0" value=""></option>
                                                        <option data-point="1" value="< 5 Juta Rupiah" {{ $data->omset_usaha == '< 5 Juta Rupiah' ? 'selected' : '' }}>< 5 Juta Rupiah</option>
                                                        <option data-point="2" value="5 - 15 Juta Rupiah" {{ $data->omset_usaha == '5 - 15 Juta Rupiah' ? 'selected' : '' }}>5 - 15 Juta Rupiah</option>
                                                        <option data-point="3" value="15 - 25 Juta Rupiah" {{ $data->omset_usaha == '15 - 25 Juta Rupiah' ? 'selected' : '' }}>15 - 25 Juta Rupiah</option>
                                                        <option data-point="4" value="25 - 167 Juta Rupiah" {{ $data->omset_usaha == '25 - 167 Juta Rupiah' ? 'selected' : '' }}>25 - 167 Juta Rupiah</option>
                                                        <option data-point="5" value="167 - 1.250 Juta Rupiah" {{ $data->omset_usaha == '167 - 1.250 Juta Rupiah' ? 'selected' : '' }}>167 - 1.250 Juta Rupiah</option>
                                                        <option data-point="6" value="1.250 - 4.167 Juta Rupiah" {{ $data->omset_usaha == '1.250 - 4.167 Juta Rupiah' ? 'selected' : '' }}>1.250 - 4.167 Juta Rupiah</option>
                                                        <option data-point="7" value="> 4.167 Juta Rupiah"> {{ $data->omset_usaha == '> 4.167 Juta Rupiah' ? 'selected' : '' }}> 4.167 Juta Rupiah</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Penggunaan Internet Dalam Kegiatan Usaha</td>
                                            <td>
                                                <div class="form-check ">
                                                    <input type="hidden" data-point="0" value="" name="internet_usaha" {{ $data->internet_usaha == '' ? 'checked' : '' }}>
                                                    <input type="radio" data-point="1" value="Sebagai Sarana Komunikasi" name="internet_usaha" {{ $data->internet_usaha == 'Sebagai Sarana Komunikasi' ? 'checked' : '' }}>
                                                    <label for="kepemilikan_usaha">Sebagai Sarana Komunikasi</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input type="radio" data-point="1" value="Untuk Mencari Informasi" name="internet_usaha" {{ $data->internet_usaha == 'Untuk Mencari Informasi' ? 'checked' : '' }}>
                                                    <label for="kepemilikan_usaha">Untuk Mencari Informasi</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="radio" data-point="1" value="Sebagai Pemasaran/Iklan" name="internet_usaha" {{ $data->internet_usaha == 'Sebagai Pemasaran/Iklan' ? 'checked' : '' }}>
                                                    <label for="kepemilikan_usaha">Sebagai Pemasaran/Iklan</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input type="radio" data-point="1" value="Sebagai Sarana Penjualan" name="internet_usaha" {{ $data->internet_usaha == 'Sebagai Sarana Penjualan' ? 'checked' : '' }}>
                                                    <label for="kepemilikan_usaha">Sebagai Sarana Penjualan</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="point" id="total_point" value="0" class="form-control form-control-sm totalpoint" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary btn-sm m-1">Berikutnya</button>
                                            </div></td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                        
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script>
    $(document).on('submit', '.usahaform', function (event) {
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

    function hitungTotalDataPoint() {
    let totalDataPoint = 0;

    // Hitung total data point berdasarkan radio button yang dipilih
    $('.form-check input[type="radio"]:checked').each(function() {
        totalDataPoint += parseFloat($(this).data('point'));
    });

    // Dapatkan nilai dari input field
    const jumlahPekerja = parseFloat($('input[name="jumlah_pekerja"]').val());
    const jumlahUsaha = parseFloat($('input[name="jumlah_usaha"]').val());

    const omsetUsahaSelectedOption = $('select[name="omset_usaha"] option:selected');
    if (omsetUsahaSelectedOption.length) {
        totalDataPoint += parseFloat(omsetUsahaSelectedOption.data('point'));
    }
    // Tambahkan nilai input ke total data point
    totalDataPoint += jumlahPekerja + jumlahUsaha;

    // Perbarui input field total_point
    $('#total_point').val(totalDataPoint);
}

$(document).ready(function() {
    // Hitung total data point awal
    hitungTotalDataPoint();

    // Hitung total data point setiap kali elemen formulir berubah
    $('.form-check input[type="radio"], input[name="jumlah_pekerja"], input[name="jumlah_usaha"], select[name="omset_usaha"]').on('change', hitungTotalDataPoint);
});  
</script>

@endsection
