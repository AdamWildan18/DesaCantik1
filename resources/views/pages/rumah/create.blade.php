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

                    <div id="perumahan" style="display: ">
                        <table class="table">
                            <thead class="thead">
                                <tr>
                                    <th colspan="2">II. Keterangan Perumahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nomor Kartu Keluarga</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="kk" name="keluarga_id" readonly value="{{ $id }}">
                                        {{-- <div class="form-group mb-3 col-4">
                                            <input class="form-control form-control-sm" list="datalistOptions" id="keluarga_id" name="keluarga_id"
                                                value="{{ old('keluarga_id') }}" autocomplete="off">
                                            <datalist id="datalistOptions">
                                                @foreach ($kk as $item)
                                                    <option value="{{ $item->no_kk }}">{{ $item->nama_kepala_keluarga }}</option>
                                                @endforeach
                                            </datalist>
                                            @error('keluarga_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}
                                    </td>
                                </tr>
                                <tr class="1a">
                                    <td>
                                        <div class="col-sm">Status kepemilikan bangunan</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="sts_kepemilikan" id="bangunan" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="3" value="Milik Sendiri">Milik Sendiri</option>
                                                <option data-point="1" value="Kontrak">Kontrak</option>
                                                <option data-point="2" value="Bebas Sewa">Bebas Sewa</option>
                                                <option data-point="1" value="Dinas">Dinas</option>
                                            </select>
                                        </div>

                                    </td>
                                </tr>

                                <tr id="2b" style="display: none">
                                    <td>
                                        <div class="col-sm">Surat bukti kepemilikan</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="surat_kepemilikan" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="1" value="SHM atas nama anggota keluarga">SHM atas nama anggota keluarga</option>
                                                <option data-point="1" value="SHM atas nama anggota keluarga dengan perjanjian pemerintahan">SHM atas nama anggota keluarga dengan perjanjian pemerintahan</option>
                                                <option data-point="1" value="SHM atas nama anggota keluarga tanpa perjanjian pemerintahan">SHM atas nama anggota keluarga tanpa perjanjian pemerintahan</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="col-sm">Luas Lantai Bangunan</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <input type="number" name="luas_lantai" id="luas_tanah" value="0" min="0" class="form-control form-control-sm">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm">Jenis lantai terluas</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="jenis_lantai" id="" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="5" value="Marmer/granit">Marmer/granit</option>
                                                <option data-point="4" value="Keramik">Keramik</option>
                                                <option data-point="3" value="Kayu">Kayu</option>
                                                <option data-point="2" value="Bambu">Bambu</option>
                                                <option data-point="1" value="Tanah">Tanah</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm">Jenis dinding terluas</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="jenis_dinding" id="" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="4" value="Tembok">Tembok</option>
                                                <option data-point="3" value="Plesteran">Plesteran</option>
                                                <option data-point="2" value="Papan/kayu/gypsun/GRC">Papan/kayu/gypsun/GRC</option>
                                                <option data-point="1" value="Anyaman Bambu">Anyaman Bambu</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm">Jenis atap terluas</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="jenis_atap" id="" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="5" value="Beton">Beton</option>
                                                <option data-point="4" value="Genteng">Genteng</option>
                                                <option data-point="3" value="Seng">Seng</option>
                                                <option data-point="2" value="Asbes">Asbes</option>
                                                <option data-point="1" value="Bambu">Bambu</option>
                                                <option data-point="1" value="Kayu">Kayu</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm">Sumber air minum utama</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="air_minum" id="" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="3" value="Air minum bermerk">Air minum bermerk</option>
                                                <option data-point="2" value="Air isi ulang">Air isi ulang</option>
                                                <option data-point="1" value="Leding">Leding</option>
                                                <option data-point="1" value="Sumur bor/pompa">Sumur bor/pompa</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="10a">
                                    <td>
                                        <div class="col-sm">Sumber penerangan utama</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="sumber_penerangan" id="sumber_penerangan" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="3" value="Listrik PLN dengan Meteran">Listrik PLN dengan Meteran</option>
                                                <option data-point="3" value="Listrik PLN tanpa Meteran">Listrik PLN tanpa Meteran</option>
                                                <option data-point="2" value="Listrik non-PLN">Listrik non-PLN</option>
                                                <option data-point="1" value="Bukan Listrik">Bukan Listrik</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="10b" style="display: none">
                                    <td>
                                        <div class="col-sm">Daya yang terpasang</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="daya_penerangan" id="" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="1" value="450 watt">450 watt</option>
                                                <option data-point="2" value="900 watt">900 watt</option>
                                                <option data-point="3" value="1.300 watt">1.300 watt</option>
                                                <option data-point="4" value="2.200 watt">2.200 watt</option>
                                                <option data-point="5" value=">2.200 watt">>2.200 watt</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm">Bahan bakar/energi memasak</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="bahan_masak" id="" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="7" value="Listrik">Listrik</option>
                                                <option data-point="6" value="Gas elpiji 3kg">Gas elpiji 3kg</option>
                                                <option data-point="5" value="Gas elpiji 5kg">Gas elpiji 5kg</option>
                                                <option data-point="4" value="Gas elpiji 12kg">Gas elpiji 12kg</option>
                                                <option data-point="3" value="Biogas">Biogas</option>
                                                <option data-point="2" value="Minyak Tanah">Minyak Tanah</option>
                                                <option data-point="1" value=">Kayu bakar">>Kayu bakar</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="12a">
                                    <td class="col-3">
                                        <div class="col-sm">Kepemilikan dan penggunaan fasilitas tempat buang air besar</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="fasilitas_toilet" id="fasilitas_pembuangan" class="form-select form-select-sm">
                                                <option data-point="0" value="Tidak ada fasilitas"></option>
                                                <option data-point="4" value="Ada, digunakan hanya anggota keluarga">Ada, digunakan hanya anggota keluarga</option>
                                                <option data-point="3" value="Ada, digunakan bersama anggota keluarga tertentu">Ada, digunakan bersama anggota keluarga tertentu</option>
                                                <option data-point="2" value="Ada, MCK Komunal">Ada, MCK Komunal</option>
                                                <option data-point="1" value="Tidak ada fasilitas">Tidak ada fasilitas</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="12b" style="display: none">
                                    <td class="col-3">
                                        <div class="col-sm">Jenis Kloset</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="jenis_kloset" id="jenis_kloset" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="4" value="Leher angsa">Leher angsa</option>
                                                <option data-point="3" value="Plengsengan dengan tutup">Plengsengan dengan tutup</option>
                                                <option data-point="2" value="Plengsengan tanpa tutup">Plengsengan tanpa tutup</option>
                                                <option data-point="1" value="Cemplung/cubluk">Cemplung/cubluk</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="12c" style="display: none">
                                    <td class="col-3">
                                        <div class="col-sm">Tempat pembuangan akhir tinja</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="pembuangan" id="" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="3" value="Tangki septik">Tangki septik</option>
                                                <option data-point="2" value="IPAL">IPAL</option>
                                                <option data-point="1" value="Kolam/Sawah/Sungai">Kolam/Sawah/Sungai</option>
                                                <option data-point="1" value="Lubang tanah">Lubang tanah</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="d-flex justify-content-end">
                                        <button class="btn btn-primary" id="btn_perumahan" onclick="perumahan({{$id}})">Berikutnya</button>
                                    </td>
                                </tr>
                                <tr hidden>
                                    <td>
                                        <input type="string" name="point" id="totalPoints" value="0">
                                        {{-- <p>Total Poin: <span id="totalPoints">0</span></p> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('pages.penduduk.create') --}}
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#bangunan').on('change', function() {
           //  alert( this.value ); // or $(this).val()
           if (this.value == "Milik Sendiri") {
               $('#2b').show();
           } else {
               $('#2b').hide();
           }
        });
        $('#sumber_penerangan').on('change', function() {
            //  alert( this.value ); // or $(this).val()
            if (this.value == "Listrik PLN dengan Meteran") {
                $('#10b').show();
            } else {
                $('#10b').hide();
            }
        });
        $('#fasilitas_pembuangan').on('change', function() {
           //  alert( this.value ); // or $(this).val()
            if (this.value == "Tidak ada fasilitas") {
                $('#12b').hide();
                $('#12c').hide();
            } else {
                $('#12b').show();
                $('#12c').show();
            }
        });
    });

    function perumahan(id) {
        var data = {
            'keluarga_id': $('input[name="keluarga_id"]').val(),
            'sts_kepemilikan': $('select[name="sts_kepemilikan"]').val(),
            'surat_kepemilikan': $('select[name="surat_kepemilikan"]').val(),
            'luas_lantai': $('input[name="luas_lantai"]').val(),
            'jenis_lantai': $('select[name="jenis_lantai"]').val(),
            'jenis_dinding': $('select[name="jenis_dinding"]').val(),
            'jenis_atap': $('select[name="jenis_atap"]').val(),
            'air_minum': $('select[name="air_minum"]').val(),
            'sumber_penerangan': $('select[name="sumber_penerangan"]').val(),
            'daya_penerangan': $('select[name="daya_penerangan"]').val(),
            'bahan_masak': $('select[name="bahan_masak"]').val(),
            'fasilitas_toilet': $('select[name="fasilitas_toilet"]').val(),
            'jenis_kloset': $('select[name="jenis_kloset"]').val(),
            'pembuangan': $('select[name="pembuangan"]').val(),
            'point': $('input[name="point"]').val(),
        }
            no_kk = document.getElementById('kk').value;
            var url = "{{ route('form', 'keluarga:id')}}";
            url = url.replace('keluarga:id', no_kk);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/rumah/store",
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
                    $('#succes_message').addClass('alert alert-success');
                    $('#succes_message').text(response.message);
                    // window.history.back()
                    alert(response.message)
                    window.location=document.referrer;

                    // location.href = url;
                }
            }
        });
    }


