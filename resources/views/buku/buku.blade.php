@extends('layout/main_layout')

@section('title', 'Data Buku')

@section('css_custom')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Data Buku</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ url('halaman-admin') }}">Dashboard</a></div>
        <div class="breadcrumb-item active">Data Buku</div>
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
    <!-- <h2 class="section-title">Data Peminjaman</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
                <div class="card-body">
            <div class="table-responsive">
                <div class="section-title mt-0">Data Buku</div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger-dismissible show fade">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('berhasil'))
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                <strong>Success,</strong>
                                {{ Session::get('berhasil') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="button">
                    <a href="/addBuku" class="btn btn-primary">Tambah Buku</a>
                </div>
                <br>
                <table id="id" class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">No. ISBN</th>
                            <th class="text-center" scope="col">Judul Buku</th>
                            <th class="text-center" scope="col">Kategori</th>
                            <th class="text-center" scope="col">Pengarang</th>
                            <th class="text-center" scope="col">Penerbit</th>
                            <th class="text-center" scope="col">Tahun Terbit</th>
                            <th class="text-center" scope="col">Jumlah Buku</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $a)
                        <tr class="text-center">
                           <td> {{ $loop->iteration}}</td>
                            <td>{{$a->no_isbn}}</td>
                            <td>{{$a->judul_buku}}</td>
                            <td>{{$a->kategori}}</</td>
                            <td>{{$a->pengarang}}</td>
                            <td>
                                {{$a->penerbit}}
                            </td>
                            <td>
                                {{$a->tahun_terbit}}
                            </td>
                            <td>
                                {{$a->quantity}}
                            </td>
                            <td>
                                <a href="{{route('buku.edit', ['id' => $a->id])}}" class="btn btn-warning">Edit Buku</a>
                                <a href="{{route('buku.delete', ['id' => $a->id])}}" onclick="return confirm('Yakin ingin menghapus buku?')" class="btn btn-danger">Hapus Buku</a href="">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

  <script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
  </script>
@endsection

@section('script')

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>


<script>
$(document).ready( function () {
    $('#id').DataTable();
} );

</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready( function () {
    // $('#id').DataTable();
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
} );

</script>
@endsection