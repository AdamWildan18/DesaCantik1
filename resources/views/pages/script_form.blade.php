<script>
    $(document).ready(function () {
        var penduduk = 1;
        var pendidikan = 1;
        var ketenagakerjaan = 1;
        var usaha = 1;
        var kesehatan = 1;
        var perlindungan_sosial = 1;
        var tambah = 0;
        var kurang = 1;
        $('#tambah').click(function(){
            document.getElementById("jumlah").stepUp();
            $('#addplus').append(
            `<tr>
                <td>
                    <div class="col-sm">14. Nama Anggota keluarga</div>
                </td>

                <td>
                    <div class="col-sm">
                        <span>`+(penduduk++)+`</span>
                        <input type="text" name="nama[]" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>
            <tr>
                <td>15. Nomor Induk Kependudukan</td>
                <td>

                    <input type="text" name="nik[]" class="form-control form-control-sm">
                </td>
            </tr>
            <tr>
                <td>16. Keterangan anggota keluarga</td>
                <td>

                    <div class="col-sm">
                        <select name="keterangan[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Tinggal bersama keluarga">Tinggal bersama keluarga</option>
                            <option value="Meninggal">Meninggal</option>
                            <option value="Tidak tinggal bersama keluarga(luar daerah)">Tidak tinggal bersama keluarga(luar daerah)</option>
                            <option value="Tidak tinggal bersama keluarga(luar negri)">Tidak tinggal bersama keluarga(luar negri)</option>
                            <option value="Anggota Keluarga Baru">Anggota Keluarga Baru</option>
                            <option value="Tidak Diketahui">Tidak Diketahui</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>17. Jenis Kelamin</td>
                <td>
                    <div class="col">
                        <input type="radio" name="jenis_kelamin[]" id="jenis_kelamin" class="jenis_kelamin"
                            value="Laki-Laki" required>
                        <label for="jenis_kelamin">Laki-Laki</label>
                    </div>
                    <div class="col">
                        <input type="radio" name="jenis_kelamin[]" id="jenis_kelamin" class="jenis_kelamin"
                            value="Perempuan" required>
                        <label for="jenis_kelamin">Perempuan</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>18. Tanggal Lahir</td>
                <td>
                    <input type="date" name="tanggal_lahir[]" class="form-control form-control-sm">
                </td>
            </tr>
            <tr>
                <td>19. Status Perkawinan</td>
                <td>
                    <select name="status_perkawinan[]" id="" class="form-select form-select-sm">
                        <option value=""></option>
                        <option value="Belum Kawin/nikah">Belum Kawin/nikah</option>
                        <option value="kawin/nikah">kawin/nikah</option>
                        <option value="Cerai hidup">Cerai hidup</option>
                        <option value="Cerai mati">Cerai mati</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>12. Hubungan dengan kepala keluarga</td>
                <td>
                    <select name="hub_keluarga[]" id="" class="form-select form-select-sm">
                        <option value=""></option>
                        <option value="Kepala keluarga">Kepala keluarga</option>
                        <option value="Istri">Istri</option>
                        <option value="Anak">Anak</option>
                        <option value="Menantu">Menantu</option>
                        <option value="Cucu">Cucu</option>
                        <option value="Orangtua/Mertua">Orangtua/Mertua</option>
                        <option value="Pembantu/supir">Pembantu/supir</option>
                    </select>
                </td>
            </tr>`
        );
        $('#pendidikan').append(
            `<tr>
                <td>
                    <div class="col-sm">Partisipasi Sekolah</div>
                </td>
                <td>
                    <span>`+(pendidikan++)+`</span>
                    <div class="col-sm">
                        <select name="partisipasi_sekolah[]" id="" class="form-select form-select-sm">
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
                    <div class="col-sm">Jenjang dan jenis pendidikan tertinggi yang pernah/sedang diduduki</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="jenjang_tertinggi[]" id="" class="form-select form-select-sm">
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
                    <div class="col-sm">Kelas Tertinggi yang Pernah/Sedang di duduki</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="kelas_tertinggi[]" id="" class="form-select form-select-sm">
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
            </tr>`
        );
        $('#ketenagakerjaan').append(
            `<tr>
                <td>
                    <div class="col-sm">Apakah (Nama) bekerja/membantu bekerja seminggu yamg lalu?</div>
                </td>
                <td>
                    <span>`+(ketenagakerjaan++)+`</span>
                    <div class="col-sm">
                        <select name="sts_bekerja[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">Berapa Jam (Nama) bekerja?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="number" name="jam_kerja[]" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">Lapangan Usaha dari pekerjaan utama</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="number" name="lapangan_kerja[]" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>`
        );
        $('#usaha').append(
            `<tr>
                <td>
                    <div class="col-sm">Apakah (nama) memiliki usaha sendiri?</div>
                </td>
                <td>
                    <span>`+(usaha++)+`</span>
                    <div class="col-sm">
                        <select name="kepemilikan_usaha[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">berapa jumlah usaha sendiri/bersama yang dimiliki?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="number" name="jumlah_usaha[]" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="col-sm">Jumlah pekerja yang di bayar pada usaha utama?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="number" name="jumlah_pekerja[]" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Jumlah pekerja yang tidak di bayar pada usaha utama?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <input type="text" name="jumlah_pekerja_gabayar[]" class="form-control form-control-sm">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Omset Usaha utama perbulan (Rupiah)</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="omset_usaha[]" id="" class="form-select form-select-sm">
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
                    <div class="col-sm">Penggunaan Internet dalam kegiatan usaha utama</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="internet_usaha[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Tidak menggunakan internet">Tidak menggunakan internet</option>
                            <option value="Sebagai Sarana Komunikasi">Sebagai Sarana Komunikasi</option>
                            <option value="Untuk Mencari informasi">Untuk Mencari informasi</option>
                            <option value="Sebagai pemasaran/iklan">Sebagai pemasaran/iklan</option>
                            <option value="Sebagai sarana penjualan produk">Sebagai sarana penjualan produk</option>
                        </select>
                    </div>
                </td>
            </tr>`
        );
        $('#kesehatan').append(
            `<tr>
                <td>
                    <div class="col-sm">(Pertanyaan untuk usia 0-4 Tahun)Bagaimana kondidi giji anak dari pemeriksaan 3 bulan terakhir?</div>
                </td>
                <td>
                    <span>`+(kesehatan++)+`</span>
                    <div class="col-sm">
                        <select name="giji_anak[]" id="" class="form-select form-select-sm">
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
                    <div class="col-sm">Apakah (Nama) mengalami kesulitan/gangguan penglihatan meskipun menggunakan alat bantu melihat?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="gangguan_mata[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">tidak</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Apakah (Nama) mengalami kesulitan/gangguan pendengaran meskipun menggunakan alat bantu dengar?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="gangguan_pendengaran[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">tidak</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Apakah (Nama) mengalami kesulitan/gangguan menggerakan/menggunakan jari?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="gangguan_jari[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">tidak</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Dibandingkan dengan penduduk yang sebaya, apakah (Nama) mengalami kesulitan/gangguan dalam belajar atau kemampuan intelektual?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="kemampuan_intelektual[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">tidak</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Dibandingkan dengan penduduk yang sebaya, apakah (Nama) mengalami kesulitan/gangguan mengendalikan perilaku?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="gangguan_perilaku[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">tidak</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
            <td colspan="7" class="text-warning">Pertanyaan untuk usia 5 tahun ke atas</td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Apakah (Nama) mengalami kesulitan/gangguan berbicara/berkomunikasi?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="gangguan_komunikasi[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">tidak</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Apakah (Nama) mengalami kesulitan/gangguan untuk mengurus diri sendiri (mandi, makan, berpakaian, BAB)?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="gangguan_mengurus_diri[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">tidak</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Apakah (Nama) mengalami kesulitan/gangguan mengingat/berkonsentrasi?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="gangguan_konsentrasi[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">tidak</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Apakah (Nama) mengalami gangguan kesedihan/depresi?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="gangguan_depresi[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="tidak">tidak</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm">Apakah (Nama) memiliki keluhan kesehatan kronis?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="kesehatan_kronis[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Tidak ada">Tidak ada</option>
                            <option value="Darah Tinggi">Darah Tinggi</option>
                            <option value="Rematik">Rematik</option>
                            <option value="Asma">Asma</option>
                            <option value="Masalah Jantung">Masalah Jantung</option>
                            <option value="Kencing Manis">Kencing Manis</option>
                            <option value="TBC">TBC</option>
                            <option value="Stroke">Stroke</option>
                            <option value="Kangker atau Tumor ganas">Kangker atau Tumor ganas</option>
                            <option value="Gagal Ginjal">Gagal Ginjal</option>
                            <option value="hamophylla">hamophylla</option>
                            <option value="HIV/AIDS">HIV/AIDS</option>
                            <option value="Kolestrol">Kolestrol</option>
                            <option value="Sirosis hati">Sirosis hati</option>
                            <option value="Thalasemia">Thalasemia</option>
                            <option value="Leukemia">Leukemia</option>
                        </select>
                    </div>
                </td>
            </tr>`
        );
        $('#perlindungan_sosial').append(
            `<tr>
                <td>
                    <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) memiliki jaminan kesehatan?</div>
                </td>
                <td>
                    <span>`+(perlindungan_sosial++)+`</span>
                    <div class="col-sm">
                        <select name="jaminan_kesehatan[]" id="" class="form-select form-select-sm">
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
                    <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) ikut serta program Pra-Kerja?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="pra_kerja[]" id="" class="form-select form-select-sm">
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
                    <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) ikut serta program Kredit Usaha Rakyat (KUR)?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="kur[]" id="" class="form-select form-select-sm">
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
                    <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) ikut serta program Pembiayaan Ultra Mikro?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="ultra_mikro[]" id="" class="form-select form-select-sm">
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
                    <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) ikut serta dalam Program Indonesia Pintar (PIP)?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="pip[]" id="" class="form-select form-select-sm">
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
                    <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) memiliki jaminan ketenaga kerjaan?</div>
                </td>
                <td>
                    <div class="col-sm">
                        <select name="jaminan_ketenagakerjaan[]" id="" class="form-select form-select-sm">
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Tidak tahu">Tidak tahu</option>
                        </select>
                    </div>
                </td>
            </tr>`
        );
        })
        $('#kurang').click(function(){
            document.getElementById("jumlah").stepDown();
        })



        $('#add').click(function() {


    });



    $('#btn_keluarga').on('click', function(){
        $('#keluarga').hide();
        $('#perumahan').show();
    })
    $('#btn_perumahan').on('click', function(){
        $('#perumahan').hide();
        $('#sosial_ekonomi').show();
        $('#tambah_data').show();
    })
    $('#btn_sosial_ekonomi').on('click', function(){
        $('#sosial_ekonomi').hide();
        $('#pendidikan').show();
        $('#pendidikan1').show();
        $('#tambah_data').hide();
    })
    $('#btn_pendidikan').on('click', function(){
        $('#pendidikan').hide();
        $('#pendidikan1').hide();
        $('#ketenagakerjaan').show();
        $('#ketenagakerjaan1').show();
    })
    $('#btn_ketenagakerjaan').on('click', function(){
        $('#ketenagakerjaan').hide();
        $('#ketenagakerjaan1').hide();
        $('#usaha').show();
        $('#usaha1').show();
    })
    $('#btn_usaha').on('click', function(){
        $('#usaha').hide();
        $('#usaha1').hide();
        $('#kesehatan').show();
        $('#kesehatan1').show();
    })
    $('#btn_kesehatan').on('click', function(){
        $('#kesehatan').hide();
        $('#kesehatan1').hide();
        $('#perlindungan_sosial').show();
        $('#perlindungan_sosial1').show();
    })
    $('#btn_perlindungan_sosial').on('click', function(){
        $('#perlindungan_sosial').hide();
        $('#perlindungan_sosial1').hide();
        $('#program').show();
        $('#program1').show();
    })

    // btn Back
    $('#btn_perumahan_back').on('click', function(){
        $('#perumahan').hide();
        $('#keluarga').show();
        // $('#tambah_data').show();
    })
    $('#btn_sosial_ekonomi_back').on('click', function(){
        $('#sosial_ekonomi').hide();
        $('#perumahan').show();
        $('#tambah_data').hide();
    })
    $('#btn_pendidikan_back').on('click', function(){
        $('#pendidikan').hide();
        $('#pendidikan1').hide();
        $('#sosial_ekonomi').show();
        $('#tambah_data').show();
    })
    $('#btn_ketenagakerjaan_back').on('click', function(){
        $('#ketenagakerjaan').hide();
        $('#ketenagakerjaan1').hide();
        $('#pendidikan').show();
        $('#pendidikan1').show();
    })
    $('#btn_usaha_back').on('click', function(){
        $('#usaha').hide();
        $('#usaha1').hide();
        $('#ketenagakerjaan').show();
        $('#ketenagakerjaan1').show();
    })
    $('#btn_kesehatan_back').on('click', function(){
        $('#kesehatan').hide();
        $('#kesehatan1').hide();
        $('#usaha').show();
        $('#usaha1').show();
    })
    $('#btn_perlindungan_sosial_back').on('click', function(){
        $('#kesehatan').show();
        $('#kesehatan1').show();
        $('#perlindungan_sosial').hide();
        $('#perlindungan_sosial1').hide();
    })
    $('#btn_program_back').on('click', function(){
        $('#perlindungan_sosial').show();
        $('#perlindungan_sosial1').show();
        $('#program').hide();
        $('#program1').hide();
    })

    });
    $('#bangunan').on('change', function() {
           //  alert( this.value ); // or $(this).val()
           if (this.value == "Milik Sendiri") {
               $('#2b').show();
           } else {
               $('#2b').hide();
           }
       });
    $('#sumber_penerangan').on('change', function() {
           //  alert( this.value ); // or $(this).val()
           if (this.value == "Listrik PLN dengan Meteran") {
               $('#7b').show();
           } else {
               $('#7b').hide();
           }
       });
    $('#fasilitas_pembuangan').on('change', function() {
           //  alert( this.value ); // or $(this).val()
           if (this.value == "Tidak ada fasilitas") {
               $('#9b').hide();
               $('#10a').hide();
           } else {
               $('#9b').show();
               $('#10a').show();
           }
       });

       function keluarga() {
            var data = {
                'no_kk': $('input[name="no_kk"]').val(),
                'nama_kepala_keluarga': $('input[name="nama_kepala_keluarga"]').val(),
                'jumlah_anggota_keluarga': $('input[name="jumlah_anggota_keluarga"]').val(),
            }
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/keluarga",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);+
                    if (response.status == 400) {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#saveform_errList').append('<li>' + err_values +
                                '</li>');
                        });
                    } else {
                        $('#saveform_errList').html("");
                        $('#succes_message').addClass('alert alert-success');
                        $('#succes_message').text(response.message);
                        // $('#AddPendudukModal').modal('hide');
                        $('#keluarga').hide();
                        // $('#perumahan').show();
                    }
                }
            });
        }

        function no_kk(){
            var y = document.getElementById("no_kk").value;
            document.getElementById("keluarga_id").value = y;
        }

        function perumahan() {
            var data = {
                'no_kk': $('input[name="no_kk"]').val(),
                'nama_kepala_keluarga': $('input[name="nama_kepala_keluarga"]').val(),
                'jumlah_anggota_keluarga': $('input[name="jumlah_anggota_keluarga"]').val(),
            }
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/keluarga",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);+
                    if (response.status == 400) {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#saveform_errList').append('<li>' + err_values +
                                '</li>');
                        });
                    } else {
                        $('#saveform_errList').html("");
                        $('#succes_message').addClass('alert alert-success');
                        $('#succes_message').text(response.message);
                        // $('#AddPendudukModal').modal('hide');
                        $('#keluarga').hide();
                        // $('#perumahan').show();
                    }
                }
            });
        }
</script>
