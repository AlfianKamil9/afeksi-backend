<style>
  * {
    margin: 0;
    padding: 0;
    font-family: "Rubik", sans-serif !important;
    text-decoration: none !important;
  }
  
  /* NAVBAR */
  .navbar {
    box-shadow: 0px 13px 40px 0px rgba(0, 0, 0, 0.100); 
    position: relative;
    z-index: 1;
  }
  .navbar li a {
    color: #94a8be;
  }
  
  div .button-daftar {
    border-color: #233dff ;
    color: #233dff;
    width: 95px;
    transition: transform 0.3s ease, border-color 0.3s ease;
  }
  
  div .button-login {
    background-color: #233dff;
    color: #fff;
    border: 2px solid transparent;
    width: 95px;
    transition: transform 0.3s ease, background-color 0.3s ease;
  }
  
  .button-daftar:hover {
    transform: scale(1.1);
  }
  
  .button-login:hover {
    transform: scale(1.1);
    background: #233dff;
  }
  
  .button-daftar:focus {
    outline: none;
  }
  
  .button-login:focus {
    outline: #233dff;
  }
  /* End Navbar */
</style>

<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <img src="/assets/img/logo-copy.png" alt="Logo" class="d-inline-block align-text-top ms-5" style="width:60px;"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" id="navbarOffcanvas" tabindex="-1" aria-labelledby="navbarOffcanvasLabel">
          <div class="offcanvas-header">
            <img src="/assets/img/logo-copy.png" alt="Logo" class="d-inline-block align-text-top" style="width:60px;"/>
            <h5 class="offcanvas-title fw-semibold text-uppercase" id="navbarOffcanvasLabel">Afeksi</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav ms-auto my-lg-2 gap-1 mt-2">
              <li class="nav-item">
                <a class="nav-link" href="/" @if ( Route::CurrentRouteName() == "homepage")
                  style="color: #233dff"
                @endif>Beranda</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">Layanan & Produk</a>
                <!-- <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button> -->
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Mentoring</a></li>
                  <li><a class="dropdown-item" href="#">Konseling</a></li>
                  <li><a class="dropdown-item" href="#">Profesional Konseling</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">Kegiatan</a>
                <!-- <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button> -->
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-camera-video-fill text-primary "></i> Webinar</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-megaphone-fill text-primary"></i> Campaign</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-chat-left-fill text-primary"></i> Rekap History</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('tentang-kami') }}" @if ( Route::CurrentRouteName() == "tentang-kami")
                  style="color: #233dff"
                @endif>Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">FAQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Karir</a>
              </li>
            </ul>

            <div class="ms-auto d-flex p-2 mx-lg-3 gap-2">
              @auth
              {{-- <a type="button" href="{{ route('logout') }}" class="btn button-login rounded-3">Logout</a> --}}
              <div class="dropdown-center">
                <button class="btn btn-primary text-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ auth()->user()->nama }}
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Riwayat Transaksi</a></li>
                  <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
              </div>
              <div class="me-3"></div>
              @else
              <a type="button" href="{{ route('register') }}" class="btn button-daftar rounded-3 me-2">Daftar</a>
              <a type="button" href="{{ route('login') }}" class="btn button-login rounded-3">Masuk</a>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </nav>

