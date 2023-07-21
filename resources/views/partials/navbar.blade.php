 <!-- NAVBAR
    ============================================================================ -->
    <section>
      <div class="mx-5 mt-2">
        <header class="navbar navbar-expand-lg d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
          <a href="#" class="col-md-3 mb-2 mb-md-0">
            <img src="/assets/img/logo-copy.png" alt="" class="nav-logo img-fluid" style="height: 70px; width:70px;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 fs-5 fw-semibold mx-auto">
            <li><a href="#beranda" class="nav-link px-2 link-dark">Beranda</a></li>
            <li><a href="#layanan" class="nav-link px-2 link-secondary">Layanan</a></li>
            <li><a href="#kegiatan" class="nav-link px-2 link-secondary">Kegiatan</a></li>
            <li><a href="#tentang" class="nav-link px-2 link-secondary">Tentang Kami</a></li>
            <li><a href="#faq" class="nav-link px-2 link-secondary">FAQ</a></li>
            <li><a href="#karir" class="nav-link px-2 link-secondary">Karir</a></li>
          </ul>
            <div class="col-md-3 ms-auto d-flex m-1">
            @auth
              <a type="button" href="{{ route('logout') }}" class="btn btn-lg btn-outline-primary  w-75 float-end me-2">Logout</a>
            @else
              <a type="button" href="{{ route('register') }}" class="btn btn-lg btn-outline-primary  w-75 float-end me-2">Daftar</a>
              <a type="button" href="{{ route('login') }}" class="btn btn-lg btn-warning w-75 float-end">Login</a>
            @endauth 
          </div>
          </div>
    
        </header>
      </div>
    </section>