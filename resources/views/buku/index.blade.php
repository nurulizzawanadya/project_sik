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
        <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item active">Data Buku</div>
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
                        <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="text-muted text-small">100 Sold</div>
                        <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            @endforeach
            {{-- <div class="col">
                <div class="product-item pb-3">
                    <div class="product-image">
                        <div class="container" style="background-color:rgb(255, 233, 193); height: 80px;">
                            <i class="bi bi-emoji-smile-fill fa-3x" style="color:orange; line-height: 2"></i>
                        </div>
                    </div>
                    <div class="product-details">
                        <div class="product-name">Full Senyum Masze</div>
                        <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="text-muted text-small">100 Sold</div>
                        <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-item pb-3">
                    <div class="product-image">
                        <div class="container" style="background-color:rgb(212, 205, 255); height: 80px;">
                            <i class="bi bi-chat-left-quote-fill fa-3x" style="color:slateblue; line-height: 2"></i>
                        </div>
                    </div>
                    <div class="product-details">
                        <div class="product-name">Mangat Bekk</div>
                        <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="text-muted text-small">100 Sold</div>
                        <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
  </div>

  </div>
@endsection
