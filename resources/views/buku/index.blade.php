@extends('layout/main_layout')

@section('title', 'Peminjaman')

@section('css_custom')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('asset/node_modules/select2/dist/css/select2.min.css') }}"> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Data Buku</h1>
    <div class="section-header-breadcrumb">
        {{-- <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item active">Data Buku</div> --}}
        <a href="/addBuku" class="btn btn-primary">Tambah Buku</a>
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="card">
        {{-- <div class="card-header">
            <h4>Card Create by @bayuhnm</h4>
        </div> --}}
        <div class="row row-cols-1 row-cols-md-3 g-4 px-4">
            @foreach($data as $a)
            <div class="col-sm-3 mb-3">
              <div class="card h-100">
                <div class="product-item pb-3">
                    <div class="product-image mt-4">
                        <div class="container" style="background-color:rgb(196, 225, 252); height: 80px;">
                            <i class="bi bi-book fa-3x" style="color:cornflowerblue; line-height: 2"></i>
                        </div>
                    </div>
                    <div class="product-details">
                        <div class="product-name px-3">{{$a->judul_buku}}</div>
                        <p class="card-text">No. ISBN : {{$a->no_isbn}}</p>
                        <div class="product-cta">
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$a->id}}">Detail</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$a->judul_buku}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>No. ISBN : </strong>
                        <br>
                        <p>{{$a->no_isbn}}</p>
                        <strong>Kategori : </strong>
                        <br>
                        <p>{{$a->kategori}}</p>
                        <strong>Pengarang : </strong>
                        <br>
                        <p>{{$a->pengarang}}</p>
                        <strong>Penerbit : </strong>
                        <br>
                        <p>{{$a->penerbit}}</p>
                        <strong>Tahun Terbit : </strong>
                        <br>
                        <p>{{$a->tahun_terbit}}</p>
    
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('buku.edit', ['id' => $a->id])}}" class="btn btn-warning">Edit Buku</a>
                        <a href="{{route('buku.delete', ['id' => $a->id])}}" onclick="return confirm('Yakin ingin menghapus buku?')" class="btn btn-danger">Hapus Buku</a href="">
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
  </div>

  </div>
@endsection
