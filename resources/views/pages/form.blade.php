@extends('layouts.app')
@section('container')
    {{-- @include('pages.penduduk.modal') --}}
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="white_box_tittle list_header">
                                    <h3>Form pendataan</h3>
                                </div>

                                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
                                id="show">
                                    <div id="succes_message"></div>
                                    <div id="saveform_errList"></div>
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
                                                        <button class="btn btn-primary" id="btn_keluarga" onclick="keluarga()">Berikutnya</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                        {{-- Keterangan Perumahan --}}


                                        {{-- Keterangan Sosial Ekonomi Anggota Keluarga --}}
                                        <div id="sosial_ekonomi" style="display: none">
                                            <form action="penduduk" method="post">
                                                {{ csrf_field() }}
                                                    <table class="table" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2" class="">IV. Keterangan Sosial Ekonomi</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Keterangan Demografi</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <table>
                                                        <div style="display: "><input type="text" name="keluarga_id" id="keluargaid"></div>
                                                        <div id="penduduk" class="d-inline"></div>


                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary add_penduduk" type="submit">Berikutnya</button>
                                                        </div>
                                                    </table>

                                                    <ul id="saveform_errList"></ul>

                                                {{-- <div class="btn btn-success" id="add">+</div> --}}
                                            </form>
                                        </div>

                                        {{-- Pendidikan --}}
                                    <div id="pendidikan" style="display: none">
                                        <table class="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th colspan="7">B. Pendidikan (Anggota Keluarga Usia 5 Tahun Ke Atas)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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

                                        <table class="table" id="pendidikan1" style="display: none">
                                            <tr>
                                                <td><button class="btn btn-primary" id="btn_pendidikan_back">Kembali</button></td>
                                                <td class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" id="btn_pendidikan" onclick="pendidikan()">Berikutnya</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                        {{-- keternaga kerjaan --}}
                                    <div id="ketenagakerjaan" style="display: none">
                                        <table class="table">
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
                                        <table class="table" id="ketenagakerjaan1" style="display: none">
                                            <tr>
                                                <td><button class="btn btn-primary" id="btn_ketenagakerjaan_back">Kembali</button></td>
                                                <td class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" id="btn_ketenagakerjaan" onclick="ketenagakerjaan()">Berikutnya</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                        {{-- Kepemilikan Usaha --}}
                                    <div id="usaha" style="display: none">
                                        <table class="table">
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
                                        <table class="table" id="usaha1" style="display: none">
                                            <tr>
                                                <td><button class="btn btn-primary" id="btn_usaha_back">Kembali</button></td>
                                                <td class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" id="btn_usaha" onclick="usaha()">Berikutnya</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                        {{-- Kesehatan --}}
                                    <div id="kesehatan" style="display: none">
                                        <table class="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th colspan="7">E. Kesehatan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="kesehatan">
                                                <tr>
                                                    <td>
                                                        <div class="col-sm">33. (Pertanyaan untuk usia 0-4 Tahun)Bagaimana kondidi giji anak dari pemeriksaan 3 bulan terakhir?</div>
                                                    </td>
                                                    <td>
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
                                                        <div class="col-sm">
                                                            <select name="gangguan_mata" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="tidak">tidak</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-sm">35. Apakah (Nama) mengalami kesulitan/gangguan pendengaran meskipun menggunakan alat bantu dengar?</div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm">
                                                            <select name="gangguan_pendengaran" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="tidak">tidak</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-sm">36. Apakah (Nama) mengalami kesulitan/gangguan menggerakan/menggunakan jari?</div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm">
                                                            <select name="gangguan_jari" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="tidak">tidak</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-sm">37. Dibandingkan dengan penduduk yang sebaya, apakah (Nama) mengalami kesulitan/gangguan dalam belajar atau kemampuan intelektual?</div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm">
                                                            <select name="kemampuan_intelektual" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="tidak">tidak</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-sm">38. Dibandingkan dengan penduduk yang sebaya, apakah (Nama) mengalami kesulitan/gangguan mengendalikan perilaku?</div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm">
                                                            <select name="gangguan_perilaku" id="" class="form-select form-select-sm">
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
                                                        <div class="col-sm">39. Apakah (Nama) mengalami kesulitan/gangguan berbicara/berkomunikasi?</div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm">
                                                            <select name="gangguan_komunikasi" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="tidak">tidak</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-sm">40. Apakah (Nama) mengalami kesulitan/gangguan untuk mengurus diri sendiri (mandi, makan, berpakaian, BAB)?</div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm">
                                                            <select name="gangguan_mengurus_diri" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="tidak">tidak</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-sm">41. Apakah (Nama) mengalami kesulitan/gangguan mengingat/berkonsentrasi?</div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm">
                                                            <select name="gangguan_konsentrasi" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="tidak">tidak</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-sm">42. Apakah (Nama) mengalami gangguan kesedihan/depresi?</div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm">
                                                            <select name="gangguan_depresi" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Ya">Ya</option>
                                                                <option value="tidak">tidak</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-sm">43. Apakah (Nama) memiliki keluhan kesehatan kronis?</div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm">
                                                            <select name="kesehatan_kronis" id="" class="form-select form-select-sm">
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
                                                </tr>
                                                <tr>
                                                    <td><button class="btn btn-primary" id="btn_kesehatan_back">Kembali</button></td>
                                                    <td class="d-flex justify-content-end">
                                                        <button class="btn btn-primary" id="btn_kesehatan">Berikutnya</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table" id="kesehatan1" style="display: none">
                                            <tr>
                                                <td><button class="btn btn-primary" id="btn_kesehatan_back">Kembali</button></td>
                                                <td class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" id="btn_kesehatan" onclick="kesehatan()">Berikutnya</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                        {{-- Program perlindungan sosial --}}
                                    <div id="perlindungan_sosial" style="display: none">
                                        <table class="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th colspan="7">F. Program perlindungan sosial</th>
                                                </tr>
                                            </thead>
                                            <tbody id="perlindungan_sosial">
                                            <tr>
                                                    <td>
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
                                        <table class="table" id="perlindungan_sosial1" style="display: none">
                                            <tr>
                                                <td><button class="btn btn-primary" id="btn_perlindungan_sosial_back">Kembali</button></td>
                                                <td class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" id="btn_perlindungan_sosial" onclick="programsosial()">Berikutnya</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                        {{-- Keikut sertaan program, kepemilikan aset, dan layanan --}}
                                    <div id="program" style="display: none">
                                        <table class="table">
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
                                        <table class="table justify-content-center" id="program1" style="display: none">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="bpnt[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="pkh[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="blt[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="subsidi_listrik[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="bantuan_pemerintahan_daerah[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="subsidi_pupuk[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="subsidi_lpg[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="tabung_gas[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="kulkas[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="ac[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="water_heater[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="telepon_rumah[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="tv[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="perhiasan[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="komputer_laptop_tablet[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="motor[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="sepeda[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="mobil[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="hp[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="lahan_lain[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                                <label class="form-check-label">
                                                                Ya
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="bangunan_lain[0]" value="Tidak">
                                                                <label class="form-check-label">
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
                                                            <input type="number" name="sapi">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Kerbau</td>
                                                        <td>
                                                            <input type="number" name="kerbau">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Kuda</td>
                                                        <td>
                                                            <input type="number" name="kuda">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>d. Kambing/Domba</td>
                                                        <td>
                                                            <input type="number" name="kambing">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>54. Jenis akses internet utama yang digunakan keluarga selama sebulan terakhir</td>
                                                        <td colspan="2">
                                                            <select name="akses_internet" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Tidak menggunakan internet">Tidak menggunakan internet</option>
                                                                <option value="Internet dan Tv digital berlangganan">Internet dan Tv digital berlangganan</option>
                                                                <option value="Internet berlangganan (wifi)">Internet berlangganan (wifi)</option>
                                                                <option value="Internet Handphone">Internet Handphone</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>55. Apakah keluarga Memiliki Rekening aktif atau dompet digital?</td>
                                                        <td colspan="2">
                                                            <select name="rekening_dompetdigital" id="" class="form-select form-select-sm">
                                                                <option value=""></option>
                                                                <option value="Ya, untuk usaha">Ya, untuk usaha</option>
                                                                <option value="Ya, untuk pribadi">Ya, untuk pribadi</option>
                                                                <option value="Ya, untuk usaha dan pribadi">Ya, untuk usaha dan pribadi</option>
                                                                <option value="Tidak punya">Tidak punya</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><button class="btn btn-success" id="btn_program_back">Kembali</button></td>
                                                        <td></td>
                                                        <td class="d-flex justify-content-end">
                                                            <button class="btn btn-success" onclick="program()">Simpan</button>
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- @include('pages.penduduk.create') --}}
@endsection

@section('scripts')
<script>
    function input_no_kk() {
        let inputkk = document.getElementById("inputkk").value;
        document.getElementById("outputkk").value = inputkk;
        document.getElementById("keluargaid").value = inputkk;
    }


    //  var penduduk = 1;
    //     var pendidikan = 1;
    //     var ketenagakerjaan = 1;
    //     var usaha = 1;
    //     var kesehatan = 1;
    //     var perlindungan_sosial = 1;
    //     var tambah = 0;
    //     var kurang = 1;
    //     var array = 1;
        // $('#tambah').click(function(){
        //     document.getElementById("jumlah").stepUp();
        //     $('#addplus').append(
        //        `<div class="row">
        //             <div class="col-sm">
        //                 <div class="form-group mb-3">
        //                     <label for="">NIK</label>
        //                     <input type="text" name="nik[]" class="nik form-control" required>
        //                 </div>
        //             </div>
        //             <div class="col-sm">
        //                 <div class="form-group mb-3">
        //                     <label for="">Nama</label>
        //                     <input type="text" name="nama[]" class="nama form-control" required>
        //                 </div>
        //             </div>
        //         </div>

        //         <div class="row">

        //             <div class="col-sm">
        //                 <div class="form-group mb-3">
        //                     <label for="">Tanggal Lahir</label>
        //                     <input type="date" name="tanggal_lahir[]" class="tanggal_lahir form-control" required>
        //                 </div>
        //             </div>
        //         </div>`
        //     )

    $(document).ready(function () {
        var penduduk = 1;
        var pendidikan = 1;
        var ketenagakerjaan = 1;
        var usaha = 1;
        var kesehatan = 1;
        var perlindungan_sosial = 1;
        var tambah = 0;
        var kurang = 1;
        var array = 1;
        var L = 0;
        var P = 0;
        $('#tambah').click(function() {
            document.getElementById("jumlah").stepUp();
            // var x = document.getElementById("keluarga_id").value;
            $('#penduduk').append(
                `<tbody>
                    <tr>
                        <td>
                            <hr>
                        </td>
                        <td>`+(penduduk++)+`</td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Nama Anggota Keluarga </td>
                        <td><input type="text" name="nama[]" class="form-control form-control-sm"></td>
                    </tr>

                    <tr>
                        <td>Nomor Induk Kependudukan (NIK)</td>
                        <td><input type="number" name="nik[]" class="form-control form-control-sm"></td>
                    </tr>

                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><input type="date" name="tanggal_lahir[]" class="form-control form-control-sm"></td>
                    </tr>

                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <input type="radio" value="Laki-laki" name="jenis_kelamin[`+(L++)+`]"> Laki-laki <br>
                            <input type="radio" value="Perempuan" name="jenis_kelamin[`+(P++)+`]"> Perempuan
                        </td>
                    </tr>

                    <tr>
                        <td>Keterangan Keberadaan Anggota Keluarga</td>
                        <td>
                            <select name="keterangan[]" class="form-select form-select-sm">
                                <option value=""></option>
                                <option value="Tinggal Bersama Keluarga">Tinggal Bersama Keluarga</option>
                                <option value="Meninggal">Meninggal</option>
                                <option value="Pindah Ke Wilayah lain">Pindah Ke Wilayah lain</option>
                                <option value="Pindah ke Negara Lain">Pindah ke Negara Lain</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Status Perkawinan</td>
                        <td>
                            <select name="status_perkawinan[]" class="form-select form-select-sm">
                                <option value=""></option>
                                <option value="Belum Kawin / Belum Menikah">Belum Kawin / Belum Menikah</option>
                                <option value="Kawin / Menikah">Kawin / Menikah</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Status Hubungan Dengan Kepala Keluarga</td>
                        <td>
                            <select name="hub_keluarga[]" class="form-select form-select-sm">
                                <option value=""></option>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Menantu">Menantu</option>
                                <option value="Cucu">Cucu</option>
                                <option value="Pembantu / Supir">Pembantu / Supir</option>
                            </select>
                        </td>
                    </tr>
                </tbody>`
            );
            $('#pendidikan').append(
                `<tr>
                    <td>
                        <div class="col-sm">Partisipasi Sekolah</div>
                    </td>
                    <td>
                        <span>`+(pendidikan++)+`</span>
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
                        <div class="col-sm">Jenjang dan jenis pendidikan tertinggi yang pernah/sedang diduduki</div>
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
                        <div class="col-sm">Kelas Tertinggi yang Pernah/Sedang di duduki</div>
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
                        <div class="col-sm">Berapa Jam (Nama) bekerja?</div>
                    </td>
                    <td>
                        <div class="col-sm">
                            <input type="number" name="jam_kerja" class="form-control form-control-sm">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="col-sm">Lapangan Usaha dari pekerjaan utama</div>
                    </td>
                    <td>
                        <div class="col-sm">
                            <input type="number" name="lapangan_kerja" class="form-control form-control-sm">
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
                        <div class="col-sm">berapa jumlah usaha sendiri/bersama yang dimiliki?</div>
                    </td>
                    <td>
                        <div class="col-sm">
                            <input type="number" name="jumlah_usaha" class="form-control form-control-sm">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="col-sm">Jumlah pekerja yang di bayar pada usaha utama?</div>
                    </td>
                    <td>
                        <div class="col-sm">
                            <input type="number" name="jumlah_pekerja" class="form-control form-control-sm">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-sm">Jumlah pekerja yang tidak di bayar pada usaha utama?</div>
                    </td>
                    <td>
                        <div class="col-sm">
                            <input type="text" name="jumlah_pekerja_gabayar" class="form-control form-control-sm">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-sm">Omset Usaha utama perbulan (Rupiah)</div>
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
                        <div class="col-sm">Penggunaan Internet dalam kegiatan usaha utama</div>
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
                        <div class="col-sm">Apakah (Nama) mengalami kesulitan/gangguan penglihatan meskipun menggunakan alat bantu melihat?</div>
                    </td>
                    <td>
                        <div class="col-sm">
                            <select name="gangguan_mata" id="" class="form-select form-select-sm">
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
                            <select name="gangguan_pendengaran" id="" class="form-select form-select-sm">
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
                            <select name="gangguan_jari" id="" class="form-select form-select-sm">
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
                            <select name="kemampuan_intelektual" id="" class="form-select form-select-sm">
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
                            <select name="gangguan_perilaku" id="" class="form-select form-select-sm">
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
                            <select name="gangguan_komunikasi" id="" class="form-select form-select-sm">
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
                            <select name="gangguan_mengurus_diri" id="" class="form-select form-select-sm">
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
                            <select name="gangguan_konsentrasi" id="" class="form-select form-select-sm">
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
                            <select name="gangguan_depresi" id="" class="form-select form-select-sm">
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
                            <select name="kesehatan_kronis" id="" class="form-select form-select-sm">
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
                        <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) ikut serta program Pra-Kerja?</div>
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
                        <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) ikut serta program Kredit Usaha Rakyat (KUR)?</div>
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
                        <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) ikut serta program Pembiayaan Ultra Mikro?</div>
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
                        <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) ikut serta dalam Program Indonesia Pintar (PIP)?</div>
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
                        <div class="col-sm">Dalam 1 tahun terakhir, apakah (Nama) memiliki jaminan ketenaga kerjaan?</div>
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
                </tr>`
            );

            $('#kurang').click(function(){
                document.getElementById("jumlah").stepDown();
            })
        });
});


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
                    // console.log(response);
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
                        $('#keluarga').hide();
                        $('#perumahan').show();
                        // $('#AddPendudukModal').modal('hide');
                    }
                }
            });
        }

        function perumahan() {
            var data = {
                'keluarga_id': $('input[name="keluarga_id"]').val(),
                'sts_kepemilikan': $('select[name="sts_kepemilikan"]').val(),
                'surat_kepemilikan': $('select[name="surat_kepemilikan"]').val(),
                'luas_lantai': $('input[name="luas_lantai"]').val(),
                'jenis_lantai': $('select[name="jenis_lantai"]').val(),
                'jenis_dinding': $('select[name="jenis_dinding"]').val(),
                'jenis_atap': $('select[name="jenis_atap"]').val(),
                'air_minum': $('select[name="air_minum"]').val(),
                'sumber_penerangan': $('select[name="sumber_penerangan"]').val(),
                'daya_penerangan': $('select[name="daya_penerangan"]').val(),
                'bahan_masak': $('select[name="bahan_masak"]').val(),
                'fasilitas_toilet': $('select[name="fasilitas_toilet"]').val(),
                'jenis_kloset': $('select[name="jenis_kloset"]').val(),
                'pembuangan': $('select[name="pembuangan"]').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/perumahan",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
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
                        $('#perumahan').hide();
                        $('#sosial_ekonomi').show();
                        // $('#AddPendudukModal').modal('hide');
                    }
                }
            });
        }

        // function penduduk() {
        //     var data = {
        //         'keluarga_id' : $('input[name="keluarga_id"]').val(),
        //         'nama' : $('input[name="nama"]').val(),
        //         'nik' : $('input[name="nik"]').val(),
        //         'keterangan' : $('select[name="keterangan"]').val(),
        //         'jenis_kelamin' : $('input[name="jenis_kelamin"]').val(),
        //         'tanggal_lahir' : $('input[name="tanggal_lahir"]').val(),
        //         'status_perkawinan' : $('select[name="status_perkawinan"]').val(),
        //         'hub_keluarga' : $('select[name="hub_keluarga"]').val(),
        //     }
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //         type: "POST",
        //         url: "penduduk",
        //         data: data,
        //         dataType: "json",
        //         success: function(response) {
        //             console.log(response);
        //             if (response.status == 400) {
        //                 $('#saveform_errList').html("");
        //                 $('#saveform_errList').addClass('alert alert-danger');
        //                 $.each(response.errors, function(key, err_values) {
        //                     $('#saveform_errList').append('<li>' + err_values +
        //                         '</li>');
        //                 });
        //             } else {
        //                 $('#saveform_errList').html("");
        //                 $('#succes_message').addClass('alert alert-success');
        //                 $('#succes_message').text(response.message);
        //                 $('#sosial_ekonomi').hide();
        //                 $('#pendidikan').show();
        //                 // $('#AddPendudukModal').modal('hide');
        //             }
        //         }
        //     });
        // }

        function pendidikan() {
            var data = {
                'penduduk_id' : $('input[name="penduduk_id"]').val(),
                'partisipasi_sekolah' : $('select[name="partisipasi_sekolah"]').val(),
                'jenjang_tertinggi' : $('select[name="jenjang_tertinggi"]').val(),
                'kelas_tertinggi' : $('select[name="kelas_tertinggi"]').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pendidikan",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
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
                        $('#ketenagakerjaan').show();
                        $('#pendidikan').hide();
                        // $('#AddPendudukModal').modal('hide');
                    }
                }
            });
        }

        function ketenagakerjaan() {
            var data = {
                'penduduk_id' : $('input[name="penduduk_id"]').val(),
                'sts_bekerja' : $('select[name="sts_bekerja"]').val(),
                'jam_kerja' : $('input[name="jam_kerja"]').val(),
                'lapangan_kerja' : $('input[name="lapangan_kerja"]').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/ketenagakerjaan",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
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
                        $('#ketenagakerjaan').hide();
                        $('#usaha').show();
                        // $('#AddPendudukModal').modal('hide');
                    }
                }
            });
        }

        function usaha() {
            var data = {
                'penduduk_id' : $('input[name="penduduk_id"]').val(),
                'kepemilikan_usaha' : $('select[name="kepemilikan_usaha"]').val(),
                'jumlah_usaha' : $('input[name="jumlah_usaha"]').val(),
                'jumlah_pekerja' : $('input[name="jumlah_pekerja"]').val(),
                'jumlah_pekerja_gabayar' : $('input[name="jumlah_pekerja_gabayar"]').val(),
                'omset_usaha' : $('input[name="omset_usaha"]').val(),
                'internet_usaha' : $('select[name="internet_usaha"]').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/usaha",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
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
                        $('#kesehatan').show();
                        $('#usaha').hide();
                        // $('#AddPendudukModal').modal('hide');
                    }
                }
            });
        }

        function ketenagakerjaan() {
            var data = {
                'penduduk_id' : $('input[name="penduduk_id"]').val(),
                'giji_anak' : $('select[name="giji_anak"]').val(),
                'gangguan_mata' : $('select[name="gangguan_mata"]').val(),
                'gangguan_pendengaran' : $('select[name="gangguan_pendengaran"]').val(),
                'gangguan_jari' : $('select[name="gangguan_jari"]').val(),
                'kemampuan_intelektual' : $('select[name="kemampuan_intelektual"]').val(),
                'gangguan_perilaku' : $('select[name="gangguan_perilaku"]').val(),
                'gangguan_komunikasi' : $('select[name="gangguan_komunikasi"]').val(),
                'gangguan_mengurus_diri' : $('select[name="gangguan_mengurus_diri"]').val(),
                'gangguan_konsentrasi' : $('select[name="gangguan_konsentrasi"]').val(),
                'gangguan_depresi' : $('select[name="gangguan_depresi"]').val(),
                'kesehatan_kronis' : $('select[name="kesehatan_kronis"]').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/kesehatan",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
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
                        $('#program').show();
                        $('#kesehatan').hide();
                        // $('#AddPendudukModal').modal('hide');
                    }
                }
            });
        }

        function programsosial() {
            var data = {
                'penduduk_id' : $('input[name="penduduk_id"]').val(),
                'jaminan_kesehatan' : $('select[name="jaminan_kesehatan"]').val(),
                'pra_kerja' : $('select[name="pra_kerja"]').val(),
                'kur' : $('select[name="kur"]').val(),
                'ultra_mikro' : $('select[name="ultra_mikro"]').val(),
                'pip' : $('select[name="pip"]').val(),
                'jaminan_ketenagakerjaan' : $('select[name="jaminan_ketenagakerjaan"]').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/perlindungan_sosial",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
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
                        $('#perlindungan_sosial').hide();
                        $('#program').show();
                        // $('#AddPendudukModal').modal('hide');
                    }
                }
            });
        }

        function programsosial() {
            var data = {
                'keluarga_id' : $('input[name="keluarga_id"]').val(),
                'bpnt' : $('input[name="bpnt"]').val(),
                'tanggal_bpnt' : $('input[name="tanggal_bpnt"]').val(),
                'pkh' : $('input[name="pkh"]').val(),
                'tanggal_pkh' : $('input[name="tanggal_pkh"]').val(),
                'blt' : $('input[name="blt"]').val(),
                'tanggal_blt' : $('input[name="tanggal_blt"]').val(),
                'subsidi_listrik' : $('input[name="subsidi_listrik"]').val(),
                'tanggal_subsidi_listrik' : $('input[name="tanggal_subsidi_listrik"]').val(),
                'subsidi_pupuk' : $('input[name="subsidi_pupuk"]').val(),
                'tanggal_bantuan_pemerintahan_daerah' : $('input[name="tanggal_bantuan_pemerintahan_daerah"]').val(),
                'subsidi_pupuk' : $('input[name="subsidi_pupuk"]').val(),
                'tanggal_subsidi_lpg' : $('input[name="tanggal_subsidi_lpg"]').val(),
                'subsidi_lpg' : $('input[name="subsidi_lpg"]').val(),
                'tanggal_subsidi_lpg' : $('input[name="tanggal_subsidi_lpg"]').val(),
                'tabung_gas' : $('input[name="tabung_gas"]').val(),
                'kulkas' : $('input[name="kulkas"]').val(),
                'ac' : $('input[name="ac"]').val(),
                'water_heater' : $('input[name="water_heater"]').val(),
                'telepon_rumah' : $('input[name="telepon_rumah"]').val(),
                'tv' : $('input[name="tv"]').val(),
                'perhiasan' : $('input[name="perhiasan"]').val(),
                'komputer_laptop_tablet' : $('input[name="komputer_laptop_tablet"]').val(),
                'motor' : $('input[name="motor"]').val(),
                'sepeda' : $('input[name="sepeda"]').val(),
                'mobil' : $('input[name="mobil"]').val(),
                'hp' : $('input[name="hp"]').val(),
                'lahan_lain' : $('input[name="lahan_lain"]').val(),
                'bangunan_lain' : $('input[name="bangunan_lain"]').val(),
                'sapi' : $('input[name="sapi"]').val(),
                'kerbau' : $('input[name="kerbau"]').val(),
                'kuda' : $('input[name="kuda"]').val(),
                'kambing' : $('input[name="kambing"]').val(),
                'akses_internet' : $('input[name="akses_internet"]').val(),
                'rekening_dompetdigital' : $('input[name="rekening_dompetdigital"]').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/program",
                data: data,
                dataType: "json",
                success: function(response) {
                    // console.log(response);
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
                    }
                }
            });
        }

        function no_kk(){
            var y = document.getElementById("no_kk").value;
            document.getElementById("keluarga_id").value = y;
        }

</script>

@endsection


