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
    width: 100%;
    padding:0;
    z-index: 999 !important;
    background-color: white;
    position: fixed !important;
    z-index: 1;
  }
  .navbar .container-fluid {
    max-width: 1375px;
    margin: auto;
  }
  .navbar li a {
    color: #94a8be;
  }
  
  div .button-daftar {
    border-color: #233dff;
    color: #233dff;
    transition: transform 0.3s ease, border-color 0.3s ease;
  }
  
  div .button-login {
    background-color: #233dff;
    color: #fff;
    border: 2px solid transparent;
    width: 93px;
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
        <div class="container-fluid px-2">
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
                  <a class="nav-link" href="#">Artikel</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Tentang Kami</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">FAQ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Karir</a>
                </li>
              </ul>
  
              <div class="ms-auto d-flex p-2 mx-lg-3 gap-2">
                <div class="dropdown">
                    <a class="text-primary" data-bs-toggle="dropdown" aria-expanded="false" href="#">Hi, Bimo<img src="assets/img/dashboard-profile/icon.png" class="ms-3"></a>
                    <ul class="dropdown-menu">
                      <li  class="mb-2"><a class="dropdown-item" href="#"><svg data-src="assets/img/dashboard-profile/user.svg" class="me-3" width = "20" height = "20" fill="#233dff"></svg>Profile</a></li>

                      <li class="mb-2"><a class="dropdown-item" href="#"> <svg data-src="assets/img/dashboard-profile/e-book.svg" width = "20" height = "20" fill="#233dff" class="me-3"></svg> My E-Book</a></li>

                      <li class="mb-2"><a class="dropdown-item" href="#"> <img src="assets/img/dashboard-profile/logout.svg" alt="" width = "20" height = "20" class="me-3">Logout</a></li>
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>