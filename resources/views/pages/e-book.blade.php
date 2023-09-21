@extends('../layout') 
@section('title', 'Ebook')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
<link rel="stylesheet" href="/assets/css/e-book.css" />
@endsection
 @section('content')

    <!-- Header -->
    <div class="hero dashboard" style="background-image: url(assets/img/kegiatan/Banner.svg)">
    <div class="py-5 my-5"></div>   <!-- for spacing -->
      <div class="d-flex justify-content-between flex-column flex-lg-row gap-5 text-center text-lg-start">
        <div class="left col-lg-9">
          <div class="text text-white mt-5">
            <h3 class="mb-2 fw-bold" style="color: #fbdd41">E-Book Saya</h3>
            <p class="mb-0">Upgrade terus pengetahuanmu dengan koleksi E-book yang kamu miliki</p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header -->
    <!-- Sidebar -->
    <div class="card-dashboard col-sm-5 col-lg-2 mt-4">
      <div class="card border-0 rounded-3 shadow p-3">
        <img src="/assets/img/dashboard-courses/user.svg" id="profile" class="card-img-top" alt="Dashboard " />
        <div class="card-body">
          <h5 class="card-title fw-bold mb-1">Bimo Setyo</h5>
          <p class="mb-3">bimo82374@gmail.com</p>

          <nav class="col-md-12 col-lg-12 d-md-block sidebar mb-3">
            <div class="position-sticky">
              <ul class="nav flex-column">
                <li class="nav-item mb-3">
                  <a class="nav-link" href="#">
                    <img src="/assets/img/dashboard-courses/dashboard.svg" alt="Dashboard" />
                    Dashboard
                  </a>
                </li>
                <li class="nav-item mb-3">
                  <a class="nav-link" href="#">
                    <img src="/assets/img/dashboard-courses/profile.svg" alt="Dashboard" />
                    Profile
                  </a>
                </li>
                <li class="nav-item mb-3">
                  <a class="nav-link" href="#">
                    <img src="/assets/img/dashboard-courses/voucher.svg" alt="Dashboard" />
                    Voucher
                  </a>
                </li>
                <li class="nav-item mb-3">
                  <a class="nav-link active" href="#">
                    <img src="/assets/img/dashboard-courses/e-book-active.svg" alt="Dashboard" />
                    My E-Book
                  </a>
                </li>
                <li class="nav-item mb-3">
                  <a class="nav-link" href="#">
                    <img src="/assets/img/dashboard-courses/rekap-transaksi.svg" alt="Dashboard" />
                    Rekap Transaksi
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <!-- end Sidebar -->

    <!-- start main -->
    <main>
      <div style="height: 100vh">
        <div class="container">
          <div class="row">
            <div class="col col-lg-12 mx-auto">
              <div class="d-flex flex-column mb-3 align-items-center mt-3" id="card-ebook">
                <div class="card rounded-bottom-3 rounded-top-0" style="width: 18rem">
                  <img src="/assets/img/dashboard-courses/e-book-cover.png" class="cover" alt="Cover E-book" />
                  <div class="card-body" style="overflow: hidden">
                    <h6 class="card-title fw-bold two-line-title">Menelisik Hati, Memahami Pasangan: Panduan Praktis Untuk Kebahagiaan Bersama Pasangan</h6>
                    <p class="card-text text-muted three-line-title" style="font-size: 13.5px">
                      Temukan Kunci Kebahagiaan Bersama Pasangan Anda! Dalam e-book kami, 'Menelisik Hati, Memahami Pasangan. Jangan lewatkan peluang untuk merajut ikatan yang abadi - dapatkan e-book kami sekarang dan mulailah perjalanan
                      menuju kebahagiaan bersama pasangan Anda!.
                    </p>
                    <a href="#" class="btn-primary fw-bold link-underline-primary" style="text-decoration: underline !important">Download</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- end main -->

@endsection
