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
                                    <form class="kesehatanform" action="/kesehatan/update/{{ $data->id }}" method="POST">
                                        @csrf
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
                                            <td>
                                                Apakah Nama Memilki gangguan tersebut?
                                            </td>
                                            <td>
                                                @foreach ($dataGangguan as $item)
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" data-point="1" name="gangguan[]"
                                                            value="{{ $item }}" {{ in_array($item, $gangguan) ? 'checked' : '' }}>
                                                    </div>
                                                    <div type="text" class="form-control form-control-sm text-center">{{ $item }}</div>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Apakah Nama Memiliki Penyakit Kronis Tersebut?</td>
                                            <td>
                                                @foreach ($kronis as $item)
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <input class="form-check-input" type="checkbox" data-point="1"
                                                                value="{{ $item }}" name="kesehatan_kronis[]"
                                                                {{ in_array($item, $kesehatan) ? 'checked' : '' }}>
                                                        </div>
                                                        <div class="form-control form-control-sm text-center">{{ $item }}</div>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kondisi Giji Anak Usia 0-4 tahun</td>
                                            <td>
                                                <select name="giji_anak" data-point="1" class="form-select form-select-sm">
                                                    <option data-point="0" value=""></option>
                                                    <option data-point="1" value="Kurang Giji" {{ $data->giji_anak == 'Kurang Giji' ? 'selected' : '' }}>Kurang Giji</option>
                                                    <option data-point="1" value="Stunting" {{ $data->giji_anak == 'Stunting' ? 'selected' : '' }}>Stunting</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="point" id="total_point" value="0" class="form-control form-control-sm totalpoint" readonly>
                                            </td>
                                        </tr>
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
                    <div class="d-flex justify-content-end">
                        {{-- <button class="btn btn-primary btn-sm m-1" onclick="handleFormSubmit()" id="btn_penduduk">Berikutnya</button> --}}
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

    $(document).ready(function () {
        function calculateTotalPoints() {
            var totalPoints = 0;

            $('input[name="gangguan[]"]:checked').each(function () {
                totalPoints += parseInt($(this).data('point')) || 0;
            });

            $('input[name="kesehatan_kronis[]"]:checked').each(function () {
                totalPoints += parseInt($(this).data('point')) || 0;
            });

            var selectedOption = $('select[name="giji_anak"] option:selected');
            totalPoints -= parseInt(selectedOption.data('point')) || 0;

            totalPoints += 23;

            $('#total_point').val(totalPoints);
        }

        $('input[name="gangguan[]"], input[name="kesehatan_kronis[]"], select[name="giji_anak"]').on('change', function () {
            calculateTotalPoints();
        });

        calculateTotalPoints();
    });

    
</script>

@endsection





