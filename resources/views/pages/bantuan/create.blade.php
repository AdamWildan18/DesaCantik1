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
                    {{-- <form action="/pekerjaan/store/{{$id}}" method="POST">
                        @csrf --}}
                    <div id="keluarga" style="display: ">
                        <table class="table" id="append">
                            <thead class="thead" >
                                <tr>
                                    <th colspan="2">Keterangan Ketenagakerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form class="pekerjaanform" action="/pekerjaan/store" method="POST">
                                    @csrf
                                    <tr>
                                        <td>Nomor Kepala Keluarga</td>
                                        <td>
                                            <input class="form-control datalist" name="keluarga_id" list="datalistOptions" placeholder="Type to search...">
                                            <datalist id="datalistOptions">
                                                @foreach ($data as $item)
                                                <option value="{{ $item->id }}">
                                                @endforeach
                                            </datalist>
                                        </td>
                                    </tr>
                                    <tr id="bpnt">
                                        <td>Jenis Bantuan</td>
                                        <td colspan="2">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="BPNT" name="bpnt">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Bantuan Sosial Sembako/BPNT
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="PKH" name="pkh">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Keluarga Harapan (PKH)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="BTL" name="blt">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Bantuan Langsung Tunai (BLT)Desa
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Subsidi Listrik" name="subsidi_listrik">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Subsidi Listrik (gratis/pemotongan biaya)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Subsidi Pupuk" name="subsidi_pupuk">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" class="form-control" name="tanggal_bantuan[]">
                                                    <label class="input-group-text">
                                                      Program Bantuan Subsidi Pupuk
                                                    </label>
                                                </div>
                                            </div>
                                                
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="Subsidi LPG" name="subsidi_lpg">
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
                                        <td colspan="3">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-primary btn-sm m-1">Simpan</button>
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
        <div id="point"></div>
    </div>
    
@endsection

@section('scripts')

<script>
    $(document).on('submit', '.pekerjaanform', function (event) {
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
            alert('Terjadi kesalahan saat memproses formulir.'); // Show a generic error message
        });
    });

    function checkAndHideBPNT(programPoints) {
        if (programPoints >= 10) {
            $("#bpnt").hide();
        } else {
            $("#bpnt").show();
        }
    }

    // Listen to changes in the datalist input
    $(".datalist").on('input', function () {
        var datalistValue = $(this).val();
        var keluargaId = $("#datalistOptions option[value='" + datalistValue + "']").val();

        if (keluargaId) {
            // Use Ajax to fetch program points from the server
            $.ajax({
                url: '/bantuan_datalist', // Replace with your endpoint to fetch program points
                method: 'GET',
                data: { keluargaId: keluargaId },
                success: function (response) {
                    console.log(response.program)
                    checkAndHideBPNT(response.program);
                },
                error: function () {
                    console.log('Failed to fetch program points.');
                }
            });
        }
    });

    // Call the function initially
    // checkAndHideBPNT(0);
</script>

@endsection





