
<div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
id="show">
    <!-- table-responsive -->
    <ul id="saveform_errList"></ul>
    <div id="succes_message"></div>

        {{-- keternaga kerjaan --}}
    <table class="table" id="ketenagakerjaan" style="display: ">
        <thead class="thead">
            <tr>
                <th colspan="7">C. Ketenagakerjaan (Anggota Keluarga Usia 5 Tahun ke Atas)</th>
            </tr>
        </thead>
        <tbody id="ketenagakerjaan">
            <tr>
                <td>
                    <div class="col-sm">24. Apakah (Nama) bekerja/membantu bekerja seminggu yamg lalu?</div>
                </td>
                <td>
                    <span>1</span>
                    <div class="col-sm">
                        <select name="sts_bekerja" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">25. Berapa Jam (Nama) bekerja?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="number" name="jam_kerja" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">26. Lapangan Usaha dari pekerjaan utama</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="text" name="lapangan_kerja" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>
            <tr>
                <td><button class="btn btn-primary" id="btn_ketenagakerjaan_back">Kembali</button></td>
                <td class="d-flex justify-content-end">
                    <button class="btn btn-primary" id="btn_ketenagakerjaan">Berikutnya</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
