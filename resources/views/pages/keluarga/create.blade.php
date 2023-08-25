@extends('pages.form.form')
@section('form')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_body">
            <div class="QA_section">
                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
                    id="show">
                    <!-- table-responsive -->
                    <ul id="saveform_errList"></ul>
                    <div id="succes_message"></div>
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
                                        <div>2. Nomor Kartu Keluarga</div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="number" id="kk" name="id" class="form-control form-control-sm">
                                        </div>
                                    </td>
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

                </div>
            </div>
        </div>
    </div>
    {{-- @include('pages.penduduk.create') --}}
@endsection

@section('scripts')
<script>

    

    function keluarga() {
            var data = {
                'id': $('input[name="id"]').val(),
                'nama_kepala_keluarga': $('input[name="nama_kepala_keluarga"]').val(),
            }
            no_kk = document.getElementById('kk').value;
            var url = "{{ route('form', ':id')}}";
            url = url.replace(':id', no_kk);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/keluarga/store",
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
                        location.href = url;
                        // $('#perumahan').show();
                    }
                }
            });
        }
</script>

@endsection
