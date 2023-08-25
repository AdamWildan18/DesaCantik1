<div class="modal-body">

    <ul id="saveform_errList"></ul>
    <label for="asset_id">Penduduk</label>
    <div class="input-group mb-3">
        {{-- <button class="btn btn-outline-secondary btn-primary btn-sm" type="submit" id="button-addon2"><i
                class="bi bi-search"></i></button> --}}
        <input class="form-control asset_id" list="datalistOptions" id="asset_id" name="asset_id"
            value="{{ old('id') }}" autocomplete="off">
        <datalist id="datalistOptions">
            @foreach ($penduduk as $item)
                <option value="{{ $item->id }}">nik : {{ $item->nik }} a/n : {{ $item->nama }}</option>
            @endforeach
        </datalist>
        @error('nik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    {{-- kepemilikan Bangunan --}}
    <div class="mb-3">
        <label for="asset" class="form-label">Kepemilikan Bangunan</label>
        <select name="asset" id="asset" class="asset form-control">
            <option value=""></option>
            <option value="1">Milik Sendiri</option>
            <option value="2">Kontrak/Sewa</option>
            <option value="2">Bebas Sewa</option>
            <option value="2">dinas</option>
        </select>
        @error('asset')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    {{-- Luas Tanah --}}
    <div class="mb-3">
        <label for="luas_tanah" class="form-label">Luas Tanah</label>
        <input type="text" class="luas_tanah form-control" name="luas_tanah" id="luas_tanah">
        @error('luas_tanah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    {{-- Jenis Lantai --}}
    <div class="mb-3">
        <label for="jenis_lantai" class="form-label">Jenis Lantai</label>
        <select name="jenis_lantai" id="jenis_lantai" class="jenis_lantai form-control">
            <option value=""></option>
            <option value="1">Milik Sendiri</option>
            <option value="2">Kontrak/Sewa</option>
            <option value="2">Bebas Sewa</option>
            <option value="2">dinas</option>
        </select>
        @error('asset')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    {{-- <div class="mb-3">
        <label for="jenis_asset" class="form-label">jenis_asset</label>
        <input type="text" class="jenis_asset form-control @error('jenis_asset') is-invalid @enderror"
            id="jenis_asset" name="jenis_asset" value="{{ old('jenis_asset') }}">
        @error('jenis_asset')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="kondisi_asset" class="form-label">kondisi_asset</label>
        <input type="text" class="kondisi_asset form-control @error('kondisi_asset') is-invalid @enderror"
            id="kondisi_asset" name="kondisi_asset" value="{{ old('kondisi_asset') }}">
        @error('kondisi_asset')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="multi"></div> --}}

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn_close" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_keluarga" onclick="store()">Save changes</button>
    </div>
