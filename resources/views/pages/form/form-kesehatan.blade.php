<div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
id="show">
    <!-- table-responsive -->
    <ul id="saveform_errList"></ul>
    <div id="succes_message"></div>

        {{-- Kesehatan --}}
    <table class="table" id="kesehatan" style="display: ">
        <thead class="thead">
            <tr>
                <th colspan="7">E. Kesehatan</th>
            </tr>
        </thead>
        <tbody id="kesehatan">
            <tr>
                <td style="width: 40%">
                    <div class="col-sm">33. (Pertanyaan untuk usia 0-4 Tahun)Bagaimana kondidi giji anak dari pemeriksaan 3 bulan terakhir?</div>
                </td>
                <td colspan="3">
                    <span>1</span>
                    <div class="col-sm">
                        <select name="giji_anak" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Kurang giji">Kurang giji</option>
                            <option value="Stunting">Stunting</option>
                            <option value="Tidak ada catatan">Tidak ada catatan</option>
                            <option value="Tidak tahu">Tidak tahu</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">34. Apakah (Nama) mengalami kesulitan/gangguan penglihatan meskipun menggunakan alat bantu melihat?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_mata[]" value="Ya">
                        <label >
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_mata[]" value="Tidak" >
                        <label >
                          Tidak
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">35. Apakah (Nama) mengalami kesulitan/gangguan pendengaran meskipun menggunakan alat bantu dengar?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_pendengaran[]" value="Ya">
                        <label >
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_pendengaran[]" value="Tidak" >
                        <label >
                          Tidak
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">36. Apakah (Nama) mengalami kesulitan/gangguan menggerakan/menggunakan jari?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_jari[]" value="Ya">
                        <label >
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_jari[]" value="Tidak" >
                        <label >
                          Tidak
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">37. Dibandingkan dengan penduduk yang sebaya, apakah (Nama) mengalami kesulitan/gangguan dalam belajar atau kemampuan intelektual?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kemampuan_intelektual[]" value="Ya">
                        <label >
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kemampuan_intelektual[]" value="Tidak" >
                        <label >
                          Tidak
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">38. Dibandingkan dengan penduduk yang sebaya, apakah (Nama) mengalami kesulitan/gangguan mengendalikan perilaku?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_perilaku[]" value="Ya">
                        <label >
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_perilaku[]" value="Tidak" >
                        <label >
                          Tidak
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
            <td colspan="7" class="text-warning">Pertanyaan untuk usia 5 tahun ke atas</td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">39. Apakah (Nama) mengalami kesulitan/gangguan berbicara/berkomunikasi?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_komunikasi[]" value="Ya">
                        <label >
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_komunikasi[]" value="Tidak" >
                        <label >
                          Tidak
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">40. Apakah (Nama) mengalami kesulitan/gangguan untuk mengurus diri sendiri (mandi, makan, berpakaian, BAB)?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_mengurus_diri[]" value="Ya">
                        <label >
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_mengurus_diri[]" value="Tidak" >
                        <label >
                          Tidak
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">41. Apakah (Nama) mengalami kesulitan/gangguan mengingat/berkonsentrasi?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_konsentrasi[]" value="Ya">
                        <label >
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_konsentrasi[]" value="Tidak" >
                        <label >
                          Tidak
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">42. Apakah (Nama) mengalami gangguan kesedihan/depresi?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_depresi[]" value="Ya">
                        <label >
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gangguan_depresi[]" value="Tidak" >
                        <label >
                          Tidak
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">43. Apakah (Nama) memiliki keluhan kesehatan kronis?</div>
                </td>
                <td>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Tidak ada">
                        <label>
                            Tidak ada
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Darah Tinggi">
                        <label>
                            Darah Tinggi
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Rematik">
                        <label>
                            Rematik
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Asma">
                        <label>
                            Asma
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Masalah Jantung">
                        <label>
                            Masalah Jantung
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Kencing Manis">
                        <label>
                            Kencing Manis
                        </label>
                      </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="TBC">
                        <label>
                            TBC
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Stroke">
                        <label>
                            Stroke
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Kangker atau Tumor ganas">
                        <label>
                            Kangker atau Tumor ganas
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Gagal Ginjal">
                        <label>
                            Gagal Ginjal
                        </label>
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="hamophylla">
                        <label>
                            hamophylla
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="HIV/AIDS">
                        <label>
                            HIV/AIDS
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Kolestrol">
                        <label>
                            Kolestrol
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Sirosis hati">
                        <label>
                            Sirosis hati
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-check-input" type="checkbox" value="Thalasemia">
                        <label>
                            Thalasemia
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kesehatan_kronis[]" class="form-input" type="text" placeholder="Lainya">
                    </div>
                </td>
            </tr>
            <tr>
                <td><button class="btn btn-primary" id="btn_kesehatan_back">Kembali</button></td>
                <td></td>
                <td></td>
                <td class="d-flex justify-content-end" colspan="2">
                    <button class="btn btn-primary" id="btn_kesehatan">Berikutnya</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
