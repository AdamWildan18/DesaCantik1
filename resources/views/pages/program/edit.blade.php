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
                    <form action="/program/update/{{$data->id}}" class="programform" method="POST">
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
                                                {{ $data->keluarga_id}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Kepala Keluarga</td>
                                        <td colspan="2">
                                            <div class="form-control form-control-sm">
                                                {{ $data->keluargas->nama_kepala_keluarga }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Apakah Keluarga Menerima Program berikut?</td>
                                        <td colspan="2">
                                            @foreach ($databantuan as $item)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" data-point="1"  value="{{ $item }}" name="bantuan[]" {{ in_array($item, $bantuanstring) ? 'checked' : '' }} >
                                                    <div class="input-group input-group-sm">
                                                        <input type="date" class="form-control" value="{{ $tanggalstring[$loop->index] }}" name="tanggal_bantuan[]">
                                                        <label class=" input-group-text">
                                                            {{ $item }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Apakah Keluarga Memiliki Asset Bergerak <br>Sebagai Berikut?
                                        </td>
                                        <td>
                                            @foreach ($dataasset1 as $item)
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" data-point="1"  value="{{ $item }}" name="asset_bergerak[]" {{ in_array($item, $assetbergerak) ? 'checked' : '' }} >
                                                </div>
                                                <div class="form-control form-control-sm text-center">{{ $item }}</div>
                                            </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($dataasset2 as $item)
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" data-point="1"  value="{{ $item }}" name="asset_bergerak[]" {{ in_array($item, $assetbergerak) ? 'checked' : '' }} >
                                                </div>
                                                <div class="form-control form-control-sm text-center">{{ $item }}</div>
                                            </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Apakah Keluarga Memiliki Asset Tidak<br>Bergerak Sebagai Berikut?
                                        </td>
                                        <td>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Lahan selain yang di tempati" name="lahan_lain"  {{ $data->lahan_lain == 'Lahan selain yang di tempati' ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                  Lahan selain yang di tempati
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Rumah/Bangunan di tempat lain" name="bangunan_lain"  {{ $data->bangunan_lain == 'Rumah/Bangunan di tempat lain' ? 'checked':''}}>
                                                <label class="form-check-label">
                                                  Rumah/Bangunan di tempat lain
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah Ternak Yang Dimiliki?
                                        </td>
                                        <td colspan="2">
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="number" class="form-control form-control-sm" min="0" value="{{ $data->sapi }}" name="sapi">
                                                <span class="input-group-text">Sapi</span>
                                            </div>
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="number" class="form-control form-control-sm" min="0" value="{{ $data->kerbau }}" name="kerbau">
                                                <span class="input-group-text">Kerbau</span>
                                            </div>
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="number" class="form-control form-control-sm" min="0" value="{{ $data->kuda }}" name="kuda">
                                                <span class="input-group-text">kuda</span>
                                            </div>
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="number" class="form-control form-control-sm" min="0" value="{{ $data->kambing }}" name="kambing">
                                                <span class="input-group-text">Kambing/Domba</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenis akses internet utama yang di gunakan <br>keluarga?
                                        </td>
                                        <td colspan="2">
                                            @foreach ($datainternet as $item)
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" data-point="1"  value="{{ $item }}" name="akses_internet[]" {{ in_array($item, $internet) ? 'checked' : '' }} >
                                                </div>
                                                <div class="form-control form-control-sm text-center">{{ $item }}</div>
                                            </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Apakah Keluarga Memiliki Rekening Aktif <br>atau Dompet Digital?
                                        </td>
                                        <td colspan="2">
                                            @foreach ($datadigital as $item)
                                            <div class=" input-group">
                                                <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" data-point="1"  value="{{ $item }}" name="rekening_dompetdigital[]" {{ in_array($item, $digital) ? 'checked' : '' }} >
                                                </div>
                                                <div class="form-control form-control-sm text-center">{{ $item }}</div>
                                            </div>
                                            @endforeach
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
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked[data-point]');
        checkboxes.forEach(checkbox => {
            totalPoints += parseInt(checkbox.getAttribute('data-point'));
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
