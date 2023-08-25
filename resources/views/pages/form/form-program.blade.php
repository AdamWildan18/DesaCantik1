
<div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
id="show">
    <!-- table-responsive -->
    <ul id="saveform_errList"></ul>
    <div id="succes_message"></div>

        {{-- Keikut sertaan program, kepemilikan aset, dan layanan --}}
    <table class="table" id="program" style="display: ">
        <thead class="thead">
            <tr>
                <th colspan="7">IV. Keikut sertaan program, kepemilikan aset, dan layanan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7">
                    <div class="col-sm">50. Dalam 1 tahun terakhir, apakah keluarga menerima program berikut?</div>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table justify-content-center" id="program1" style="display: ">
            <thead>
                <tr>
                    <th>Jenis Program</th>
                    <th>Keikutsertaan</th>
                    <th>Periode terakhir mendapatkan program</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>a. Program bantuan sosial sembako/BPNT</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bpnt[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="bpnt[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                            </div>
                    </td>
                    <td><input type="date" name="tanggal_bpnt" class="form-control"></td>
                </tr>
                <tr>
                    <td>b. Program Keluarga Harapan PKH</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pkh[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="pkh[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                            </div>
                    </td>
                    <td><input type="date" name="tanggal_pkh" class="form-control"></td>
                </tr>
                <tr>
                    <td>c. Program Bantuan Langsung Tunai (BLT) Desa</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="blt[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="blt[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                            </div>
                    </td>
                    <td><input type="date" name="tanggal_blt" class="form-control"></td>
                </tr>
                <tr>
                    <td>d. Program Subsidi Listrik</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="subsidi_listrik[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="subsidi_listrik[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                            </div>
                    </td>
                    <td><input type="date" name="tanggal_subsidi_listrik" class="form-control"></td>
                </tr>
                <tr>
                    <td>e. Program Bantuan Pemerintahan Daerah</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bantuan_pemerintahan_daerah[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="bantuan_pemerintahan_daerah[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                            </div>
                    </td>
                    <td><input type="date" name="tanggal_bantuan_pemerintahan_daerah" class="form-control"></td>
                </tr>
                <tr>
                    <td>f. Program Bantuan Subsidi Pupuk</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="subsidi_pupuk[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="subsidi_pupuk[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                            </div>
                    </td>
                    <td><input type="date" name="tanggal_subsidi_pupuk" class="form-control"></td>
                </tr>
                <tr>
                    <td>g. Program Subsidi LPG</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="subsidi_lpg[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="subsidi_lpg[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                    <td><input type="date" class="form-control"></td>
                </tr>

                <tr>
                    <td>51. Keluarga Memiliki Aset bergerak sebagai berikut</td>
                </tr>
                <tr>
                    <td>a. Tabung gas 5,5 kg atau lebih</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tabung_gas[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tabung_gas[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>b. Lemari es/kulkas</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kulkas[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kulkas[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>c. Air Conditioner/AC</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ac[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ac[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>d. Pemanas Air (Water Heater)</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_heater[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="water_heater[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>e. Telepon Rumah</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="telepon_rumah[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="telepon_rumah[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>f. Televisi layar datar (minimal 30 inc)</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tv[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tv[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>g. Emas/Perhiasan (minimal 10 gram)</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perhiasan[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perhiasan[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>h. Komputer/Laptop/Tablet</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="komputer_laptop_tablet[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="komputer_laptop_tablet[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>i. Sepeda Motor</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="motor[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="motor[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>j. Speda</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sepeda[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sepeda[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>k. Mobil</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mobil[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mobil[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>l. Smartphone/Hp</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hp[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hp[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">52. Keluarga memiliki aset tidak bergerak sebagai berikut</td>
                </tr>
                <tr>
                    <td>a. Lahan selain yang di tempati</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lahan_lain[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lahan_lain[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>b. Rumah/bangunan di tempat lain</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bangunan_lain[0]" value="Ya" >
                            <label>
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bangunan_lain[0]" value="Tidak">
                            <label>
                                Tidak
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">53. Jumlah Ternak yang di miliki</td>
                </tr>
                <tr>
                    <td>a. Sapi</td>
                    <td>
                        <input type="number" name="sapi[]">
                    </td>
                </tr>
                <tr>
                    <td>b. Kerbau</td>
                    <td>
                        <input type="number" name="kerbau[]">
                    </td>
                </tr>
                <tr>
                    <td>c. Kuda</td>
                    <td>
                        <input type="number" name="kuda[]">
                    </td>
                </tr>
                <tr>
                    <td>d. Kambing/Domba</td>
                    <td>
                        <input type="number" name="kambing[]">
                    </td>
                </tr>
                <tr>
                    <td>54. Jenis akses internet utama yang digunakan keluarga selama sebulan terakhir</td>
                    <td colspan="2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tidak Menggunakan Internet">
                            <label>
                                Tidak Menggunakan Internet
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Internet dan TV Digital Berlangganan">
                            <label>
                                Internet dan TV Digital Berlangganan
                            </label>
                          </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Internet berlangganan (wifi)">
                            <label>
                                Internet berlangganan (wifi)
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Internet Handphone">
                            <label>
                                Internet Handphone
                            </label>
                          </div>
                        </div>


                    </td>
                </tr>
                <tr>
                    <td>55. Apakah keluarga Memiliki Rekening aktif atau dompet digital?</td>
                    <td colspan="2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Untuk Usaha">
                            <label>
                                Untuk Usaha
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Untuk Pribadi">
                            <label>
                                Untuk Pribadi
                            </label>
                          </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Untuk Usaha dan Pribadi">
                            <label>
                                Untuk Usaha dan Pribadi
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tidak Punya">
                            <label>
                                Tidak Punya
                            </label>
                          </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><button class="btn btn-success" id="btn_program_back">Kembali</button></td>
                    <td></td>
                    <td class="d-flex justify-content-end">
                        <button class="btn btn-success" onclick="simpan()">Simpan</button>
                    </td>
                </tr>
            </tbody>
    </table>
</div>
