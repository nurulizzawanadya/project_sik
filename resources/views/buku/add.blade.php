@extends('layout/main_layout')

@section('title', 'Buku')

@section('css_custom')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('asset/node_modules/select2/dist/css/select2.min.css') }}"> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Tambah Buku</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item active">Data Buku</div>
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
    <!-- <h2 class="section-title">Data Buku</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('insertBuku') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <input id="id_Buku" type="hidden" class="form-control " name="id_Buku"> 
                            <div class="form-group">
                                <label>No. ISBN</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="no_isbn" placeholder="No. ISBN">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="kategori" placeholder="Kategori">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pengarang</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="pengarang" placeholder="Pengarang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="penerbit" placeholder="Penerbit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit">
                                </div>
                            </div>
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