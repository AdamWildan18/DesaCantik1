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
                                @foreach ($data as $item)
                                <tr>
                                    <td>Nomor Kartu Keluarga</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="kk" name="keluarga_id" readonly value="{{ $item->keluarga_id }}">
                                    </td>
                                </tr>
                                <tr class="1a">
                                    <td>
                                        <div class="col-sm">Status kepemilikan bangunan</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="sts_kepemilikan" id="bangunan" onchange="updateSuratBangunan()" class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="3" value="Milik Sendiri" {{ $item->sts_kepemilikan == 'Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                                                <option data-point="1" value="Kontrak" {{ $item->sts_kepemilikan == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                                <option data-point="2" value="Bebas Sewa" {{ $item->sts_kepemilikan == 'Bebas Sewa' ? 'selected' : '' }}>Bebas Sewa</option>
                                                <option data-point="1" value="Dinas" {{ $item->sts_kepemilikan == 'Dinas' ? 'selected' : '' }}>Dinas</option>
                                            </select>
                                        </div>

                                    </td>
                                </tr>
                                @if ($item->sts_kepemilikan == 'Milik Sendiri')
                                    <tr id="2b">
                                        <td>
                                            <div class="col-sm">Surat bukti kepemilikan</div>
                                        </td>
                                        <td>
                                            <div class="col-sm">
                                                <select name="surat_kepemilikan" id="surat_bangunan" class="form-select form-select-sm">
                                                    <option value=""></option>
                                                    <option data-point="1" value="SHM atas nama anggota keluarga" {{ $item->surat_kepemilikan == 'SHM atas nama anggota keluarga' ? 'selected' : '' }}>SHM atas nama anggota keluarga</option>
                                                    <option data-point="1" value="SHM atas nama anggota keluarga dengan perjanjian pemerintahan" {{ $item->surat_kepemilikan == 'SHM atas nama anggota keluarga dengan perjanjian pemerintahan' ? 'selected' : '' }}>SHM atas nama anggota keluarga dengan perjanjian pemerintahan</option>
                                                    <option data-point="1" value="SHM atas nama anggota keluarga tanpa perjanjian pemerintahan" {{ $item->surat_kepemilikan == 'SHM atas nama anggota keluarga tanpa perjanjian pemerintahan' ? 'selected' : '' }}>SHM atas nama anggota keluarga tanpa perjanjian pemerintahan</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>
                                        <div class="col-sm">Luas Lantai Bangunan</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <input type="number" id="luas_tanah" name="luas_lantai" value="{{ $item->luas_lantai }}" class="form-control form-control-sm">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm">Jenis lantai terluas</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="jenis_lantai" class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="5" value="Marmer/granit" {{ $item->jenis_lantai == 'Marmer/granit' ? 'selected' : '' }}>Marmer/granit</option>
                                                <option data-point="4" value="Keramik" {{ $item->jenis_lantai == 'Keramik' ? 'selected' : '' }}>Keramik</option>
                                                <option data-point="3" value="Kayu" {{ $item->jenis_lantai == 'Kayu' ? 'selected' : '' }}>Kayu</option>
                                                <option data-point="2" value="Bambu" {{ $item->jenis_lantai == 'Bambu' ? 'selected' : '' }}>Bambu</option>
                                                <option data-point="1" value="Tanah" {{ $item->jenis_lantai == 'Tanah' ? 'selected' : '' }}>Tanah</option>
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
                                            <select name="jenis_dinding" class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="4" value="Tembok" {{ $item->jenis_dinding == 'Tembok' ? 'selected' : '' }}>Tembok</option>
                                                <option data-point="3" value="Plesteran" {{ $item->jenis_dinding == 'Plesteran' ? 'selected' : '' }}>Plesteran</option>
                                                <option data-point="2" value="Papan/kayu/gypsun/GRC" {{ $item->jenis_dinding == 'Papan/kayu/gypsun/GRC' ? 'selected' : '' }}>Papan/kayu/gypsun/GRC</option>
                                                <option data-point="1" value="Anyaman Bambu" {{ $item->jenis_dinding == 'Anyaman Bambu' ? 'selected' : '' }}>Anyaman Bambu</option>
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
                                            <select name="jenis_atap" class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="5" value="Beton" {{ $item->jenis_atap == 'Beton' ? 'selected' : '' }}>Beton</option>
                                                <option data-point="4" value="Genteng" {{ $item->jenis_atap == 'Genteng' ? 'selected' : '' }}>Genteng</option>
                                                <option data-point="3" value="Seng" {{ $item->jenis_atap == 'Seng' ? 'selected' : '' }}>Seng</option>
                                                <option data-point="2" value="Asbes" {{ $item->jenis_atap == 'Asbes' ? 'selected' : '' }}>Asbes</option>
                                                <option data-point="1" value="Bambu" {{ $item->jenis_atap == 'Bambu' ? 'selected' : '' }}>Bambu</option>
                                                <option data-point="1" value="Kayu" {{ $item->jenis_atap == 'Kayu' ? 'selected' : '' }}>Kayu</option>
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
                                            <select name="air_minum"class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="3" value="Air minum bermerk" {{ $item->air_minum == 'Air minum bermerk' ? 'selected' : '' }}>Air minum bermerk</option>
                                                <option data-point="2" value="Air isi ulang" {{ $item->air_minum == 'Air isi ulang' ? 'selected' : '' }}>Air isi ulang</option>
                                                <option data-point="1" value="Leding" {{ $item->air_minum == 'Leding' ? 'selected' : '' }}>Leding</option>
                                                <option data-point="1" value="Sumur bor/pompa" {{ $item->air_minum == 'Sumur bor/pompa' ? 'selected' : '' }}>Sumur bor/pompa</option>
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
                                                <option value=""></option>
                                                <option data-point="3" value="Listrik PLN dengan Meteran" {{ $item->sumber_penerangan == 'Listrik PLN dengan Meteran' ? 'selected' : '' }}>Listrik PLN dengan Meteran</option>
                                                <option data-point="3" value="Listrik PLN tanpa Meteran" {{ $item->sumber_penerangan == 'Listrik PLN tanpa Meteran' ? 'selected' : '' }}>Listrik PLN tanpa Meteran</option>
                                                <option data-point="2" value="Listrik non-PLN" {{ $item->sumber_penerangan == 'Listrik non-PLN' ? 'selected' : '' }}>Listrik non-PLN</option>
                                                <option data-point="1" value="Bukan Listrik" {{ $item->sumber_penerangan == 'Bukan Listrik' ? 'selected' : '' }}>Bukan Listrik</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                @if ($item->sumber_penerangan == 'Listrik PLN dengan Meteran')
                                <tr id="10b">
                                    <td>
                                        <div class="col-sm">Daya yang terpasang</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="daya_penerangan" id="" class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="1" value="450 watt" {{ $item->daya_penerangan == '450 watt' ? 'selected' : '' }}>450 watt</option>
                                                <option data-point="2" value="900 watt" {{ $item->daya_penerangan == '900 watt' ? 'selected' : '' }}>900 watt</option>
                                                <option data-point="3" value="1.300 watt" {{ $item->daya_penerangan == '1.300 watt' ? 'selected' : '' }}>1.300 watt</option>
                                                <option data-point="4" value="2.200 watt" {{ $item->daya_penerangan == '2.200 watt' ? 'selected' : '' }}>2.200 watt</option>
                                                <option data-point="5" value=">2.200 watt" {{ $item->daya_penerangan == '>2.200 watt' ? 'selected' : '' }}>>2.200 watt</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                @elseif($item->sumber_penerangan == 'Listrik PLN tanpa Meteran')
                                <tr id="10b">
                                    <td>
                                        <div class="col-sm">Daya yang terpasang</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="daya_penerangan" id="" class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="1" value="450 watt" {{ $item->daya_penerangan == '450 watt' ? 'selected' : '' }}>450 watt</option>
                                                <option data-point="2" value="900 watt" {{ $item->daya_penerangan == '900 watt' ? 'selected' : '' }}>900 watt</option>
                                                <option data-point="3" value="1.300 watt" {{ $item->daya_penerangan == '1.300 watt' ? 'selected' : '' }}>1.300 watt</option>
                                                <option data-point="4" value="2.200 watt" {{ $item->daya_penerangan == '2.200 watt' ? 'selected' : '' }}>2.200 watt</option>
                                                <option data-point="5" value=">2.200 watt" {{ $item->daya_penerangan == '>2.200 watt' ? 'selected' : '' }}>>2.200 watt</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td>
                                        <div class="col-sm">Bahan bakar/energi memasak</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="bahan_masak" class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="7" value="Listrik" {{ $item->bahan_masak == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                                                <option data-point="6" value="Gas elpiji 5kg" {{ $item->bahan_masak == 'Gas elpiji 5kg' ? 'selected' : '' }}>Gas elpiji 5kg</option>
                                                <option data-point="5" value="Gas elpiji 12kg" {{ $item->bahan_masak == 'Gas elpiji 12kg' ? 'selected' : '' }}>Gas elpiji 12kg</option>
                                                <option data-point="4" value="Gas elpiji 3kg" {{ $item->bahan_masak == 'Gas elpiji 3kg' ? 'selected' : '' }}>Gas elpiji 3kg</option>
                                                <option data-point="3" value="Biogas" {{ $item->bahan_masak == 'Biogas' ? 'selected' : '' }}>Biogas</option>
                                                <option data-point="2" value="Minyak Tanah" {{ $item->bahan_masak == 'Minyak Tanah' ? 'selected' : '' }}>Minyak Tanah</option>
                                                <option data-point="1" value="Kayu bakar" {{ $item->bahan_masak == 'Kayu bakar' ? 'selected' : '' }}>>Kayu bakar</option>
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
                                                <option value=""></option>
                                                <option data-point="4" value="Ada, digunakan hanya anggota keluarga" {{ $item->fasilitas_toilet == 'Ada, digunakan hanya anggota keluarga' ? 'selected' : '' }}>Ada, digunakan hanya anggota keluarga</option>
                                                <option data-point="3" value="Ada, digunakan bersama anggota keluarga tertentu" {{ $item->fasilitas_toilet == 'Ada, digunakan bersama anggota keluarga tertentu' ? 'selected' : '' }}>Ada, digunakan bersama anggota keluarga tertentu</option>
                                                <option data-point="2" value="Ada, MCK Komunal" {{ $item->fasilitas_toilet == 'Ada, MCK Komunal' ? 'selected' : '' }}>Ada, MCK Komunal</option>
                                                <option data-point="1" value="Tidak ada fasilitas" {{ $item->fasilitas_toilet == 'Tidak ada fasilitas' ? 'selected' : '' }}>Tidak ada fasilitas</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                @if ($item->fasilitas_toilet == 'Tidak ada fasilitas')
                                <tr id="12b" style="display: none">
                                    <td class="col-3">
                                        <div class="col-sm">Jenis Kloset</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="jenis_kloset" id="jenis_kloset" class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="4" value="Leher angsa" {{ $item->jenis_kloset == 'Leher angsa' ? 'selected' : '' }}>Leher angsa</option>
                                                <option data-point="3" value="Plengsengan dengan tutup" {{ $item->jenis_kloset == 'Plengsengan dengan tutup' ? 'selected' : '' }}>Plengsengan dengan tutup</option>
                                                <option data-point="2" value="Plengsengan tanpa tutup" {{ $item->jenis_kloset == 'Plengsengan tanpa tutup' ? 'selected' : '' }}>Plengsengan tanpa tutup</option>
                                                <option data-point="1" value="Cemplung/cubluk" {{ $item->jenis_kloset == 'Cemplung/cubluk' ? 'selected' : '' }}>Cemplung/cubluk</option>
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
                                                <option value=""></option>
                                                <option data-point="3" value="Tangki septik" {{ $item->pembuangan == 'Tangki septik' ? 'selected' : '' }}>Tangki septik</option>
                                                <option data-point="2" value="IPAL" {{ $item->pembuangan == 'IPAL' ? 'selected' : '' }}>IPAL</option>
                                                <option data-point="1" value="Kolam/Sawah/Sungai" {{ $item->pembuangan == 'Kolam/Sawah/Sungai' ? 'selected' : '' }}>Kolam/Sawah/Sungai</option>
                                                <option data-point="1" value="Lubang tanah" {{ $item->pembuangan == 'Lubang tanah' ? 'selected' : '' }}>Lubang tanah</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                @else
                                <tr id="12b">
                                    <td class="col-3">
                                        <div class="col-sm">Jenis Kloset</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="jenis_kloset" id="jenis_kloset" class="form-select form-select-sm">
                                                <option value=""></option>
                                                <option data-point="4" value="Leher angsa" {{ $item->jenis_kloset == 'Leher angsa' ? 'selected' : '' }}>Leher angsa</option>
                                                <option data-point="3" value="Plengsengan dengan tutup" {{ $item->jenis_kloset == 'Plengsengan dengan tutup' ? 'selected' : '' }}>Plengsengan dengan tutup</option>
                                                <option data-point="2" value="Plengsengan tanpa tutup" {{ $item->jenis_kloset == 'Plengsengan tanpa tutup' ? 'selected' : '' }}>Plengsengan tanpa tutup</option>
                                                <option data-point="1" value="Cemplung/cubluk" {{ $item->jenis_kloset == 'Cemplung/cubluk' ? 'selected' : '' }}>Cemplung/cubluk</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="12c">
                                    <td class="col-3">
                                        <div class="col-sm">Tempat pembuangan akhir tinja</div>
                                    </td>
                                    <td>
                                        <div class="col-sm">
                                            <select name="pembuangan" id="" class="form-select form-select-sm">
                                                <option data-point="0" value=""></option>
                                                <option data-point="3" value="Tangki septik" {{ $item->pembuangan == 'Tangki septik' ? 'selected' : '' }}>Tangki septik</option>
                                                <option data-point="2" value="IPAL" {{ $item->pembuangan == 'IPAL' ? 'selected' : '' }}>IPAL</option>
                                                <option data-point="1" value="Kolam/Sawah/Sungai" {{ $item->pembuangan == 'Kolam/Sawah/Sungai' ? 'selected' : '' }}>Kolam/Sawah/Sungai</option>
                                                <option data-point="1" value="Lubang tanah" {{ $item->pembuangan == 'Lubang tanah' ? 'selected' : '' }}>Lubang tanah</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                @endif

                                <tr>
                                    <td></td>
                                    <td class="d-flex justify-content-end">
                                        <button class="btn btn-primary" id="btn_perumahan" onclick="perumahan({{$id}})">Berikutnya</button>
                                    </td>
                                </tr>
                                <tr hidden>
                                    <td>
                                        <input type="string" name="point" id="totalPoints">
                                        {{-- <p>Total Poin: <span id="totalPoints">0</span></p> --}}
                                    </td>
                                </tr>
                                @endforeach
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
    function updateSuratBangunan(){
        var bangunanSelect = document.getElementById('bangunan');
        var suratBangunanSelect = document.getElementById('surat_bangunan');

        // Get the selected value of the bangunan select
        var selectedValue = bangunanSelect.value;

        // If the selected value is "miliksendiri", set the surat_bangunan select to have an empty value
        if (selectedValue === 'miliksendiri') {
            suratBangunanSelect.value = '';
        }
    }

    $(document).ready(function () {
        // var bangunan = ducument.getElementById('bangunan');
        var Sbangunan = document.getElementById('2b');
        var selectedBangunan = bangunan.value;

        $('#bangunan').on('change', function() {
           //  alert( this.value ); // or $(this).val()
           if (this.value == "Milik Sendiri") {
               $('#2b').show();
           } else {
               $('#2b').hide();
               Sbangunan.value = '';
               console.log(Sbangunan);
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
            url: "/rumah/update/"+ id,
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

// Memanggil fungsi calculateTotalPoints saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
        calculateTotalPoints();
    });
</script>

@endsection

