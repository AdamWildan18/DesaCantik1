@extends('layouts.app')
@section('container')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                    </div>
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
                                    <table class="table">
                                        <thead class="thead" >
                                            <tr>
                                                <th colspan="2">Keterangan Ketenagakerjaan</th>
                                            </tr>
                                        </thead>
                                        <tbody id="append">
                                            <form class="pekerjaanform" action="/bantuan/store" method="POST">
                                                @csrf
                                                <tr>
                                                    <td>Nomor Kepala Keluarga</td>
                                                    <td>
                                                        <input class="form-control" name="keluarga_id[]" value="{{ $data->id }}" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Bantuan</td>

                                                    @foreach ($data->penduduks as $item)
                                                    @once
                                                    <td >
                                                        @if ($item->sosials !== null && $item->sosials->point > 10)  
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" value="BPNT" name="bpnt">
                                                            <div class="input-group input-group-sm">
                                                                
                                                                <label class="input-group-text">
                                                                Program Bantuan Sosial Sembako/BPNT
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if ($item->pendidikans !== null && $item->pendidikans->point > 10) 
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" value="PKH" name="pkh">
                                                            <div class="input-group input-group-sm">
                                                                
                                                                <label class="input-group-text">
                                                                Program Keluarga Harapan (PKH)
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if ($item->kesehatans !== null && $item->kesehatans->point > 10)
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" value="BTL" name="blt">
                                                            <div class="input-group input-group-sm">
                                                                
                                                                <label class="input-group-text">
                                                                Program Bantuan Langsung Tunai (BLT)Desa
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if ($item->rumahs !== null && $item->rumahs->point > 10)
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" value="Subsidi Listrik" name="listrik">
                                                            <div class="input-group input-group-sm">
                                                                
                                                                <label class="input-group-text">
                                                                Program Subsidi Listrik (gratis/pemotongan biaya)
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if ($item->pekerjaans !== null && strpos($item->pekerjaans->lapangan_kerja, 'Petani') !== false)
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" value="Subsidi Pupuk" name="pupuk">
                                                            <div class="input-group input-group-sm">
                                                                
                                                                <label class="input-group-text">
                                                                    Program Bantuan Subsidi Pupuk
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if ($item->programs !== null && strpos($item->programs->asset_bergerak, 'Tabung Gas Min.5.5') !== false)
                                                        @else
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" value="Subsidi LPG" name="lpg">
                                                            <div class="input-group input-group-sm">
                                                                
                                                                <label class="input-group-text">
                                                                Program Bantuan Subsidi LPG
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        
                                                        @endonce
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="d-flex justify-content-end">
                                                            <button id="fsimpan" class="btn btn-primary btn-sm m-1">Simpan</button>
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
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('scripts')

<script>
$(document).ready(function () {

    $('#fsimpan').on('click', function()
    {
        $('#simpan').click();
    })
    


});
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
</script>

@endsection





