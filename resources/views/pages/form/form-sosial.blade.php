<div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
id="show">
    <!-- table-responsive -->
    <ul id="saveform_errList"></ul>
    <div id="succes_message"></div>

        {{-- Program perlindungan sosial --}}
    <table class="table" id="perlindungan_sosial" style="display: ">
        <thead class="thead">
            <tr>
                <th colspan="7">F. Program perlindungan sosial</th>
            </tr>
        </thead>
        <tbody id="perlindungan_sosial">
            <tr>
                <td style="width: 40%">
                    <div class="col-sm">44. Dalam 1 tahun terakhir, apakah (Nama) memiliki jaminan kesehatan?</div>
                </td>
                <td>
                    <span>1</span>
                    <div class="col-sm">
                        <select name="jaminan_kesehatan" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Tidak Memiliki">Tidak Memiliki</option>
                            <option value="PBI JKN">PBI JKN</option>
                            <option value="JKN Mandiri">JKN Mandiri</option>
                            <option value="JKN Pemberi Kerja">JKN Pemberi Kerja</option>
                            <option value="Jamkes Lainya">Jamkes Lainya</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
            <td colspan="7" class="text-warning">Pertanyaan untuk usia 5 tahun keatas</td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">45. Dalam 1 tahun terakhir, apakah (Nama) ikut serta program Pra-Kerja?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="pra_kerja" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Tidak tahu">Tidak tahu</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">46. Dalam 1 tahun terakhir, apakah (Nama) ikut serta program Kredit Usaha Rakyat (KUR)?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="kur" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Tidak tahu">Tidak tahu</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">47. Dalam 1 tahun terakhir, apakah (Nama) ikut serta program Pembiayaan Ultra Mikro?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="ultra_mikro" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Tidak tahu">Tidak tahu</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
            <td colspan="7" class="text-warning">Pertanyaan untuk usia 5-30 tahun</td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">48. Dalam 1 tahun terakhir, apakah (Nama) ikut serta dalam Program Indonesia Pintar (PIP)?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="pip" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Tidak tahu">Tidak tahu</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
            <td colspan="7" class="text-warning">Pertanyaan untuk usia 15 tahun ke atas</td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">49. Dalam 1 tahun terakhir, apakah (Nama) memiliki jaminan ketenaga kerjaan?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="jaminan_ketenagakerjaan" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Tidak tahu">Tidak tahu</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
            <td><button class="btn btn-primary" id="btn_perlindungan_sosial_back">Kembali</button></td>
            <td class="d-flex justify-content-end">
                <button class="btn btn-primary" id="btn_perlindungan_sosial">Berikutnya</button>
            </td>
        </tr>
        </tbody>
    </table>
</div>
