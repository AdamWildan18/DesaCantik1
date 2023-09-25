@extends('layouts.app')
@section('container')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_body">
            <div class="QA_section">
                <div class="QA_table visible-scroll always-visible ps-container ps-theme-default ps-active-x ps-active-y mb_3"
                    id="show">
                    <!-- table-responsive -->
                    <ul id="saveform_errList"></ul>
                    <div id="succes_message"></div>
                    {{-- <form action="/pekerjaan/store/{{$id}}" method="POST">
                        @csrf --}}
                    <div id="keluarga" style="display: ">
                        <table class="table" id="append">
                            <thead class="thead" >
                                <tr>
                                    <th colspan="2">Hak Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form class="aksesform" action="/akses/store" method="POST">
                                    @csrf
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input type="text" name="name" placeholder="Masukan Nama" class="form-control form-control-sm">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            <input type="email" class="form-control form-control-sm" placeholder="Masukan Email" name="email">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Password
                                        </td>
                                        <td>
                                            <input type="password" name="password" placeholder="Masukan Password" class="form-control form-control-sm">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        @if (auth()->user()->role === 'superadmin')
                                        <td>
                                            <select name="role" id="" class="form-select form-select-sm">
                                                <option value="">Pilih Role</option>
                                                <option value="admin">admin</option>
                                                <option value="agent">agent</option>
                                            </select>
                                        </td>
                                        @elseif (auth()->user()->role === 'admin')
                                        <td>
                                            <input type="text" value="agent" name="role">
                                        </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>address</td>
                                        <td>
                                            <select name="address" id="address" class="form-select form-select-sm">
                                                <option value="">Pilih Address</option>
                                                <option value="Cibabat">Cibabat</option>
                                                <option value="Citerep">Citerep</option>
                                                <option value="Cipageran">Cipageran</option>
                                                <option value="Pasirkaliki">Pasirkaliki</option>
                                                <option value="Padasuka">Padasuka</option>
                                                <option value="Cimahi">Cimahi</option>
                                                <option value="Cigugur Tengah">Cigugur Tengah</option>
                                                <option value="Karang Mekar">Karang Mekar</option>
                                                <option value="Karangmekar">Karangmekar</option>
                                                <option value="Setiamanah">Setiamanah</option>
                                                <option value="Baros">Baros</option>
                                                <option value="Cibeber">Cibeber</option>
                                                <option value="Lewigajah">Lewigajah</option>
                                                <option value="Utama">Utama</option>
                                                <option value="Melong">Melong</option>
                                                <option value="Ciberem">Ciberem</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="hidden" id="id">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-primary btn-sm m-1" >Simpan</button>
                                            </div>
                                        </td>
                                    </tr>

                                </form>
                            </tbody>
                        </table>
                    </div>
                    <table class="table">
                        <thead class="thead" >
                            <tr>
                                <th><i class="bi bi-gear-wide">Aksi</i></th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-secondary dropdown-toggle badge"
                                            href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <span><i class="bi bi-gear"></i></a></span>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="/akses/edit/{{ $item->id }}">
                                                    <button type="button"
                                                    class="badge bg-warning dropdown-item">
                                                    <i class="bi bi-tools"> Edit Data</i>
                                                </button>
                                            </a>
                                            </li>
                                            <li>
                                                <form action="/akses/delete/{{ $item->id }}" class="deleteusaha"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger dropdown-item" type="submit"
                                                        onclick="return confirm('Anda Yakin?')"><span><i
                                                                class="bi bi-trash2"></i>
                                                            Hapus Data</span>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script>
    $(document).on('submit', '.aksesform', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function (response) {
            // Handle the server response
            if (response.success) {
                alert(response.message)
                window.location=document.referrer; // Redirect to a success page if needed
            } else {
                alert('Gagal Data sudah ada atau ada kesalahan input'); // Show error message
            }
        }).fail(function () {
            alert('Terjadi kesalahan saat memproses formulir.'); // Show a generic error message
        });
    });
</script>

@endsection





