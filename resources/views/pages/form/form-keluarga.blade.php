@extends('pages.form.form')
@section('form')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_body">
            <div class="QA_section">
                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
                    id="show">
                    <!-- table-responsive -->
                    <ul id="saveform_errList"></ul>
                    <div id="succes_message"></div>
                    <div id="keluarga" style="display: ">
                        <table class="table">
                            <thead class="thead" >
                                <tr>
                                    <th colspan="2">I. Keterangan Keluarga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1. Nama Kepala Keluarga </td>
                                    <td>
                                        <div>
                                            <input type="text" name="nama_kepala_keluarga" class="form-control form-control-sm">
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div>2. Jumlah anggota keluarga</div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col col-1">
                                                <div class="btn btn-sm btn-primary" id="kurang">-</div>
                                            </div>
                                            <div class="col-3">
                                                <input type="number" name="jumlah_anggota_keluarga" class="form-control form-control-sm justify-content-lg-center" style="text-align: center" id="jumlah" readonly>
                                            </div>

                                            <div class="col col-1">
                                                <div class="btn btn-sm btn-primary" id="tambah">+</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div>3. Nomor Kartu Keluarga</div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="number" name="no_kk" class="form-control form-control-sm" id="inputkk" oninput="input_no_kk()">
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none">
                                    <td><input type="text" name="keluarga_id" id="outputkk">No KK</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="d-flex justify-content-end">
                                        <button class="btn btn-primary" id="btn_keluarga" onclick="keluarga(no_kk)">Berikutnya</button>
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

@endsection
