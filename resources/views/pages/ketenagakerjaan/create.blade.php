<form action="/ketenagakerjaan" method="post">
    {{ csrf_field() }}
    <div id="saveform_errList"></div>

    <div class="modal-body" id="penduduk">
        <ul id="saveform_errList"></ul>
        <div class="row">
            <div class="d-flex justify-content-center border-bottom mb-3">
                <h1 class="fs-5">Data Ketenagakerjaan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm" id="keluargaid">
                <div class="form-group mb-3">
                    <label for="">NIK</label>
                    <input class="form-control penduduk_id" list="datalistOptions" id="penduduk_id" name="penduduk_id"
                        value="{{ old('penduduk_id') }}" autocomplete="off">
                    <datalist id="datalistOptions">
                        @foreach ($penduduk as $item)
                            <option value="{{ $item->nik }}"></option>
                        @endforeach
                    </datalist>
                    @error('penduduk_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">Tempat Bekerja</label>
                    <input type="text" name="jenis_pekerjaan" class="jenis_pekerjaan form-control">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">Jam Kerja</label>
                    <input type="text" name="jam_kerja" id="jamkerja" class="jam_kerja form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">Status Pekerjaan</label>
                    <input type="text" name="status_pekerjaan" class="status_pekerjaan form-control">
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">Omset Pekerjaan</label>
                    <input type="text" name="omset_pekerjaan" id="omsetPekerjaan"
                        class="omset_pekerjaan form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">Jumlah Usaha</label>
                    <input type="text" name="jumlah_usaha" class="jumlah_usaha form-control">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">Jenis Usaha Utama</label>
                    <input type="text" name="jenis_usaha" class="jenis_usaha form-control">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">Jumlah Pekerja</label>
                    <input type="text" name="jumlah_pekerja" class="jumlah_pekerja form-control">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">Omset Usaha</label>
                    <input type="text" name="omset_usaha" id="omsetUsaha" class="omset_usaha form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="btn btn-success" id="add">+</div>

    <div class="modal-footer">
        <button type="submit" value="Submit" class="btn btn-primary add_penduduk">Save changes</button>
        <button type="button" class="btn btn-secondary btn_close" data-bs-dismiss="modal">Close</button>
    </div>
</form>

<script type="text/javascript">
    var rupiahp = document.getElementById('omsetPekerjaan');
    rupiahp.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatrupiahp() untuk mengubah angka yang di ketik menjadi format angka
        rupiahp.value = omsetpekerjaan(this.value, 'Rp. ');
    });
    var rupiahu = document.getElementById('omsetUsaha');
    rupiahu.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatrupiahu() untuk mengubah angka yang di ketik menjadi format angka
        rupiahu.value = omsetUsaha(this.value, 'Rp. ');
    });

    /* Fungsi omsetUsaha */
    function omsetpekerjaan(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiahp = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiahp += separator + ribuan.join('.');
        }

        rupiahp = split[1] != undefined ? rupiahp + ',' + split[1] : rupiahp;
        return prefix == undefined ? rupiahp : (rupiahp ? 'Rp. ' + rupiahp : '');
    }

    function omsetUsaha(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiahu = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiahu += separator + ribuan.join('.');
        }

        rupiahu = split[1] != undefined ? rupiahu + ',' + split[1] : rupiahu;
        return prefix == undefined ? rupiahu : (rupiahu ? 'Rp. ' + rupiahu : '');
    }
</script>

<script>
    function input_no_kk() {
        var y = document.getElementById("no_kk").value;
        document.getElementById("keluarga_id").value = y;
    }

    $('#add').click(function() {
        var x = document.getElementById("keluarga_id").value;
        $('#penduduk').append(
            `<input type="text" id="demo" value="` + x +
            `" name="keluarga_id" style="display: none">
                <div class="row">
            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">NIK</label>
                    <input type="text" name="nik[]" class="nik form-control">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group mb-3">
                    <label for="">Nama</label>
                    <input type="text" name="nama[]" class="nama form-control">
                </div>
            </div>
        </div>
            
    <div class="row">
        <div class="col-sm">
            <div class="form-group mb-3">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir[]" class="tempat_lahir form-control">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group mb-3">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir[]" class="tanggal_lahir form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <label for="">Jenis Kelamin</label>
            <div class="form-group mb-3">
                <div class="col">
                    <input type="radio" name="jenis_kelamin[]" id="jenis_kelamin" class="jenis_kelamin"
                        value="Laki-Laki">
                    <label for="jenis_kelamin">Laki-Laki</label>
                </div>
                <div class="col">
                    <input type="radio" name="jenis_kelamin[]" id="jenis_kelamin" class="jenis_kelamin"
                        value="Perempuan">
                    <label for="jenis_kelamin">Perempuan</label>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="form-group mb-3">
                <label for="">pendidikan</label>
                <input type="text" name="pendidikan[]" class="pendidikan form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="form-group mb-3">
                <label for="">pekerjaan</label>
                <input type="text" name="pekerjaan[]" class="pekerjaan form-control">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group mb-3">
                <label for="">agama</label>
                <input type="text" name="agama[]" class="agama form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="form-group mb-3">
                <label for="">Hubungan Keluarga</label>
                <input type="text" name="hub_keluarga[]" class="hub_keluarga form-control">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group mb-3">
                <label for="">Status Pernikahan</label>
                <select name="pernikahan[]" id="pernikahan" class="pernikahan form-control">
                    <option value="">- Pilih Status Pernikahan -</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>
        </div>
    </div>`
        )
    });
</script>
