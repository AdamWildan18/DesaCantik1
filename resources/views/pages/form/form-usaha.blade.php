
<div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
id="show">
    <!-- table-responsive -->
    <ul id="saveform_errList"></ul>
    <div id="succes_message"></div>

        {{-- Kepemilikan Usaha --}}
    <table class="table" id="usaha" style="display: ">
        <thead class="thead">
            <tr>
                <th colspan="7">D. Kepemilikan Usaha (Anggota Keluarga usia 5 Tahun ke Atas)</th>
            </tr>
        </thead>
        <tbody id="usaha">
            <tr>
                <td>
                    <div class="col-sm">27. Apakah (nama) memiliki usaha sendiri?</div>
                </td>
                <td>
                    <span>1</span>
                    <div class="col-sm">
                        <select name="kepemilikan_usaha" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">28. berapa jumlah usaha sendiri/bersama yang dimiliki?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="number" name="jumlah_usaha" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">29. Jumlah pekerja yang di bayar pada usaha utama?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="number" name="jumlah_pekerja" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">30. Jumlah pekerja yang tidak di bayar pada usaha utama?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="text" name="jumlah_pekerja_gabayar" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">31. Omset Usaha utama perbulan (Rupiah)</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="omset_usaha" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="kurang dari 5 juta">kurang dari 5 juta</option>
                            <option value="kurang lebih 5-15 juta">kurang lebih 5-15 juta</option>
                            <option value="kurang lebih 15-25 juta">kurang lebih 15-25 juta</option>
                            <option value="kurang lebih 25-167 juta">kurang lebih 25-167 juta</option>
                            <option value="kurang lebih 167-1.250 juta">kurang lebih 167-1.250 juta</option>
                            <option value="kurang lebih 1.250-4.167 juta">kurang lebih 1.250-4.167 juta</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">32. Penggunaan Internet dalam kegiatan usaha utama</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="internet_usaha" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Tidak menggunakan internet">Tidak menggunakan internet</option>
                            <option value="Sebagai Sarana Komunikasi">Sebagai Sarana Komunikasi</option>
                            <option value="Untuk Mencari informasi">Untuk Mencari informasi</option>
                            <option value="Sebagai pemasaran/iklan">Sebagai pemasaran/iklan</option>
                            <option value="Sebagai sarana penjualan produk">Sebagai sarana penjualan produk</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td><button class="btn btn-primary" id="btn_usaha_back">Kembali</button></td>
                <td class="d-flex justify-content-end">
                    <button class="btn btn-primary" id="btn_usaha">Berikutnya</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>
