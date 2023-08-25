@extends('pages.form.form')
@section('form')
<!-- table-responsive -->
<ul id="saveform_errList"></ul>
<div id="succes_message"></div>
<div id="keluarga"style="display: ">
    <table class="table table-sm">
        <thead class="thead" >
            <tr>
                <th>Nomor Kartu Keluarga</th>
                <th>Nama Kepala Keluarga</th>
                <th>Keterangan Rumah</th>
                <th>Keterangan Demografi</th>
                <th>Pendidikan</th>
                <th>Ketenaga Kerjaan</th>
                <th>Usaha</th>
                <th>Kesehatan</th>
                <th>Program Perlindungan Sosial</th>
                <th>Program dan Layanan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->nama_kepala_keluarga}}</td>
                <td>
                    @if ($data->rumahs->keluarga_id ?? '' == $id)
                        <button class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></button>
                        
                    @elseif($data->rumahs->keluarga_id ?? '' == null)
                        <a href="/rumah/create/{{ $data->id }}">
                            <button class="btn btn-sm btn-danger" ><i class="bi bi-pencil-square"></i></button>
                        </a>
                    @endif
                    {{-- @if ($data->rumahs->keluarga_id ?? ''== $id)
                        <button class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></button>
                        
                    @else
                        <a href="/rumah/create/{{ $data->id }}">
                            <button class="btn btn-sm btn-danger" ><i class="bi bi-pencil-square"></i></button>
                        </a>
                    @endif --}}
                </td>
                <td>
                    @if ($data->penduduks->isEmpty())
                        <a href="/penduduk/create/{{ $data->id }}">
                            <button class="btn btn-sm btn-danger" ><i class="bi bi-pencil-square"></i></button>
                        </a>
                    @else
                    @foreach ($data->penduduks as $item)
                    @once
                        <button class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></button>  
                    @endonce
                    @endforeach
                    @endif
                    
                </td>
                <td>
                    @if ($data->pendidikans->isEmpty())
                        <a href="/pendidikan/create/{{ $data->id }}">
                            <button class="btn btn-sm btn-danger" ><i class="bi bi-pencil-square"></i></button>
                        </a>
                    @else
                    @foreach ($data->pendidikans as $item)
                    @once
                        <button class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></button>  
                    @endonce
                    @endforeach
                    @endif
                    
                </td>
                <td>
                    @if ($data->pekerjaans->isEmpty())
                        <a href="/pekerjaan/create/{{ $data->id }}">
                            <button class="btn btn-sm btn-danger" ><i class="bi bi-pencil-square"></i></button>
                        </a>
                    @else
                        @foreach ($data->pekerjaans as $item)
                            @once
                                <button class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></button>
                            @endonce
                        @endforeach
                    @endif
                </td>
                <td>
                    @if ($data->usahas->isEmpty())
                        <a href="/usaha/create/{{ $data->id }}">
                            <button class="btn btn-sm btn-danger" ><i class="bi bi-pencil-square"></i></button>
                        </a>
                    @else
                        @foreach ($data->usahas as $item)
                            @once
                                <button class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></button>
                            @endonce
                        @endforeach
                    @endif
                </td>
                <td>
                    @if ($data->kesehatans->isEmpty())
                        <a href="/kesehatan/create/{{ $data->id }}">
                            <button class="btn btn-sm btn-danger" ><i class="bi bi-pencil-square"></i></button>
                        </a>
                    @else
                        @foreach ($data->kesehatans as $item)
                            @once
                                <button class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></button>  
                            @endonce
                        @endforeach
                    @endif
                    
                </td>
                <td>
                    @if ($data->sosials->isEmpty())
                        <a href="/sosial/create/{{ $data->id }}">
                            <button class="btn btn-sm btn-danger" ><i class="bi bi-pencil-square"></i></button>
                        </a>
                    @else
                        @foreach ($data->sosials as $item)
                            @once
                                <button class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></button>  
                            @endonce
                        @endforeach
                    @endif
                </td>
                <td>
                    @if ($data->programs->keluarga_id ?? '' == $id)
                        <button class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></button>
                    @elseif($data->programs->keluarga_id ?? '' == null)
                        <a href="/program/create/{{ $data->id }}">
                            <button class="btn btn-sm btn-danger" ><i class="bi bi-pencil-square"></i></button>
                        </a>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a href="/keluarga" class="btn btn-primary btn-sm">Selesai</a>
                </td>
            </tr>
        </tbody>
    </table>

</div>





@endsection
{{-- @section('scripts')
    <script>
        function rumah(id){
            $.get("{{ url('rumah/create') }}/" + id);
        }
    </script>
@endsection --}}
