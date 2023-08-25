<div class="modal-body">

    <ul id="saveform_errList"></ul>

    <div class="form-group mb-3">
        <label for="">NIK</label>
        <input type="text" class="nik form-control" readonly name="nik" value="{{ $data->nik }}">
    </div>
    <div class="form-group mb-3">
        <label for="">Status</label>
        <select name="status" id="status" class="status form-control">
            <option value="{{ $data->status }}">{{ $data->status }}</option>
            <option value="Pindah">Pindah</option>
            <option value="Meninggal">Meninggal</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="Tanggal">Tanggal</label>
        <input type="date" class="tanggal form-control" name="tanggal" value="{{ $data->tanggal }}">
    </div>
    <div class="form-group mb-3">
        <label for="Keterangan">Keterangan</label>
        <input type="text" class="keterangan form-control" name="keterangan" value="{{ $data->keterangan }}">
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary btn_close" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary add_penduduk" onclick="statustore()">Save changes</button>
</div>
