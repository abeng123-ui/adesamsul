<!--
  Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

  Tip 2: you can also add an image using data-image tag
-->
<style type="text/css">
  .dropdown-toggle::after {
    content: none;
  }

</style>
<div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
    Kependudukan
  </a></div>
<div class="sidebar-wrapper">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="material-icons">dashboard</i>
        <p>Beranda</p>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:;" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">person</i>
        <p>Master Data</p>
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ url('/agama') }}">Agama</a></li>
        <li><a class="dropdown-item" href="{{ url('/kategori') }}">Kategori</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:;" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">content_paste</i>
        <p>Penduduk</p>
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ url('/kk') }}">Kartu Keluarga</a></li>
        <li><a class="dropdown-item" href="{{ url('/penduduk') }}">Data Penduduk</a></li>
      </ul>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="#">
        <i class="material-icons">library_books</i>
        <p>Manajemen Akses</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="#">
        <i class="material-icons">bubble_chart</i>
        <p>Manajemen Desa</p>
      </a>
    </li>
    <!-- <li class="nav-item ">
      <a class="nav-link" href="./map.html">
        <i class="material-icons">location_ons</i>
        <p>Surat Keterangan</p>
      </a>
    </li> -->

  </ul>
</div>
