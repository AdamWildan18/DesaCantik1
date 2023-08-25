
<div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
id="show">
    <!-- table-responsive -->
    <ul id="saveform_errList"></ul>
    <div id="succes_message"></div>

        {{-- Pendidikan --}}
    <table class="table" id="pendidikan" style="display: ">
        <thead class="thead">
            <tr>
                <th colspan="7">B. Pendidikan (Anggota Keluarga Usia 5 Tahun Ke Atas)</th>
            </tr>
        </thead>
        <tbody id="pendidikan">
            <tr>
                <td>
                    <div class="col-sm">21. Partisipasi Sekolah</div>
                </td>
                <td>
                    <span>1</span>
                    <div class="col-sm">
                        <select name="partisipasi_sekolah" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Belum Pernah Sekolah">Belum Pernah Sekolah</option>
                            <option value="Masih Sekolah">Masih Sekolah</option>
                            <option value="Tidak Bersekolah Lahi">Tidak Bersekolah Lahi</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">22. Jenjang dan jenis pendidikan tertinggi yang pernah/sedang diduduki</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="jenjang_tertinggi" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Paket A">Paket A</option>
                            <option value="SDLB">SDLB</option>
                            <option value="SD">SD</option>
                            <option value="MI">MI</option>
                            <option value="SPM/PDF Ula">SPM/PDF Ula</option>
                            <option value="Paket B">Paket B</option>
                            <option value="SMP LB">SMP LB</option>
                            <option value="SMP">SMP</option>
                            <option value="MTs">MTs</option>
                            <option value="SPM/PDF Wustha">SPM/PDF Wustha</option>
                            <option value="Paket C">Paket C</option>
                            <option value="SMLB">SMLB</option>
                            <option value="SMA">SMA</option>
                            <option value="MA">MA</option>
                            <option value="SMK">SMK</option>
                            <option value="MAK">MAK</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">23. Kelas Tertinggi yang Pernah/Sedang di duduki</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="kelas_tertinggi" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Kelas 1">Kelas 1</option>
                            <option value="Kelas 2">Kelas 2</option>
                            <option value="Kelas 3">Kelas 3</option>
                            <option value="Kelas 4">Kelas 4</option>
                            <option value="Kelas 5">Kelas 5</option>
                            <option value="Kelas 6">Kelas 6</option>
                            <option value="Kelas Tamat/Lusus">Kelas Tamat/Lusus</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>

                <td><button class="btn btn-primary" id="btn_pendidikan_back">Kembali</button></td>
                <td class="d-flex justify-content-end">
                    <button class="btn btn-primary" id="btn_pendidikan">Berikutnya</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
