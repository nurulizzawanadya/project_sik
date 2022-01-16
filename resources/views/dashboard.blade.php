@extends('layout/main_layout')

@section('title', 'Dashboard')

@section('css_custom')
@endsection

@section('content')
<div class="section-body">
    <!-- <h2 class="section-title">Halaman Admin</h2> -->
    <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
    <div class="card">
        <div class="card-header">
            <h4>Example Card</h4>
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
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Anggota</h4>
                            </div>
                            <!-- <div class="card-body">
                                42
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Buku</h4>
                            </div>
                            <!-- <div class="card-body">
                                1,201
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Laporan Peminjaman</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection