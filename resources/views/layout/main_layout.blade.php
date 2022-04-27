<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  @include('layout.css_global')
  @yield('css_custom')
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      @include('layout.navbar')
      @include('layout.navbar2')
      <div class="main-content">
        <section class="section">
          @include('sweetalert::alert')
          @yield('breadcrumb')
          @yield('content')
        </section>
      </div>
      <!-- Modal -->
<div class="modal fade" id="tgl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="exportgl" action="{{route('exportTgl')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" name="tgl_start" class="form-control">
              </div>
              <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="date" name="tgl_end" class="form-control">
              </div>
          </form>
      </div>
      <div class="modal-footer">
<<<<<<< HEAD
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lihat Data</button>
=======
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
        <button type="button" class="btn btn-primary"  onclick="event.preventDefault();
        document.getElementById('exportgl').submit();">Export to Excel</button>
      </div>
    </div>
  </div>
</div> 

<<<<<<< HEAD


=======
>>>>>>> 987d24a9feae479a35bab7d7d22bbb5cba0eb4b9
      @include('layout.footer')
    </div>
  </div>
@include('layout.js_global')
</body>
@yield('script')
</html>