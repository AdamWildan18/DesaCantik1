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
                        {{-- <form action="/keluarga/update/{{ $id }}" method="POST"> --}}
                            {{-- @method('update') --}}
                        @csrf
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
                                                <input type="text" name="nama_kepala_keluarga" value="{{ $data->nama_kepala_keluarga }}" class="nama_kepala_keluarga form-control form-control-sm">
                                                @error('nama_kepala_keluarga')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>2. Nomor Kartu Keluarga</div>
                                        </td>
                                        <td>
                                            <div>
                                                <input type="number" id="kk" name="id" value="{{ $data->id }}" class="id form-control form-control-sm">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="d-flex justify-content-end">
                                            <button class="btn btn-primary" id="btn_keluarga" onclick="update({{ $data->id }})">Save</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        {{-- </form> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- @include('pages.penduduk.create') --}}
@endsection

@section('scripts')
<script>
    function update(id) {
            var data = {
                'id': $('.id').val(),
                'nama_kepala_keluarga': $('.nama_kepala_keluarga').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "/keluarga/update/" + id,
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
                        $('#succes_message').addClass('alert alert-success')
                        $('#succes_message').text(response.message)
                        window.location.href = "{{ route('keluarga')}}";
                    }
                }
            });
        }
</script>
@endsection
