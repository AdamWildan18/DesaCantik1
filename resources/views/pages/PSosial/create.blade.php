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
                        <div id="keluarga" style="display: ">
                            <table class="table" id="append">
                                <thead class="thead" >
                                    <tr>
                                        <th colspan="2">Keterangan Program Sosial</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form class="sosialform" action="/sosial/store" method="POST">
                                        @csrf
                                        @foreach ($data->penduduks as $item)
                                        <tr>
                                            <td>Nomor Induk Kependudukan </td>
                                            <td>
                                                <div class="form-control form-control-sm">
                                                    {{ $item->nik }}
                                                    <input type="number" id="kk" name="penduduk_id[]" readonly class="form-control form-control-sm" value="{{ $item->id }}" style="display: none">
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
                                            <td>Apakah Nama Memilkiki Jaminan Kesehatan?</td>
                                            <td>
                                                <select name="jaminan_kesehatan[{{ $item->id }}]" id="" class="form-select form-select-sm" onchange="calculateTotalPoints({{ $item->id }})">
                                                    <option data-point="0" value=""></option>
                                                    <option data-point="1" value="PBI JKN">PBI JKN</option>
                                                    <option data-point="1" value="JKN Mandiri">JKN Mandiri</option>
                                                    <option data-point="1" value="JKN Pemberi Kerja">JKN Pemberi Kerja</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Apakah Nama ikut serta dalam program tersebut?
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="Pra-Kerja" name="pra_kerja[{{ $item->id }}]" id="flexCheckDefault" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        Program Pra-Kerja
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="KUR" name="kur[{{ $item->id }}]" id="flexCheckDefault" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        Program Kredit Usaha Rakyat (KUR)
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="Ultra Mikro" name="ultra_mikro[{{ $item->id }}]" id="flexCheckDefault" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        Program Pembiayaan Ultra Mikro
                                                    </div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" value="PIP" data-point="1" name="pip[{{ $item->id }}]" id="flexCheckDefault" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">Program Indonesia Pintar</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Apakah Nama Memiliki Jaminan Ketenagakerjaan?
                                            </td>
                                            <td>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="BPJS Kecelakaan Kerja" name="jaminan_ketenagakerjaan[{{ $item->id }}][]" id="flexCheckDefault" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        BPJS Kecelakaan Kerja
                                                    </div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="BPJS Jaminan Kematian" name="jaminan_ketenagakerjaan[{{ $item->id }}][]" id="flexCheckDefault" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        BPJS Jaminan Kematian
                                                    </div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="BPJS Jaminan Hari Tua" name="jaminan_ketenagakerjaan[{{ $item->id }}][]" id="flexCheckDefault" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        BPJS Jaminan Hari Tua
                                                    </div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="BPJS Jaminan Pensiun" name="jaminan_ketenagakerjaan[{{ $item->id }}][]" id="flexCheckDefault" onchange="calculateTotalPoints({{ $item->id }})">
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        BPJS Jaminan Pensiun
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="point[{{ $item->id }}]" id="total_point_{{ $item->id }}" value="0" class="form-control form-control-sm" readonly>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3">
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary btn-sm m-1" type="submit">Simpan</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script>
    function getDataPoint(selectElement) {
        const selectedIndex = selectElement.selectedIndex;
        return parseInt(selectElement.options[selectedIndex].getAttribute('data-point'));
    }

    function calculateTotalPoints(pendudukId) {
        var totalPoints = 0;

        totalPoints += getDataPoint(document.querySelector(`select[name="jaminan_kesehatan[${pendudukId}]"]`));

        var checkboxes = document.querySelectorAll(`input[data-point][name^="pra_kerja[${pendudukId}]"], input[data-point][name^="kur[${pendudukId}]"], input[data-point][name^="ultra_mikro[${pendudukId}]"], input[data-point][name^="pip[${pendudukId}]"], input[data-point][name^="jaminan_ketenagakerjaan[${pendudukId}][]"]`);
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                totalPoints += parseInt(checkbox.getAttribute('data-point'));
            }
        });

        var totalPointElement = document.querySelector(`#total_point_${pendudukId}`);
        totalPointElement.value = totalPoints;
    }

    $(document).on('submit', '.sosialform', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function (response) {
            // Handle the server response
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

</script>

@endsection