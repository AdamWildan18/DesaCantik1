<script>
    $(document).ready(function() {
        $(document).on('click', '.addModal'function(e) {
            e.preventDefault();
            var data = {
                'nik': $('.nik').val(),
                'id_no_kk': $('.id_no_kk').val(),
                'nama': $('.nama').val(),
                'tempat_lahir': $('.tempat_lahir').val(),
                'tanggal_lahir': $('.tanggal_lahir').val(),
                'jenis_kelamain': $('.jenis_kelamain').val(),
                'agama': $('.agama').val(),
                'pendidikan': $('.pendidikan').val(),
                'pekerjaan': $('.pekerjaan').val(),
                'pernikahan': $('.pernikahan').val(),
                // 'status': $('.status').val(),
                'kewarganegaraan': $('.kewarganegaraan').val(),
            }
            console.log(data);
        });
    });
</script>
