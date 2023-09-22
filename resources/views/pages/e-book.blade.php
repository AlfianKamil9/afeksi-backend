@extends('../layout') 
@section('title', 'My E-Book | AFEKSI')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
<link rel="stylesheet" href="/assets/css/e-book.css" />
@endsection
 @section('content')


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
        <div class="dashboard p-3 shadow-sm">
          @include('partials.sidebar')
        </div>
      </div>
   
      <!-- End of dashboard profile  ===================================-->
      <div class="col-md-9 p-4" style="min-height: 90vh;">
        <div class="col col-lg-12 ebookwrapp mx-auto d-flex flex-wrap gap-4">
          <div class="d-flex flex-column mb-3 mt-3" id="card-ebook">
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
          <div class="d-flex flex-column mb-3 mt-3" id="card-ebook">
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
