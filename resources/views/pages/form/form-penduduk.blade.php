<div id="sosial_ekonomi" style="display: ">
    <form action="penduduk" method="post">
        {{ csrf_field() }}
            <table class="table" style="width: 100%">
                <thead>
                    <tr>
                        <th colspan="2" class="">IV. Keterangan Sosial Ekonomi</th>
                    </tr>
                    <tr>
                        <th colspan="2">A. Keterangan Demografi</th>
                    </tr>
                </thead>
            </table>
            <table>
                <div style="display: ">
                    <input type="text" name="keluarga_id" id="keluargaid">
                </div>
                <div id="penduduk" class="d-inline"></div>


                <div class="modal-footer">
                    <button class="btn btn-primary add_penduduk" type="submit">Berikutnya</button>
                </div>
            </table>

            <ul id="saveform_errList"></ul>

        {{-- <div class="btn btn-success" id="add">+</div> --}}
    </form>
</div>
