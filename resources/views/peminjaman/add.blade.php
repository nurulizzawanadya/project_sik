@extends('layout/main_layout')

@section('title', 'Peminjaman')

@section('css_custom')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('asset/node_modules/select2/dist/css/select2.min.css') }}"> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Tambah Peminjaman</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item active">Data Peminjaman</div>
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
    <!-- <h2 class="section-title">Data Peminjaman</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('insertPeminjaman') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <input id="id_peminjaman" type="hidden" class="form-control " name="id_peminjaman"> 
                            <div class="form-group">
                                <label>Nama Anggota</label>
                                    <div class="col-sm-12">
                                        <select class="form-control js-example-basic-single" name="id_anggota">
                                    
                                            @foreach($anggota as $anggota)
                                            {{-- @if($anggota->id_anggota == $anggota->id_anggota) 
                                            <option selected value="{{ $anggota->id_anggota }}">{{ $anggota->id_anggota }} - {{ $anggota->nama_anggota }}</option>
                                            @else   --}}
                                            <option value="{{ $anggota->id_anggota }}">{{ $anggota->id_anggota }} - {{ $anggota->nama_anggota }}</option>
                                            {{-- @endif --}}
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_anggota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            @for($i = 1; $i<=3; $i++)
                            <div class="form-group">
                                <label>Judul Buku {{$i}}</label>
                                    <div class="col-sm-12">
                                        <select class="form-control js-example-basic-single" name="id_isbn{{$i}}">
                                            <option value="">No. ISBN - Judul Buku</option>
                                            @foreach($buku as $a)
                                            {{-- <option selected value="{{$a->no_isbn}}">{{$a->no_isbn }} - {{ $a->judul_buku }}</option>    --}}
                                            <option value="{{ $a->id}}">{{$a->no_isbn }} - {{ $a->judul_buku }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_isbn{{$i}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            @endfor 
                            
                            <input id="created_at" type="hidden" class="form-control" name="created_at">
                            {{-- <input id="perpanjangan" type="number" class="form-control" name="perpanjangan"> --}}
                            <div class="form-group">
                                <label>Tanggal Harus Kembali</label>
                                    <div class="col-sm-12">
                                        <input id="tgl_wajib_kembali"  type="date" class="form-control" name="tgl_wajib_kembali" value="{{ old('tgl_wajib_kembali') }}" required autocomplete="tgl_wajib_kembali" autofocus placeholder="Tanggal wajib kembali..">
                                    </div>
                                    @error('tgl_wajib_kembali')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        {{-- </div> --}}
                        <div class="text-left">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
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
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> --}}
{{-- <script src="{{ asset('assets/node_modules/js-example-basic-single/dist/js/select2.full.min.js') }} "></script> --}}

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