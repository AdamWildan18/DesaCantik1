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
                                        <td>Status Pekerjaan</td>
                                        <td>
                                            <select name="sts_bekerja[]"  class="form-select form-select-sm">
                                                <option value=" "></option>
                                                <option value="Bekerja">Bekerja</option>
                                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Lama Berkerja
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="number" class="form-control form-control-sm" min="0" value="" max="24" name="jam_kerja[]">
                                                <span class="input-group-text input-group-sm">Jam</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Status dalam pekerjaan
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="lapangan_kerja[]">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <hr>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-primary btn-sm m-1" >Berikutnya</button>
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
</script>

@endsection





