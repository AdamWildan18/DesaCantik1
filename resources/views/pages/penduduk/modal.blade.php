

{{-- end modal add  --}}

{{-- edit Modal  --}}
<div class="modal fade" id="EditDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="saveform_errList"></ul>

                <div class="form-group mb-3">
                    <label for="">NIK</label>
                    <input type="text" class="nik form-control" value="{{ old('nik') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="id_no_kk" class="form-label">No kk</label>
                    <input class="form-control id_no_kk" list="datalistOptions" id="id_no_kk" name="id_no_kk"
                        value="{{ old('id_no_kk') }}" autocomplete="off">
                    <datalist id="datalistOptions">
                        @foreach ($kk as $item)
                            <option value="{{ $item->no_kk }}"></option>
                        @endforeach
                    </datalist>
                    @error('id_no_kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Nama</label>
                    <input type="text" class="nama form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">tempat_lahir</label>
                    <input type="text" class="tempat_lahir form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">tanggal_lahir</label>
                    <input type="date" class="tanggal_lahir form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">jenis_kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="jenis_kelamin form-control">
                        <option value="">-Pilih Jenis Kelamin -</option>
                        <option value="Laki-laki">Laki_laki -</option>
                        <option value="Perempuan">Perempuan -</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">agama</label>
                    <input type="text" class="agama form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">pendidikan</label>
                    <input type="text" class="pendidikan form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">pekerjaan</label>
                    <input type="text" class="pekerjaan form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Status Pernikahan</label>
                    <select name="pernikahan" id="pernikahan" class="pernikahan form-control">
                        <option value="">- Pilih Status Pernikahan -</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="kewarganegaraan">kewarganegaraan</label>
                    <input type="text" class="kewarganegaraan form-control" value="{{ old('kewarganegaraan') }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn_close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit_penduduk">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{-- end edit Modal  --}}

{{-- aksi dasar --}}
<div class="modal fade" id="AksiDasarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="saveform_errList"></ul>

                <div class="form-group mb-3">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik"
                        class="form-control form-control-sm @error('nik') is-invalid @enderror"
                        value="{{ old('nik') }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control status">
                        <option value="">- Status -</option>
                        <option value="Meninggal">Meninggal</option>
                        <option value="Pindah">Pindah</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="tanggal form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="keterangan form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn_close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary aksi_penduduk">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{-- end aksi dasar Modal  --}}
