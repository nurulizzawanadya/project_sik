@extends('layout/main_layout')

@section('title', 'Dashboard')

@section('css_custom')
@endsection

@section('content')
<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Menu</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <a href="{{ url('/peminjaman') }}">
                                <i class="far fa-user"></i>
                            </a>
                        </div>
                        <div class="card-wrap">
                            <br><br>
                            <h6>PEMINJAMAN</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <a href="{{ url('/pengembalian') }}">
                                <i class="fas fa-undo-alt"></i>
                            </a>
                        </div>
                        <div class="card-wrap">
                            <br><br>
                            <h6>PENGEMBALIAN</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <a href="{{ url('/buku') }}">
                                <i class="fas fa-file"></i>
                            </a>
                        </div>
                        <div class="card-wrap">
                            <br><br>
                            <h6>BUKU</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <a href="{{ url('/data-pengunjung') }}">
                                <i class="fas fa-circle"></i>
                            </a>
                        </div>
                        <div class="card-wrap">
                            <br><br>
                            <h6>DATA PENGUNJUNG</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection