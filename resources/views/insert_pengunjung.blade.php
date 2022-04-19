@extends('layout/main_layout')

@section('title', 'Data Anggots')

@section('css_custom')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Masukkan Data Pengunjung</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ url('halaman-admin') }}">Dashboard</a></div>
        
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
            <div class="card">
                <div class="card-body">
            <div class="table-responsive">
                <div class="section-title mt-0">Data Anggota</div>
                <table id="id" class="table table-striped responsive">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">ID Anggota</th>
                            <th class="text-center" scope="col">Nama Anggota</th>
                            <th class="text-center" scope="col">Alamat Anggota</th>
                            <th class="text-center" scope="col">Status Anggota</th>
                            <th class="text-center" scope="col">Jenis Anggota</th>
                            <th class="text-center" scope="col">Aksi</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $a)
                        <tr class="text-center">
                            <td> {{$loop->iteration}}</td>
                            <td>{{ $a->id_anggota }}</td>
                            <td>{{ $a->nama_anggota }}</td>
                            <td>{{ $a->alamat_anggota}}</td>
                            <td>@if($a->status_anggota == 0) Tidak Aktif @else Aktif @endif</td>
                            <td>@if($a->jenis_anggota == 0) Guru @else Siswa @endif</td>
                            
                            <td>
                                <a href="{{route('insert_pengunjung.store', ['id' => $a->id_anggota])}}" class="btn btn-icon btn-warning">Input</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready( function () {
    $('#id').DataTable();
} );

</script>
@endsection