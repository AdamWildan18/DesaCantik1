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
                    <form action="/program/store/{{$id}}" class="programform" method="POST">
                        @csrf
                        <div id="keluarga" style="display: ">
                            <table class="table" id="append">
                                <thead class="thead" >
                                    <tr>
                                        <th colspan="3">Keterangan Keikutsertaa Program, Kepemilikan Asset, dan Layanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>No Kartu Keluarga </td>
                                        <td colspan="2">
                                            <div class="form-control form-control-sm">
                                                {{ $data->id}}
                                                <input type="number" id="kk" name="keluarga_id" readonly class="form-control form-control-sm" value="{{ $id }}" style="display: none">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Kepala Keluarga</td>
                                        <td colspan="2">
                                            <div class="form-control form-control-sm">
                                                {{ $data->nama_kepala_keluarga }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Apakah Keluarga Menerima Program berikut?</td>
                                        <td colspan="2">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Program Bantuan Sosial Sembako/BPNT" name="bantuan[]">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Bantuan Sosial Sembako/BPNT
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Program Keluarga Harapan (PKH)" name="bantuan[]">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Keluarga Harapan (PKH)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Program Bantuan Langsung Tunai (BLT)Desa" name="bantuan[]">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Bantuan Langsung Tunai (BLT)Desa
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Program Subsidi Listrik (gratis/pemotongan biaya)" name="bantuan[]">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Subsidi Listrik (gratis/pemotongan biaya)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Program Bantuan Subsidi Pupuk" name="bantuan[]">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Bantuan Subsidi Pupuk
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Program Bantuan Subsidi LPG" name="bantuan[]">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Bantuan Subsidi LPG
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Apakah Keluarga Memiliki Asset Bergerak <br>Sebagai Berikut?
                                        </td>
                                        <td>
                                           <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Tabung Gas Min.5.5 kg" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Tabung Gas 5,5 kg atau Lebih
                                                </div>
                                            </div>
                                           <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Lemari Es/Kulkas" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Lemari Es/Kulkas
                                                </div>
                                            </div>
                                           <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Air Conditioner (AC)" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Air Conditioner (AC)
                                                </div>
                                            </div>
                                           <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Water Heater" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Pemanas air (Water Heater)
                                                </div>
                                            </div>
                                           <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Telepon Rumah" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Telepon Rumah (PSTN)
                                                </div>
                                            </div>
                                           <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="SmartPhone" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  SmartPhone
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Televisi Layar Datar (Min.30inc)" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Televisi Layar Datar (min.30inc)
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Emas/Perhiasan (Min.10gram)" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Emas/Perhiasan (Min.10gram)
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Komputer/Laptop/Tablet" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Komputer/Laptop/Tablet
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Sepeda Motor" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Sepeda Motor
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Sepeda" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Sepeda
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Mobil" name="asset_bergerak[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Mobil
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Apakah Keluarga Memiliki Asset Tidak<br>Bergerak Sebagai Berikut?
                                        </td>
                                        <td>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Lahan selain yang di tempati" name="lahan_lain">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Lahan selain yang di tempati
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Rumah/Bangunan di tempat lain" name="bangunan_lain">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Rumah/Bangunan di tempat lain
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah Ternak Yang Dimiliki?
                                        </td>
                                        <td colspan="2">
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="number" class="form-control form-control-sm" min="0" value="0" name="sapi">
                                                <span class="input-group-text">Sapi</span>
                                            </div>
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="number" class="form-control form-control-sm" min="0" value="0" name="kerbau">
                                                <span class="input-group-text">Kerbau</span>
                                            </div>
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="number" class="form-control form-control-sm" min="0" value="0" name="kuda">
                                                <span class="input-group-text">kuda</span>
                                            </div>
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="number" class="form-control form-control-sm" min="0" value="0" name="kambing">
                                                <span class="input-group-text">Kambing/Domba</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenis akses internet utama yang di gunakan <br>keluarga?
                                        </td>
                                        <td colspan="2">
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" data-poin="1" value="Internet dan TV Digital Berlangganan" name="akses_internet[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                    Internet dan TV Digital Berlangganan
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                <input class="form-check-input" type="checkbox" data-poin="1" value="Wifi" name="akses_internet[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Wifi
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" data-poin="1" value="Internet HandPhone" name="akses_internet[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Internet HandPhone
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Apakah Keluarga Memiliki Rekening Aktif <br>atau Dompet Digital?
                                        </td>
                                        <td colspan="2">
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" data-poin="1" value="Usaha" name="rekening_dompetdigital[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Ya Untuk Usaha
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" data-poin="1" value="Pribadi" name="rekening_dompetdigital[]">
                                                </div>
                                                <div class="form-control form-control-sm text-center">
                                                  Ya Untuk Pribadi
                                                </div>
                                            </div>
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" data-poin="1" value="Usaha Dan Pribadi" name="rekening_dompetdigital[]">
                                                </div>
                                                    <div class="form-control form-control-sm text-center">
                                                  Ya Untuk Usaha dan Pribadi
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="point">
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm m-1">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('pages.penduduk.create') --}}
@endsection

@section('scripts')
<script>
    function calculateTotalPoints() {
        let totalPoints = 0;

        // Menghitung poin dari elemen-elemen checkbox
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked[data-poin]');
        checkboxes.forEach(checkbox => {
            totalPoints += parseInt(checkbox.getAttribute('data-poin'));
        });

        // Menambahkan nilai dari input hewan ternak
        const kambingInput = document.querySelector('input[name="kambing"]');
        const sapiInput = document.querySelector('input[name="sapi"]');
        const kerbauInput = document.querySelector('input[name="kerbau"]');
        const kudaInput = document.querySelector('input[name="kuda"]');

        if (kambingInput) {
            totalPoints += parseInt(kambingInput.value) || 0;
        }
        if (sapiInput) {
            totalPoints += parseInt(sapiInput.value) || 0;
        }
        if (kerbauInput) {
            totalPoints += parseInt(kerbauInput.value) || 0;
        }
        if (kudaInput) {
            totalPoints += parseInt(kudaInput.value) || 0;
        }

        // Memperbarui nilai input total poin
        const totalPointInput = document.querySelector('input[name="point"]');
        if (totalPointInput) {
            totalPointInput.value = totalPoints;
        }
    }

    // Panggil perhitungan saat terjadi perubahan pada elemen checkbox dan input hewan ternak
    document.addEventListener('change', calculateTotalPoints);

    // Perhitungan awal
    calculateTotalPoints();

    // Penanganan pengiriman formulir
    $(document).on('submit', '.programform', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function (response) {
            // Menangani respons dari server
            if (response.success) {
                alert(response.message);
                window.location = document.referrer; // Redirect ke halaman sukses jika perlu
            } else {
                alert('Gagal Data sudah ada atau ada kesalahan input'); // Tampilkan pesan kesalahan
            }
        }).fail(function () {
            alert('Terjadi kesalahan saat memproses formulir.'); // Tampilkan pesan kesalahan umum
        });
    });
</script>
@endsection
