<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a href="{{url('/redirects')}}" class="sidebar-brand brand-logo">
      <img src="admin/assets/images/white-logo.png" alt="logo">
    </a>
    <!-- ***** Logo Start ***** -->
    <a href="{{url('/redirects')}}" class="sidebar-brand brand-logo-mini">
      <img src="admin/assets/images/mini-logo.png" alt="logo">
    </a>
    <!-- ***** Logo End ***** -->
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">{{ Auth::user()->nama }}</h5>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="{{ route('profile.show') }}" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-account-circle text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Edit Profil</p>
            </div>
          </a>

        </div>
      </div>
    </li>

    <li class="nav-item nav-category">
      <span class="nav-link">Halaman Utama</span>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/redirects')}}">
        <span class="menu-icon">
          <i class="mdi mdi-chart-bar"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item nav-category">
      <span class="nav-link">Pesanan dan Pembayaran</span>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/pesanan')}}">
        <span class="menu-icon">
          <i class="mdi mdi-format-list-bulleted"></i>
        </span>
        <span class="menu-title">Data Pesanan</span>
      </a>
    </li>

    <li class="nav-item nav-category">
      <span class="nav-link">Lihat Data</span>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/pelanggan')}}">
        <span class="menu-icon">
          <i class="mdi mdi-account-multiple"></i>
        </span>
        <span class="menu-title">Data Pelanggan</span>
      </a>
    </li>

    <li class="nav-item nav-category">
      <span class="nav-link">Kelola Data</span>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/produk')}}">
        <span class="menu-icon">
          <i class="mdi mdi-package-variant-closed"></i>
        </span>
        <span class="menu-title">Kelola Rumput Laut</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/artikel')}}">
        <span class="menu-icon">
          <i class="mdi mdi-newspaper"></i>
        </span>
        <span class="menu-title">Kelola Artikel</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/testimoni')}}">
        <span class="menu-icon">
          <i class="mdi mdi-star"></i>
        </span>
        <span class="menu-title">Kelola Testimoni</span>
      </a>
    </li>

    <li class="nav-item nav-category">
      <span class="nav-link">Cetak Laporan</span>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/laporanpenjualan')}}">
        <span class="menu-icon">
          <i class="mdi mdi-printer"></i>
        </span>
        <span class="menu-title">Laporan Penjualan</span>
      </a>
    </li>



  </ul>

</nav>

<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="#"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown border-right">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="mdi mdi-bell"></i>
          <span class="count bg-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-3 mb-0">Notifikasi</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Pesanan Masuk</p>
              <p class="text-muted ellipsis mb-0"> Periksa Pesanan Masuk Anda </p>
            </div>
          </a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
          <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="admin/assets/images/faces/face15.jpg" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->nama }}</p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
          <h6 class="p-3 mb-0">Ingin keluar dari aplikasi?</h6>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div><br>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-jet-dropdown-link class="text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="mdi mdi-logout text-danger"></i> {{ __(' Keluar') }}</x-jet-dropdown-link>

          </form><br>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>