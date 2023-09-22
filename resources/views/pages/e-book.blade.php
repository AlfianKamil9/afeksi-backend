@extends('../layout') @section('title', 'Ebook')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
<link rel="stylesheet" href="assets/css/e-book.css" />
@endsection @include('../partials/navbar') @section('content')


<div class="row justify-content-end">
      <div class="col-12 position-relative">
        <!-- HERO
                ================================================================= -->
        <section>
          <div class="hero d-flex">
            <div class="container py-5 my-5">
              <div class="row justify-content-end">
                <div class="col-md-9 d-flex flex-column">
                  <h4 class="fw-semibold mt-5">
                    <span>E-Book Saya</span>
                  </h4>
                  <p class="fs-5 fw-light mt-3">
                    Upgrade terus pengetahuanmu dengan koleksi E-Book yang kamu miliki.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Dashboard ============================== -->
        <div class="dashboard p-5">
          <div
            class="bg-light rounded-circle d-flex justify-content-center align-items-center"
            style="width: 125px; height: 125px"
          >
            <img
              src="assets/img/dashboard-profile/user.svg"
              width="50px"
              height="50px"
            ></img>
          </div>
          <div class="mt-3">
            <h6 class="fw-bold">Bimo Setyo</h6>
            <p>bimo82374@gmail.com</p>
          </div>
          <div class="mb-4 mt-5 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/dashboard.svg"
                class="me-3"
                width="20"
                height="20"
              ></img
              >Dashboard</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/user.png"
                class="me-3"
                width="20"
                height="20"
              ></img
              >Profile</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/voucher.svg"
                width="20"
                height="20"
                class="me-3"
            ></img>Voucher</a
            >
          </div>
          <div class="mb-4 p-2 active">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/ebookblue.svg"
                width="20"
                height="20"
                fill="#828282"
                class="me-3"
              ></img
              >My E-Book</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/transaction.svg"
                alt=""
                width="20"
                height="20"
                fill="#828282"
                class="me-3"
              />Rekap Transaksi</a
            >
          </div>
        </div>
      </div>
      <!-- End of dashboard profile  ===================================-->
      <div class="col-md-9 p-4" style="min-height: 90vh;">
        <div class="col col-lg-12 ebookwrapp mx-auto d-flex flex-wrap gap-4">
          <div class="d-flex flex-column mb-3 mt-3" id="card-ebook">
            <div class="card rounded-bottom-3 rounded-top-0" style="width: 18rem">
              <img src="assets/img/dashboard-courses/e-book-cover.png" class="cover" alt="Cover E-book" />
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
          <div class="d-flex flex-column mb-3 mt-3" id="card-ebook">
            <div class="card rounded-bottom-3 rounded-top-0" style="width: 18rem">
              <img src="assets/img/dashboard-courses/e-book-cover.png" class="cover" alt="Cover E-book" />
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
          <div class="d-flex flex-column mb-3 mt-3" id="card-ebook">
            <div class="card rounded-bottom-3 rounded-top-0" style="width: 18rem">
              <img src="assets/img/dashboard-courses/e-book-cover.png" class="cover" alt="Cover E-book" />
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
          <div class="d-flex flex-column mb-3 mt-3" id="card-ebook">
            <div class="card rounded-bottom-3 rounded-top-0" style="width: 18rem">
              <img src="assets/img/dashboard-courses/e-book-cover.png" class="cover" alt="Cover E-book" />
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

@include('../partials/footer')

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


@endsection
