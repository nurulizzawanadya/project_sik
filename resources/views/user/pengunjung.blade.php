@extends('user/dashboard-user')

{{-- @section('title', 'Input Data Pengunjung') --}}

@section('css_custom')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endsection

@section('content')
<div class="section-body">
            <div class="card">
                <div class="card-body">
            <div class="table-responsive">
                <div class="section-title mt-0">Data Siswa</div>
                <table id="id" class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">NISN</th>
                            <th class="text-center" scope="col">Nama</th>
                            <th class="text-center" scope="col">Jenis Kelamin</th>
                            <th class="text-center" scope="col">Kelas</th>
                            <th class="text-center" scope="col">Detail</th>
                            <th class="text-center" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $a)
                        <tr class="text-center">
                            <td> {{$loop->iteration}}</td>
                            <td>{{ $a->id_pengembalian }}</td>
                            <td>{{ $a->id_peminjaman }}</td>
                            <td>{{ $a->user->name}}</td>
                            <td>{{ $a->anggota->nama_anggota}}</td>
                            <td>{{ date('d M Y', strtotime($a->tgl_kembali)) }}</td>
                            <td>Rp {{ $a->denda }} ,-</td>
                            <td>
                                <a href="/detail-pengembalian/{{ $a->id_pengembalian }}" class="btn btn-icon btn-success">Detail Pengembalian</a>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready( function () {
    $('#id').DataTable();
    // $(document).ready(function() {
    //     $('.js-example-basic-single').select2();
    // });
} );

</script>
@endsection