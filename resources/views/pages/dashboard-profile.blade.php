@extends('../layout')

@section('title', 'dashboard-profile')

@section('styles')
    <link rel="stylesheet" href="assets/css/dashboard-profile.css">
@endsection


@include('../partials/navbar-new') 

@section('content')

    <section>
      <div class="hero d-flex pt-5">
        <div class="container-fluid py-4">
          <div class="row justify-content-end">
            <div class="col-lg-8">
              <h4 class="fw-semibold mt-5">
                <span>Welcome</span>, Bimo Setyo
              </h4>
              <p class="fw-light mt-3">
                Untuk memudahkan proses konsultasi kamu, harap masukkan
                informasi yang valid.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- sidebar -->
    <div class="card-dashboard navbar-expand-lg col-sm-5 col-lg-3 mt-4">
      <button class="navbar-toggler sidebar-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="navbarOffcanvas">
        <img src="assets/img/dashboard-profile/user.svg" class="card-img-top" alt="Dashboard " />
      </button>

      <div class="offcanvas offcanvas-start" tabindex="-1" id="sideBar" aria-labelledby="thisSideBar">
      <div class="offcanvas-header">
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="card border-0">
          <img src="assets/img/dashboard-profile/user.svg" id="profile" class="p-4 rounded-circle" alt="Dashboard " style="background-color: #cccccc; width: 35%;"/>
          <div class="card-body">
            <div class="card-title mb-5 ms-md-2">
              <h5 class="fw-bold mb-1">Bimo Setyo</h5>
              <p class="mb-3">bimo82374@gmail.com</p>
            </div>
            <div class="col-md-12 col-lg-12 d-md-block dashboard-menu mb-3">
              <div class="position-sticky">
                <ul class="nav flex-column">
                  <li class="nav-item mb-3">
                    <a class="nav-link" href="#">
                      <img src="assets/img/dashboard-profile/dashboard.svg" alt="Dashboard" />
                      Dashboard
                    </a>
                  </li>
                  <li class="nav-item mb-3">
                    <a class="nav-link active" href="#">
                      <img src="assets/img/dashboard-profile/user-blue.svg" alt="Dashboard" />
                      Profile
                    </a>
                  </li>
                  <li class="nav-item mb-3">
                    <a class="nav-link" href="#">
                      <img src="assets/img/dashboard-profile/voucher.svg" alt="Dashboard" />
                      Voucher
                    </a>
                  </li>
                  <li class="nav-item mb-3">
                    <a class="nav-link" href="#">
                      <img src="assets/img/dashboard-profile/courses.svg" alt="Dashboard" />
                      My Courses
                    </a>
                  </li>
                  <li class="nav-item mb-3">
                    <a class="nav-link" href="#">
                      <img src="assets/img/dashboard-profile/e-book.svg" alt="Dashboard" />
                      My E-Book
                    </a>
                  </li>
                  <li class="nav-item mb-3">
                    <a class="nav-link" href="#">
                      <img src="assets/img/dashboard-profile/transaction.svg" alt="Dashboard" />
                      Rekap Transaksi
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

    
   
    <!-- end Sidebar -->

    <!-- MAIN --->
    <main>
      <div class="row mt-5 mx-1 me-lg-5 justify-content-end">
        <form class="col-lg-8">
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <!-- Nama Lengkap -->
                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                <input
                  type="text"
                  class="form-control"
                  id="namaLengkap"
                  placeholder="Masukkan Nama Lengkap"
                />
              </div>
              <div class="mb-3">
                <!-- Email -->
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="Masukkan Email"
                />
              </div>
            </div>

            <div class="col-12 col-md-6">
              <div class="mb-3">
                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    id="tanggalLahir"
                    placeholder="Pilih Tanggal Lahir"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="noHP" class="form-label">No. HP</label>
                <input
                  type="tel"
                  class="form-control"
                  id="noHP"
                  placeholder="Masukkan No. HP"
                />
              </div>
              <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input
                  type="text"
                  class="form-control"
                  id="pekerjaan"
                  placeholder="Pekerjaan Kamu"
                />
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="mb-3">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenisKelamin">
                  <option hidden>Pilihan</option>
                  <option value="laki">Laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input
                  type="text"
                  class="form-control"
                  id="kota"
                  placeholder="Masukkan Kota"
                />
              </div>
              <div class="mb-3">
                <label for="instansi" class="form-label">Instansi</label>
                <input
                  type="text"
                  class="form-control"
                  id="instansi"
                  placeholder="Instansi Kamu"
                />
              </div>
            </div>
            
            <div class="col-12">
              <div class="row">
                <div class="col-12 col-md">
                  <div class="d-flex my-md-5 my-4 gap-3">
                    <button type="submit" class="btn btn-outline-primary">
                      Ubah Password
                    </button>
                    <button type="submit" class="btn btn-outline-primary">
                      Ubah Foto Profile
                    </button>
                  </div>
                </div>
                <div class="col-12 col-md">
                  <div class="my-md-5 pb-5">
                    <button type="submit" class="btn btn-primary w-100">
                      Simpan Perubahan
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>

    <!-- end-main ======================================== -->
      

      <script>
        document.addEventListener("DOMContentLoaded", function () {
            flatpickr("#tanggalLahir", {
                dateFormat: "d/m/Y", // Format tanggal yang diinginkan
                locale: "id", // Lokal Bahasa Indonesia
                altInput: true, // Menggunakan input alternatif yang mudah diisi
                altFormat: "j F Y", // Format input alternatif
                allowInput: true // Memungkinkan pengguna menginputkan tanggal langsung
            });
        });
        
       
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script
      type="text/javascript"
      src="https://unpkg.com/external-svg-loader@1.0.0/svg-loader.min.js"
      async
    ></script>
    <!-- Tambahkan file JavaScript Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  
    
    
    

@include('../partials/footer') 
@endsection