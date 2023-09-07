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
  margin-bottom: 10px;
}

.bi {
  color:#233DFF !important;
  font-size: 19px;
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
                  <li><a class="dropdown-item" href="#"><img src="assets/img/konseling.svg" alt=""> Konseling</a></li>
                  <li><a class="dropdown-item" href="#"><img src="assets/img/mentoring.svg" alt=""> Mentoring</a></li>
                  <li><a class="dropdown-item" href="#"><img src="assets/img/Ebook.svg" alt=""> E-Book</a></li>
                  <li><a class="dropdown-item" href="#"><img src="assets/img/Ecourse.svg" alt=""> E-Course</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">Kegiatan</a>
                <!-- <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button> -->
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" ><i class="bi bi-camera-video-fill "></i> Webinar</a></li>
                  <li><a class="dropdown-item" ><i class="bi bi-megaphone-fill "></i> Campaign</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-chat-left-fill "></i> Rekap History</a></li>
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
              <button class="btn button-daftar rounded-3 me-2">Daftar</button>
              <button class="btn button-login rounded-3">Masuk</button>
            </div>
          </div>
        </div>
      </div>
    </nav>