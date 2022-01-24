@extends('layout/main_layout')

@section('title', 'Detail')

@section('css_custom')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Detail Peminjaman</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/data-peminjaman">Data Peminjaman</a></div>
        <div class="breadcrumb-item active">Data Detail Peminjaman</div>
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="section-title mt-0">Data Peminjaman</div>
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
                    <a href="#" class="btn btn-icon icon-left btn-primary" style="margin-left: 25px" data-toggle="modal" data-target="#exampleModal">
                        <i class="far fa-edit"></i>Input Buku
                    </a>
                </div>
                <br>
                <table id="id" class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID Peminjaman</th>
                            <th class="text-center" scope="col">Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailpeminjaman as $data)
                        <tr class="text-center">
                            <td>{{ $data->id_peminjaman }}</td>
                            <td>{{ $data->judul_buku }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="modal fade" tabindex="-3" role="dialog" id="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Input Buku') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('insertDetail') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input id="id_peminjaman" type="hidden" class="form-control " name="id_peminjaman" value="{{ $peminjaman[0]->id_peminjaman }}"> 
                    <div class="form-group">
                        <label>Buku</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="no_isbn">
                                    <option value="">Buku</option>
                                    @foreach($id as $buku)   
                                    <option value="{{ $buku->no_isbn }}">{{ $buku->judul_buku }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('no_isbn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
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

@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready( function () {
    $('#id').DataTable();
    $('#select2').select2();
} );

</script>
@endsection