// Fungsi untuk mengambil nilai data-point dari elemen select
function getDataPoint(selectElement) {
    const selectedIndex = selectElement.selectedIndex;
    return parseInt(selectElement.options[selectedIndex].getAttribute('data-point'));
}

// Fungsi untuk menjumlahkan total data-point
function calculateTotalPoints() {
    const selectElements = document.querySelectorAll('select[name]');
    let totalPoints = 0;

    selectElements.forEach(select => {
        const selectedValue = select.value;
        if (selectedValue !== '') {
            const dataPoint = getDataPoint(select);
            totalPoints += dataPoint;
        }
    });

    // Mengambil nilai dari input luas_tanah
    const luasTanahInput = document.getElementById('luas_tanah');
    const luasTanahValue = parseInt(luasTanahInput.value);

    // Menambahkan nilai luas_tanah ke total poin
    totalPoints += luasTanahValue;

    // Menampilkan total poin di suatu elemen
    const totalPointsElement = document.getElementById('totalPoints');
    totalPointsElement.value = totalPoints;
}

// Memasang event listener pada setiap select element
const selectElements = document.querySelectorAll('select[name]');
selectElements.forEach(select => {
    select.addEventListener('change', calculateTotalPoints);
});

// Memasang event listener pada input luas_tanah
const luasTanahInput = document.getElementById('luas_tanah');
luasTanahInput.addEventListener('input', calculateTotalPoints);


</script>

@endsection

