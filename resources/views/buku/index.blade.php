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
    <h1>Tambah Peminjaman</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item active">Data Peminjaman</div>
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="card">
        <div class="card-header">
          <h4>Referral URL</h4>
        </div>
        <div class="card-body">
          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">2,100</div>
            <div class="font-weight-bold mb-1">Google</div>
            <div class="progress" data-height="3" style="height: 3px;">
              <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
            </div>                          
          </div>

          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">1,880</div>
            <div class="font-weight-bold mb-1">Facebook</div>
            <div class="progress" data-height="3" style="height: 3px;">
              <div class="progress-bar" role="progressbar" data-width="67%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 67%;"></div>
            </div>
          </div>

          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">1,521</div>
            <div class="font-weight-bold mb-1">Bing</div>
            <div class="progress" data-height="3" style="height: 3px;">
              <div class="progress-bar" role="progressbar" data-width="58%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 58%;"></div>
            </div>
          </div>

          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">884</div>
            <div class="font-weight-bold mb-1">Yahoo</div>
            <div class="progress" data-height="3" style="height: 3px;">
              <div class="progress-bar" role="progressbar" data-width="36%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 36%;"></div>
            </div>
          </div>

          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">473</div>
            <div class="font-weight-bold mb-1">Kodinger</div>
            <div class="progress" data-height="3" style="height: 3px;">
              <div class="progress-bar" role="progressbar" data-width="28%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 28%;"></div>
            </div>
          </div>

          <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">418</div>
            <div class="font-weight-bold mb-1">Multinity</div>
            <div class="progress" data-height="3" style="height: 3px;">
              <div class="progress-bar" role="progressbar" data-width="20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
            <h4>Card Create by @bayuhnm</h4>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-item pb-3">
                    <div class="product-image">
                        <div class="container" style="background-color:rgb(196, 225, 252); height: 80px;">
                            <i class="bi bi-apple fa-3x" style="color:cornflowerblue; line-height: 2"></i>
                        </div>
                    </div>
                    <div class="product-details">
                        <div class="product-name">iPhone 13 Promax</div>
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
        </div>
  </div>
@endsection
