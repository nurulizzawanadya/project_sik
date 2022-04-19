@extends('layout/main_layout')

@section('title', 'Detail')

@section('css_custom')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Detail Peminjaman</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ url('halaman-admin') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ url('peminjaman') }}">Data Peminjaman</a></div>
        <div class="breadcrumb-item active">Detail Peminjaman</div>
    </div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <div class="alert alert-primary alert-has-icon alert-lg">
                  <div class="alert-icon">
                    <i class="far fa-user-circle"></i>
                  </div>
                  <div class="alert-body">
                    <div class="alert-title">Nama Peminjam:
                        {{$peminjaman->anggota->nama_anggota}}
                    </div>
                  </div>
                </div>
                <div class="ml-auto w-0">
                    <a href="#" class="btn btn-icon icon-left btn-primary" style="margin-left: 25px" data-toggle="modal" data-target="#exampleModal">
                        <i class="far fa-edit"></i>Input Buku
                    </a>
                </div>
              </div>
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
                <table id="id" class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No. ISBN</th>
                            <th class="text-center" scope="col">Buku</th>
                            {{-- <th class="text-center" scope="col">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $a)
                        <tr class="text-center">
                            <td>{{ $a->buku->no_isbn }}</td>
                            <td>{{ $a->buku->judul_buku }}</td>
                            {{-- <td>
                                <a href="" data-toggle="modal" data-keyboard="false" data-backdrop="false" data-target="#edit_buku{{$data->id_peminjaman}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                            </td> --}}
                        </tr>
                               {{-- Modal Edit Peminjaman --}}
                               <div class="modal fade" id="edit_buku{{$a->id_peminjaman}}" role="dialog" id="exampleModal" aria-hidden="true" data-backdrop="false" tabindex="-1">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">Edit Peminjaman</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                                </div>
                                <form method="POST" action="{{route('update.detail.pinjam')}}" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{$a->id_peminjaman}}">
                                    <div class="modal-body">
                                        @csrf
                                        {{method_field('PUT')}}
                                            <div class="form-group">
                                                <label>Buku</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control js-example-basic-single" name="no_isbn">
                                                    
                                                            @foreach($buku as $a)
                                                                @if($a->id == $a->buku_id) 
                                                                <option selected value="{{ $a->id }}">{{ $a->no_isbn }} - {{ $a->judul_buku }}</option>
                                                                @else  
                                                                <option value="{{ $a->id }}">{{ $a->no_isbn }} - {{ $a->judul_buku }} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('id_buku')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                            </div>

                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update Peminjaman</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                {{-- <a href="/user/profile/edit" class="btn btn-primary">Edit Profil</a> --}}
                                </div>
                            </form>
                                </div>
                                </div>
                            </div>
                            {{-- end modal edit peminjaman --}}
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
                    <input id="id_peminjaman" type="hidden" class="form-control " name="id_peminjaman" value="{{ $peminjaman->id }}"> 
                    <div class="form-group">
                        <label>Buku</label>
                            <div class="col-sm-12">
                                <select class="form-control js-example-basic-single" name="no_isbn">
                                    <option value="">Buku</option>
                                    @foreach($buku as $a)   
                                    <option value="{{ $a->id }}">{{$a->no_isbn}} - {{ $a->judul_buku }}</option>
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
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready( function () {
    $('#id').DataTable();
    $('.js-example-basic-single').select2();
    // $('#select2').select2();
} );

</script>
@endsection