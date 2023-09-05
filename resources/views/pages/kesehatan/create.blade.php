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
                    {{-- <form action="/kesehatan/store/{{$id}}" method="POST"> --}}
                        {{-- @csrf --}}
                        <div id="keluarga" style="display: ">
                            <table class="table" id="append">
                                <thead class="thead" >
                                    <tr>
                                        <th colspan="2">Keterangan Kesehatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form class="kesehatanform" action="/kesehatan/store" method="POST">
                                    @foreach ($data->penduduks as $item)
                                    <?php $i= 0; ?>
                                        @csrf
                                        <?php $i=$loop->index; ?>
                                        <tr>
                                            <td>Nomor Induk Kependudukan </td>
                                            <td>
                                                <div class="form-control form-control-sm">
                                                    {{ $item->nik }}
                                                    <input type="number" id="kk" name="penduduk_id[]" readonly class="form-control form-control-sm @error('penduduk_id') is-invalid @enderror" value="{{ $item->id }}" style="display: none">
                                                    
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Anggota Keluarga</td>
                                            <td>
                                                <div class="form-control form-control-sm">
                                                    {{ $item->nama }}
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                Apakah Nama Memilki gangguan tersebut?
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" data-point="1" name="gangguan[{{ $item->id }}][]" class="input-group-text" value="Gangguan mata" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div type="text" class="form-control form-control-sm text-center" >Gangguan Mata</div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" data-point="1" name="gangguan[{{ $item->id }}][]" class="input-group-text" value="Gangguan Jari" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div type="text" class="form-control form-control-sm text-center" >Gangguan Jari </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" data-point="1" name="gangguan[{{ $item->id }}][]" class="input-group-text" value="Gangguan Kemampuan Intelektual" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div type="text" class="form-control form-control-sm text-center" >Gangguan Kemampuan Intelektual</div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" data-point="1" name="gangguan[{{ $item->id }}][]" class="input-group-text" value="Gangguan perilaku" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div type="text" class="form-control form-control-sm text-center" >Gangguan perilaku</div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" data-point="1" name="gangguan[{{ $item->id }}][]" class="input-group-text" value="Gangguan Komunikasi" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div type="text" class="form-control form-control-sm text-center" >Gangguan Komunikasi</div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" data-point="1" name="gangguan[{{ $item->id }}][]" class="input-group-text" value="Gangguan Mengurus Diri" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div type="text" class="form-control form-control-sm text-center" >Gangguan Mengurus Diri</div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" data-point="1" name="gangguan[{{ $item->id }}][]" class="input-group-text" value="Gangguan Konsentrasi" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div type="text" class="form-control form-control-sm text-center" >Gangguan Konsentrasi"</div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" data-point="1" name="gangguan[{{ $item->id }}][]" class="input-group-text" value="Gangguan Depresi" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Gangguan Depresi</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Apakah Nama Memiliki Penyakit Kronis Tersebut?</td>
                                            <td>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Darah Tinggi" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Darah Tinggi</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Rematik" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Rematik</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Asma" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Asma</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Masalah Jantung" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Masalah Jantung</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Kencing Manis" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Kencing Manis</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="TBC" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">TBC</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Stroke" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Stroke</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Kangker / Tumor Ganas" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Kangker / Tumor Ganas</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Gagal Ginjal" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Gagal Ginjal</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="HIV / AIDS" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">HIV / AIDS</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Kolestrol" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Kolestrol</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Sirosis Hati" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Sirosis Hati</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Thalasemia" name="kesehatan_kronis[{{ $item->id }}][]"onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Thalasemia</div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" data-point="1" type="checkbox"  value="Hemofilia" name="kesehatan_kronis[{{ $item->id }}][]" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Hemofilia</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kondisi Giji Anak Usia 0-4 tahun</td>
                                            <td>
                                                <select name="giji_anak[{{ $item->id }}]" id="giji_anak_{{ $item->id }}" class="form-select form-select-sm" onchange="calculateTotalPoints({{ $item->id }})">
                                                    <option data-point="0" value="Tidak Ada Catatan">Tidak Ada Catatan</option>
                                                    <option data-point="1" value="Kurang Giji">Kurang Giji</option>
                                                    <option data-point="1" value="Stunting">Stunting</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="point[{{ $item->id }}]" id="total_point_{{ $item->id }}" value="0" class="form-control form-control-sm totalpoint" readonly>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
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
    </div>
    
@endsection

@section('scripts')

<script>
    $(document).on('submit', '.kesehatanform', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function (response) {
            if (response.success) {
                alert(response.message)
                window.location=document.referrer; 
            } else {
                alert('Gagal Data sudah ada atau ada kesalahan input'); 
            }
        }).fail(function () {
            alert('An error occurred while processing the form.'); 
        });
    });

    function getDataPoint(element) {
        return parseInt($(element).data('point')) || 0;
    }

    function calculateTotalPoints(pendudukId) {
        var totalPoints = 0;
        
        // Menghitung total poin dari checkbox gangguan
        $('input[name="gangguan[' + pendudukId + '][]"]:checked').each(function () {
            totalPoints += getDataPoint(this);
        });

        // Menghitung total poin dari checkbox penyakit kronis
        $('input[name="kesehatan_kronis[' + pendudukId + '][]"]:checked').each(function () {
            totalPoints += getDataPoint(this);
        });

        var selectedOption = $('#giji_anak_' + pendudukId + ' option:selected');
        totalPoints -= getDataPoint(selectedOption);

        totalPoints += 20;
        console.log('Total Points:', totalPoints); // Tambahkan ini untuk melacak total poin

        // Menyimpan total poin di elemen totalpoint
        $('#total_point_' + pendudukId).val(totalPoints);
    }


</script>

@endsection
