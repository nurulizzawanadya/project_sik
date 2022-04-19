@extends('layout/main_layout')

@section('title', 'Data Anggots')

@section('css_custom')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Data Pengunjung</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ url('halaman-admin') }}">Dashboard</a></div>
        
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
            <div class="card">
                <div class="card-header">
                    {{-- <h3>Data Pengunjung Perpustaakaan SD UPT 8</h3> --}}
                <div class="ml-auto w-0">
                    <div class="dropdown d-inline">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export Rekap
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                          
                            <a href='{{route('exportAll')}}' class="dropdown-item has-icon"
                                ><i class="fas fa-user-cog"></i> Semua Data</a>
                        
                            <a href='/admin/change-role-user/2' class="dropdown-item has-icon" data-toggle="modal" data-target="#tgl"
                                ><i class="fas fa-user-shield"></i> Tanggal Tertentu</a>
                        
                
                        </div>
                    </div>
                </div>
                </div>
                <div class="card-body">
            <div class="table-responsive">
                
                <table id="id" class="table table-striped responsive">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th scope="col">ID Anggota</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Tanggal Berkunjung</th>

                            <th scope="col">Aksi</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $a)
                        <tr class="text-center">
                            <td> {{$loop->iteration}}</td>
                            <td>{{ $a->anggota_id }}</td>
                            <td>{{ $a->anggota->nama_anggota }}</td>
                            <td>{{date('d M Y', strtotime($a->created_at) )}}
                            {{-- <td>{{ $a->alamat_anggota}}</td>
                            <td>@if($a->status_anggota == 0) Tidak Aktif @else Aktif @endif</td>
                            <td>@if($a->jenis_anggota == 0) Guru @else Siswa @endif</td>
                             --}}
                            <td>
                                <a href="{{route('insert_pengunjung.store', ['id' => $a->anggota_id])}}" class="btn btn-icon btn-warning">Input</a>
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