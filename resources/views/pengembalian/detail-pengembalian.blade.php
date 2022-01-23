@extends('layout/main_layout')

@section('title', 'Detail')

@section('css_custom')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Detail Pengembalian</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/data-Pengembalian">Data Pengembalian</a></div>
        <div class="breadcrumb-item active">Data Detail Pengembalian</div>
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="card">
        <div class="card-header">
            <div class="alert alert-info alert-has-icon">
                <div class="alert-icon">
                  <i class="fas fa-fire"></i>
                </div>
                <div class="alert-body">
                  <div class="alert-title">Total Denda : {{$denda}}</div>
                  Anggota <text class="font-weight-bold">{{$data2->anggota->nama_anggota}}</text> Meminjam Buku sebanyak
                  {{$byk_buku}} dan Telah diberikan tenggat waktu Pengembalian {{$data2->tgl_wajib_kembali}}
                  serta @if($data2->perpanjangan == 0) tidak melakukan perpanjangan @else telah melakukan perpanjangan sebanyak {{$data2->perpanjangan}} @endif
                </div>
              </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="section-title mt-0">Data Buku yang dipinjam</div>
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
                    <a href="" class="btn btn-icon icon-left btn-danger" style="margin-left: 900px" 
                    onclick="event.preventDefault();
                    document.getElementById('pengembalian-form').submit();">
                        <i class="fas fa-undo-alt"></i>Dikembalikan
                    </a>
                    <form id="pengembalian-form" action="{{ route('pengembalian', ['id' => $data2->id_peminjaman]) }}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" name="denda" value="{{$denda}}">
                        @if($byk_buku != 0)
                            {{-- @for($i=1; $i<=$byk_buku; $i++) --}}
                            @foreach($data as $a)
                            <input type="hidden" name="id_isbn{{$loop->iteration}}" value="{{$a->no_isbn}}">
                            @endforeach
                        @else
                            <input type="hidden" name="no_isbn" value=0>
                        @endif
                    </form>
                </div>
                <br>
                <table id="id" class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No. ISBN</th>
                            <th class="text-center" scope="col">Judul Buku</th>
                            {{-- <th class="text-center" scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $a)
                        <tr class="text-center">
                            <td>{{ $a->no_isbn}}</td>
                            <td>{{ $a->buku->judul_buku }}</td>
                            {{-- <td>
                                <a href="#" class="btn btn-icon btn-success">Dikembalikan</a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
</script>

@section('script')
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready( function () {
    $('#id').DataTable();
    $('#select2').select2();
} );

</script>
@endsection