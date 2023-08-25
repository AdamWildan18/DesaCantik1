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
                                        <th colspan="2">Keterangan Pendidikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form class="sosialform" action="/sosial/update/{{ $data->id }}" method="POST">
                                        @csrf
                                        <?php $i= 0; ?>
                                        {{-- @foreach ($data as $data) --}}
                                        <tr>
                                            <td>Nomor Induk Kependudukan </td>
                                            <td>
                                                <div class="form-control form-control-sm">
                                                    {{ $data->penduduks->nik }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Anggota Keluarga</td>
                                            <td>
                                                <div class="form-control form-control-sm">
                                                    {{ $data->penduduks->nama }}
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Apakah Nama Memilkiki Jaminan Kesehatan?</td>
                                            <td>
                                                <select name="jaminan_kesehatan"class="form-select form-select-sm">
                                                    <option data-point="0" value=""></option>
                                                    <option data-point="1" value="PBI JKN" {{ $data->jaminan_kesehatan == 'PBI JKN' ? 'selected' : '' }}>PBI JKN</option>
                                                    <option data-point="1" value="JKN Mandiri" {{ $data->jaminan_kesehatan == 'JKN Mandiri' ? 'selected' : '' }}>JKN Mandiri</option>
                                                    <option data-point="1" value="JKN Pemberi Kerja" {{ $data->jaminan_kesehatan == 'JKN Pemberi Kerja' ? 'selected' : '' }}>JKN Pemberi Kerja</option>
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
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="Pra-Kerja" name="pra_kerja" id="flexCheckDefault"{{ $data->pra_kerja == 'Pra-Kerja' ? 'checked' : '' }}>
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        Program Pra-Kerja
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="KUR" name="kur" id="flexCheckDefault"{{ $data->kur == 'KUR' ? 'checked' : '' }}>
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        Program Kredit Usaha Rakyat (KUR)
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1" value="Ultra Mikro" name="ultra_mikro" id="flexCheckDefault"{{ $data->ultra_mikro == 'Ultra Mikro' ? 'checked' : '' }}>
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">
                                                        Program Pembiayaan Ultra Mikro
                                                    </div>
                                                </div>
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                    <input class="form-check-input" type="checkbox" value="PIP" data-point="1" name="pip" id="flexCheckDefault"{{ $data->pip == 'PIP' ? 'checked' : '' }}>
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
                                                @foreach ($ketenagakerjaan as $item)
                                                <div class=" input-group">
                                                    <div class=" input-group-text">
                                                        <input class="form-check-input" type="checkbox" data-point="1"  value="{{ $item }}" name="jaminan_ketenagakerjaan[]" {{ in_array($item, $jaminan) ? 'checked' : '' }} >
                                                    </div>
                                                    <div class="form-control form-control-sm text-center">{{ $item }}</div>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="point">
                                            </td>
                                        </tr>
                                        {{-- @endforeach --}}
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
    function calculateTotalPoints() {
        let totalPoints = 0;

        // Calculate points from the select element
        const selectElement = document.querySelector('select[name="jaminan_kesehatan"]');
        if (selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            totalPoints += parseInt(selectedOption.getAttribute('data-point'));
        }

        // Calculate points from checkboxes
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked[data-point]');
        checkboxes.forEach(checkbox => {
            totalPoints += parseInt(checkbox.getAttribute('data-point'));
        });

        // Update the total point input field
        const totalPointInput = document.querySelector('input[name="point"]');
        if (totalPointInput) {
            totalPointInput.value = totalPoints;
        }
    }

    // Trigger calculation on change of select and checkboxes
    document.addEventListener('change', calculateTotalPoints);

    // Initial calculation
    calculateTotalPoints();

    // Form submission handling
    $(document).on('submit', '.sosialform', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function (response) {
            // Handle the server response
            if (response.success) {
                alert(response.message);
                window.location = document.referrer; // Redirect to a success page if needed
            } else {
                alert('Gagal Data sudah ada atau ada kesalahan input'); // Show error message
            }
        }).fail(function () {
            alert('An error occurred while processing the form.'); // Show a generic error message
        });
    });
</script>

@endsection
