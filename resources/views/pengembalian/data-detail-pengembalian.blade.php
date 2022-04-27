@extends('layout/main_layout')

@section('title', 'Detail Pengembalian')

@section('css_custom')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Pengembalian</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ url('halaman-admin') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ url('pengembalian') }}">Data Pengembalian</a></div>
        <div class="breadcrumb-item active">Detail Pengembalian</div>
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
            <div class="card">
                <div class="card-body">
            <div class="table-responsive">
                <div class="section-title mt-0">Detail Pengembalian</div>
                <table id="id" class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No. ISBN</th>
                            <th class="text-center" scope="col">Buku</th>
                            <th class="text-center" scope="col">Status Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail as $data)
                        <tr class="text-center">
                            <td>{{ $data->buku->no_isbn }}</td>
                            <td>{{ $data->buku->judul_buku }}</td>
                            <td>
                                @if($data->status_kembali == 0)
                                    <span class="badge badge-warning">Belum Kembali</span>
                                @else
                                    <span class="badge badge-warning">Sudah Kembali</span>
                                @endif
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
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
} );

</script>
@endsection