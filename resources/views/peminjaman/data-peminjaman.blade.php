@extends('layout/main_layout')

@section('title', 'Peminjaman')

@section('css_custom')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('asset/node_modules/select2/dist/css/select2.min.css') }}"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
<div class="section-header section-title-mt-0">
    <h1>Peminjaman</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ url('halaman-admin') }}">Dashboard</a></div>
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
                    <a href="#" class="btn btn-icon icon-left btn-primary" style="margin-left: 45px" data-toggle="modal" data-target="#exampleModal">
                        <i class="far fa-edit"></i>Input Peminjaman
                    </a>
                </div>
                <br>
                <table id="id" class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID Peminjaman</th>
                            <th class="text-center" scope="col">Nama Peminjam</th>
                            <th class="text-center" scope="col">Tanggal Pinjam</th>
                            <th class="text-center" scope="col">Wajib Kembali</th>
                            <th class="text-center" scope="col">Nama Petugas</th>
                            <th class="text-center" scope="col">Perpanjangan</th>
                            <th class="text-center" scope="col">Detail</th>
                            <th class="text-center" scope="col">Pengembalian</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjaman as $data)
                        <tr class="text-center">
                            <td>{{ $data->id_peminjaman }}</td>
                            <td>{{ $data->nama_anggota }}</td>
                            <td>{{date('d M Y', strtotime($data->created_at))}}</td>
                            <td>{{date('d M Y', strtotime($data->tgl_wajib_kembali))}}</td>
                            <td>{{ $data->nama_petugas }}</td>
                            <td class="text-center" scope="col">
                                @if($data->perpanjangan == 0)
                                <div class="dropdown d-inline">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if($data->perpanjangan == 0) Perpanjangan @endif
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                      
                                        <a href="{{route('update.perpanjangan', ['id' => $data->id, 'value' => 1])}}" class="dropdown-item has-icon"
                                            onclick="return confirm('Yakin ingin mengubah perpanjangan?')"><i class="fas fa-user-cog"></i> Ya</a>
                                        <a href="{{route('update.perpanjangan', ['id' => $data->id, 'value' => 0])}}" class="dropdown-item has-icon"
                                            onclick="return confirm('Yakin ingin mengubah mengubah perpanjangan?')"><i class="fas fa-user-cog"></i> Tidak</a>
                                    </div>
                                </div>
                                @else <span class="badge badge-warning">Diperpanjang</span>
                                @endif
                            </td>
                            <td>
                                <a href="/detail-peminjaman/{{ $data->id_peminjaman }}" class="btn btn-icon btn-success">Detail Peminjaman</a>
                            </td>
                            <td>
                                <a href="/cek-pengembalian/{{ $data->id_peminjaman }}" class="btn btn-icon btn-warning">Dikembalikan</a>
                            </td>
                            <td>
                                {{-- <a href="{{route('editpinjam', ['id' => $data->id_peminjaman])}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a> --}}
                                <a href="" data-toggle="modal" data-keyboard="false" data-backdrop="false" data-target="#edit_peminjaman{{$data->id}}" 
                                    onclick="return confirm('Yakin ingin mengedit data?')"class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                <a href='/delete/{{ $data->id }}' class="btn btn-icon btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                        {{-- Modal Edit Peminjaman --}}
                        <div class="modal fade" id="edit_peminjaman{{$data->id}}" role="dialog" id="exampleModal" aria-hidden="true" data-backdrop="false" tabindex="-1">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Edit Peminjaman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                            </div>
                            <form method="POST" action="{{route('update.pinjam', ['id' => $data->id])}}" enctype="multipart/form-data">
                            <div class="modal-body">
                                    @csrf
                                    {{method_field('PUT')}}
                                        <input id="id_peminjaman" type="hidden" class="form-control " name="id_peminjaman"> 
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control js-example-basic-single" name="id_anggota">
                                                
                                                        @foreach($id as $anggota)
                                                            @if($anggota->id_anggota == $data->id_anggota) 
                                                            <option selected value="{{ $anggota->id_anggota }}">{{ $anggota->id_anggota }} - {{ $anggota->nama_anggota }}</option>
                                                            @else  
                                                            <option value="{{ $anggota->id_anggota }}">{{ $anggota->id_anggota }} - {{ $anggota->nama_anggota }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('id_anggota')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                        <input id="created_at" type="hidden" class="form-control" name="created_at">
                                        <input id="perpanjangan" type="hidden" value="{{$data->perpanjangan}}" class="form-control" name="perpanjangan">
                                        <div class="form-group">
                                            <label>Tanggal Harus Kembali</label>
                                                <div class="col-sm-12">
                                                    <input id="tgl_wajib_kembali" value="{{$data->tgl_wajib_kembali}}" type="date" class="form-control" name="tgl_wajib_kembali" value="{{ old('tgl_wajib_kembali') }}" required autocomplete="tgl_wajib_kembali" autofocus placeholder="Tanggal wajib kembali..">
                                                </div>
                                                @error('tgl_wajib_kembali')
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

<div class="modal fade" role="dialog" id="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Input Peminjaman') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('insertPeminjaman') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input id="id_peminjaman" type="hidden" class="form-control " name="id_peminjaman"> 
                    <div class="form-group">
                        <label>Nama Anggota</label>
                            <div class="col-sm-12">
                                <select class="form-control js-example-basic-single" name="id_anggota">
                                    <option value="">peminjam</option>
                                    @foreach($id as $anggota)   
                                    <option value="{{ $anggota->id_anggota }}">{{ $anggota->id_anggota }} - {{ $anggota->nama_anggota }}</option>
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
                                    <option value="{{ $a->no_isbn }}">{{$a->no_isbn }} - {{ $a->judul_buku }}</option>
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
                    <input id="perpanjangan" type="hidden" class="form-control" name="perpanjangan">
                    <div class="form-group">
                        <label>Tanggal Harus Kembali</label>
                            <div class="col-sm-12">
                                <input id="tgl_wajib_kembali" type="date" class="form-control" name="tgl_wajib_kembali" value="{{ old('tgl_wajib_kembali') }}" required autocomplete="tgl_wajib_kembali" autofocus placeholder="Tanggal wajib kembali..">
                            </div>
                            @error('tgl_wajib_kembali')
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
{{-- <script src="{{ asset('assets/node_modules/js-example-basic-single/dist/js/select2.full.min.js') }} "></script> --}}
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready( function () {
    $('#id').DataTable();
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
} );

</script>
@endsection