<table class="table d-inline " id="">
    <thead>
        <tr>
            <th><i class="bi bi-gear-wide"> Aksi</i></th>
            <th>No</th>
            <th>Nik</th>
            <th>Nama Lengkap</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis kelamin</th>
            <th>Agama</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Status Pernikahan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-secondary dropdown-toggle badge" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span><i class="bi bi-gear"></i></a></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <button type="button" class="badge bg-warning dropdown-item edit_penduduk"
                                    onclick="edit({{ $item->nik }})">
                                    <i class="bi bi-tools"> Edit Data</i>
                                </button>
                            </li>
                            <li>
                                <form action="/penduduk/{{ $item->nik }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger dropdown-item"
                                        onclick="return confirm('Anda Yakin?')"><span><i class="bi bi-trash2"></i>
                                            Hapus Data</span>
                                    </button>
                                </form>
                            </li>
                            <li>
                                <button type="button" class="badge bg-primary dropdown-item"
                                    onclick="statusdasar({{ $item->nik }})">
                                    <i class="bi bi-gear"> Aksi Dasar</i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </td>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->agama }}</td>
                <td>{{ $item->pendidikan }}</td>
                <td>{{ $item->pekerjaan }}</td>
                <td>{{ $item->pernikahan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $data->links() }}
