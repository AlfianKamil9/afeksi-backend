<<<<<<< HEAD
 <!-- NAVBAR
    ============================================================================ -->
<nav class="shadow-sm " style="background-color: white;">
      <section>
      <div class="mx-5 ">
        <header class="navbar navbar-expand-lg d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
          <a href="#" class="col-md-3 mb-2 mb-md-0">
            <img src="assets/img/logoafeksi.svg" alt="" class="nav-logo" style="width: 90px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 fs-5 fw-semibold mx-auto">
            <li><a href="/#beranda" class="nav-link px-2 link-dark">Beranda</a></li>
            <li><a href="/#layanan" class="nav-link px-2 link-secondary">Layanan</a></li>
            <li><a href="/#kegiatan" class="nav-link px-2 link-secondary">Kegiatan</a></li>
            <li><a href="/#tentang" class="nav-link px-2 link-secondary">Tentang Kami</a></li>
            <li><a href="/#faq" class="nav-link px-2 link-secondary">FAQ</a></li>
            <li><a href="/#karir" class="nav-link px-2 link-secondary">Karir</a></li>
          </ul>
            <div class="col-md-3 ms-auto d-flex m-1">
            @auth
              <a type="button" href="{{ route('logout') }}" class="btn btn-lg btn-outline-primary  w-75 float-end me-2">Logout</a>
            @else
              <a type="button" href="{{ route('register') }}" class="btn btn-lg btn-outline-primary  w-75 float-end me-2">Daftar</a>
              <a type="button" href="{{ route('login') }}" class="btn btn-lg btn-warning w-75 float-end">Login</a>
            @endauth 
=======
<style>
  * {
    margin: 0;
    padding: 0;
    font-family: "Rubik", sans-serif !important;
    text-decoration: none !important;
  }
  
  /* NAVBAR */
  .navbar {
    box-shadow: 0px 13px 40px 0px rgba(0, 0, 0, 0.3); 
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

<nav class="navbar navbar-expand-md navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="assets/img/logo.png" alt="Logo" class="d-inline-block align-text-top w-50" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" id="navbarOffcanvas" tabindex="-1" aria-labelledby="navbarOffcanvasLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-semibold text-uppercase" id="navbarOffcanvasLabel">Afeksi</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
>>>>>>> 091ea7903627df7a979d03ee98c1915980341eb1
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav ms-auto my-lg-2 gap-1 mt-2">
              <li class="nav-item">
                <a class="nav-link" href="#">Beranda</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">Layanan & Produk</a>
                <!-- <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button> -->
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">Kegiatan</a>
                <!-- <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button> -->
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="#" style="color: #233dff">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">FAQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Karir</a>
              </li>
            </ul>

            <div class="ms-auto d-flex p-2 mx-lg-3 gap-2">
              <button class="btn button-daftar rounded-3 me-2">Daftar</button>
              <button class="btn button-login rounded-3">Masuk</button>
            </div>
          </div>
        </div>
      </div>
<<<<<<< HEAD
    </section>
</nav>
=======
    </nav>
>>>>>>> 091ea7903627df7a979d03ee98c1915980341eb1
