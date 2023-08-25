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
                                    <form class="usahaform" action="/usaha/store" method="POST">
                                        @csrf
                                        @foreach ($data->penduduks as $item)
                                        <tr>
                                            <td>Nomor Induk Kependudukan </td>
                                            <td colspan="2">
                                                <div class="form-control form-control-sm">
                                                    {{ $item->nik }}
                                                    <input type="number" id="kk" name="penduduk_id[]" readonly class="form-control form-control-sm" value="{{ $item->id }}" style="display: none">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Anggota Keluarga</td>
                                            <td colspan="2">
                                                <div class="form-control form-control-sm">
                                                    {{ $item->nama }}
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Apakah Nama Memilkiki Usaha Sendiri?</td>
                                            <td colspan="2">
                                                <div class="form-check d-inline">
                                                    <input type="radio" data-point="1" value="Mempunyai Usaha" name="kepemilikan_usaha[{{ $item->id }}]" >
                                                    <label for="kepemilikan_usaha">Ya</label>
                                                </div>
                                                <div class="form-check d-inline">
                                                    <input type="radio" data-point="0" value="Tidak Mempunyai Usaha" name="kepemilikan_usaha[{{ $item->id }}]" checked>
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
                                                    <input type="number" name="jumlah_usaha[]" data-penduduk="{{ $item->id }}" class="form-control" onchange="calculateTotalPoints({{ $item->id }})">
                                                    <span class="input-group-text">Units</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Apakah Lapangan Usaha Dari Usaha Utama ?
                                            </td>
                                            <td colspan="2">
                                                <input type="text" name="lapangan_usaha[]" class="form-control form-control-sm">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Jumlah Pekerja ?
                                            </td>
                                            <td colspan="2">
                                                <div class="input-group input-group-sm">
                                                    <input type="number" name="jumlah_pekerja[]" data-penduduk="{{ $item->id }}" class="form-control" onchange="calculateTotalPoints({{ $item->id }})">
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
                                                    <select name="omset_usaha[]" data-penduduk="{{ $item->id }}" class="form-select form-select-sm" onchange="calculateTotalPoints({{ $item->id }})">
                                                        <option data-point="0" value=""></option>
                                                        <option data-point="1" value="< 5 Juta Rupiah">< 5 Juta Rupiah</option>
                                                        <option data-point="2" value="5 - 15 Juta Rupiah">5 - 15 Juta Rupiah</option>
                                                        <option data-point="3" value="15 - 25 Juta Rupiah">15 - 25 Juta Rupiah</option>
                                                        <option data-point="4" value="25 - 167 Juta Rupiah">25 - 167 Juta Rupiah</option>
                                                        <option data-point="5" value="167 - 1.250 Juta Rupiah">167 - 1.250 Juta Rupiah</option>
                                                        <option data-point="6" value="1.250 - 4.167 Juta Rupiah">1.250 - 4.167 Juta Rupiah</option>
                                                        <option data-point="7" value="> 4.167 Juta Rupiah">> 4.167 Juta Rupiah</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Penggunaan Internet Dalam Kegiatan Usaha</td>
                                            <td>
                                                <div class="form-check ">
                                                    <input type="hidden" data-point="0" value="" name="internet_usaha[{{ $item->id }}]" checked>
                                                    <input type="radio" data-point="1" value="Sebagai Sarana Komunikasi" name="internet_usaha[{{ $item->id }}]" onchange="calculateTotalPoints({{ $item->id }})">
                                                    <label for="kepemilikan_usaha">Sebagai Sarana Komunikasi</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input type="radio" data-point="1" value="Untuk Mencari Informasi" name="internet_usaha[{{ $item->id }}]" onchange="calculateTotalPoints({{ $item->id }})">
                                                    <label for="kepemilikan_usaha">Untuk Mencari Informasi</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="radio" data-point="1" value="Sebagai Pemasaran/Iklan" name="internet_usaha[{{ $item->id }}]" onchange="calculateTotalPoints({{ $item->id }})" >
                                                    <label for="kepemilikan_usaha">Sebagai Pemasaran/Iklan</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input type="radio" data-point="1" value="Sebagai Sarana Penjualan" name="internet_usaha[{{ $item->id }}]" onchange="calculateTotalPoints({{ $item->id }})">
                                                    <label for="kepemilikan_usaha">Sebagai Sarana Penjualan</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="point[{{ $item->id }}]" id="total_point_{{ $item->id }}" value="0" class="form-control form-control-sm totalpoint" readonly>
                                            </td>
                                        </tr>
                                        @endforeach
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
    
    function getDataPoint(selectElement) {
        const selectedIndex = selectElement.selectedIndex;
        return parseInt(selectElement.options[selectedIndex].getAttribute('data-point'));
    }

    function calculateTotalPoints(pendudukId) {
        // Ambil elemen-elemen yang diperlukan
        var totalPointElement = document.querySelector(`#total_point_${pendudukId}`);
        var selectedRadioInputs = document.querySelectorAll(`input[name="kepemilikan_usaha[${pendudukId}]"]:checked`);
        var jumlahUsahaInput = document.querySelector(`input[name="jumlah_usaha[]"][data-penduduk="${pendudukId}"]`);
        var jumlahPekerjaInput = document.querySelector(`input[name="jumlah_pekerja[]"][data-penduduk="${pendudukId}"]`);
        var omsetUsahaSelect = document.querySelector(`select[name="omset_usaha[]"][data-penduduk="${pendudukId}"]`);
        var internetUsahaRadios = document.querySelectorAll(`input[name="internet_usaha[${pendudukId}]"]:checked`);

        // Hitung total poin berdasarkan data yang dipilih
        var totalPoints = 0;
        selectedRadioInputs.forEach(function(radio) {
            totalPoints += parseInt(radio.getAttribute('data-point'));
        });

        if (jumlahUsahaInput) {
            totalPoints += parseInt(jumlahUsahaInput.value);
        }

        if (jumlahPekerjaInput) {
            totalPoints += parseInt(jumlahPekerjaInput.value);
        }

        if (omsetUsahaSelect) {
            totalPoints += parseInt(omsetUsahaSelect.options[omsetUsahaSelect.selectedIndex].getAttribute('data-point'));
        }

        internetUsahaRadios.forEach(function(radio) {
            totalPoints += parseInt(radio.getAttribute('data-point'));
        });

        // Tampilkan total poin pada elemen yang sesuai
        totalPointElement.value = totalPoints;
    }
</script>

@endsection
