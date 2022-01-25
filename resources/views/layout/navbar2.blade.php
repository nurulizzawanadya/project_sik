<nav class="navbar navbar-secondary navbar-expand-lg">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Data Master</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="{{ url('admin/data_admin') }}" class="nav-link">Data Administrator</a></li>
          <li class="nav-item"><a href="{{ url('anggota') }}" class="nav-link">Data Anggota</a></li>
          <li class="nav-item"><a href="{{ url('buku/kategori_buku') }}" class="nav-link">Kategori Buku</a></li>
        </ul>
      </li>
      <li class="nav-item active">
        <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Dashboard</span></a>
      </li>
    </ul>
  </div>
</nav>