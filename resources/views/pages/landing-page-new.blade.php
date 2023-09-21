@extends('../layout')

@section('title', 'Home')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
    <link rel="stylesheet" href="assets/css/landingpage.css">
@endsection

@include('../partials/navbar') 

@section('content')
    <!-- Section Hero Content Start -->
    <section id="title" class="mb-5" style="background-image: url(../assets/img/landingpage/bg.png); background-size: cover; padding:94px 0 50px 0;">
        <div class="container px-4 pt-5">
          <div class="row flex-lg-row-reverse align-items-center g-5 pt-5">
            <div class="col-10 col-sm-8 col-lg-6">
              <img
                src="../assets/img/landingpage/hero.png"
                class="d-none d-lg-block mx-lg-auto img-fluid mt-lg-3 pt-lg-5"
                alt="hero"
                height="400"
                loading="lazy" />
            </div>
            <div class="col-lg-6 pb-5">
              <h1 class="fw-semibold text-body-emphasis lh-1 mb-3" style="color: #ffffff !important; font-size: 36px">
                Bercerita dan Berbagi rasa. Tenangkan hati dan tenangkan diri.
              </h1>
              <p class="lead" style="color: #ffffff; font-size: 20px">
                Setiap hubungan memiliki potensi untuk tumbuh dan berkembang. Temukan panduan dari para Psikolog profesional kami guna mencapai
                kualitas hubungan yang lebih dalam dan bermakna.
              </p>
              <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a
                  type="button"
                  href="#konsultasi"
                  class="btn btn-konsultasi btn-lg px-4 me-md-2"
                  style="font-size: 15px; background-color: #233dff; color: #ffffff">

                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-apple mb-1" viewBox="0 0 16 16">
                    <path
                      d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"
                    />
                    <path
                      d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"
                    />
                  </svg> -->
                  Mulai Konsultasi
                </a>
                <a href="/faq-konseling" type="button" class="btn btn-learn btn-lg px-4" style="font-size: 15px; background-color: #ffd34e">
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google-play mb-1" viewBox="0 0 16 16">
                    <path
                      d="M14.222 9.374c1.037-.61 1.037-2.137 0-2.748L11.528 5.04 8.32 8l3.207 2.96 2.694-1.586Zm-3.595 2.116L7.583 8.68 1.03 14.73c.201 1.029 1.36 1.61 2.303 1.055l7.294-4.295ZM1 13.396V2.603L6.846 8 1 13.396ZM1.03 1.27l6.553 6.05 3.044-2.81L3.333.215C2.39-.341 1.231.24 1.03 1.27Z"
                    />
                  </svg> -->
                  Learn More
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section Hero Content End -->

      <!-- Section Langkah Start -->
      <section>
        <div class="mb-5">
          <div class="container px-4">
            <div class="row">
              <div class="col-sm">
                <h2 class="fw-bold" style="color: #2139f9">4 Langkah Mudah</h2>
                <h2 class="fw-bold">Melakukan konsultasi</h2>
                <p style="color: #717171; font-size: 20px">
                  Temukan kemudahan dan kenyamanan dalam mendapatkan solusi <br />
                  terbaik untuk setiap aspek kehidupan Anda melalui konsultasi <br />
                  kami! Ikuti langkah-langkah sederhana.
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mb-3"><img src="../assets/img/landingpage/Group 2406.png" alt="group" class="img-fluid" width="250" /></div>
              <div class="col-sm-6 text-center"><img src="../assets/img/landingpage/OBJECTS.png" alt="object" class="img-fluid" width="400" /></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section Langkah End -->

      <!-- Section Profil Psikolog & Konseler Start -->
      <section>
        <div class="mb-5">
          <div class="container px-4">
            <div class="row text-center mb-sm-3">
              <div class="col-sm">
                <h2 class="fw-bold" style="color: #2139f9">Profil Psikolog & Konselor</h2>
                <p>
                  Semua Psikolog dan Konselor terbaik Afeksi telah berlisensi dan diakui oleh HIMPSI. Mereka siap mendengarkan dan mengatasi setiap
                  masalah Anda.
                </p>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-3 col-md-5 mb-3">
                <div class="card shadow">
                  <img
                    src="../assets/img/landingpage/Frame 2608806.png"
                    class="card-img-top img-fluid"
                    alt="psikolog"
                    style="background-size: cover" />
                  <div class="card-body">
                    <h5 class="card-title fw-bold" style="color: #2139f9">Psikolog</h5>
                    <p class="card-text" style="color: #717171">
                      Mulailah konsultasi masalahmu dengan psikolog terbaik kami. Dan Temukan Psikolog untuk menyelesaikan masalahmu !!!!
                    </p>
                    <a
                      href="#"
                      class="btn btn-selengkapnya w-100"
                      style="background-color: #233dff; color: #ffffff; font-size: 14px; font-weight: 500"
                      >Selengkapnya</a
                    >
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-5 mb-3">
                <div class="card shadow">
                  <img
                    src="../assets/img/landingpage/Frame 2608806 (1).png"
                    class="card-img-top img-fluid"
                    alt="psikolog"
                    style="background-size: cover" />
                  <div class="card-body">
                    <h5 class="card-title fw-bold" style="color: #2139f9">Konselor</h5>
                    <p class="card-text" style="color: #717171">
                      Mulailah konsultasi masalahmu dengan Konselor terbaik kami. Dan Temukan Konselor untuk menyelesaikan masalahmu !!!!
                    </p>
                    <a
                      href="#"
                      class="btn btn-selengkapnya w-100"
                      style="background-color: #233dff; color: #ffffff; font-size: 14px; font-weight: 500"
                      >Selengkapnya</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section Profil Psikolog & Konseler End -->

      <!-- Section Layanan Konsultasi Start -->
      <section id = "konsultasi">
        <div class="mb-5" style="background-color: #d3daff">
          <div class="container py-5 px-4">
            <div class="row text-center mb-sm-3">
              <div class="col-sm">
                <h2 class="fw-bold" style="color: #2139f9">Pilih layanan konsultasi yang membuatmu nyaman dan tenang</h2>
                <p style="color: #717171">
                  Jangan ragu untuk memilih kami sebagai mitra dalam perjalanan menuju kebahagiaan dan keberhasilan Anda!. Untuk memulai konsultasi,
                  segera pilih layanan konsultasi kami !!!
                </p>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-6 col-sm-12">
                <div
                  class="card mb-3 py-4 px-3"
                  style="
                    background-image: url(../assets/img/landingpage/Frame\ 2608924.svg);
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                  ">
                  <div class="row g-0">
                    <div class="col-md-6 my-auto text-center">
                      <img src="../assets/img/landingpage/layanankonsultasi/konsultasi1.png" class="img-fluid rounded-start" alt="konsultasi1" />
                    </div>
                    <div class="col-md-6">
                      <div class="card-body">
                        <h6 class="card-title fw-bold mb-1">Mentoring</h6>
                        <p class="card-text mb-3" style="font-size: 12px">
                          Terdapat banyak layanan mentoring, yang meliputi Parenting Mentoring, Pre Marriage Mentoring, dan Relationship Mentoring.
                          Segera pilih layanan mentoring yang kamu minatti !!
                        </p>
                        <a href="#" class="btn-pilih">Pilih</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div
                  class="card mb-3 py-4 px-3"
                  style="
                    background-image: url(../assets/img/landingpage/Frame\ 2608924.svg);
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                  ">
                  <div class="row g-0">
                    <div class="col-md-6 my-auto text-center">
                      <img src="../assets/img/landingpage/layanankonsultasi/konsultasi2.png" class="img-fluid rounded-start" alt="konsultasi2" />
                    </div>
                    <div class="col-md-6">
                      <div class="card-body">
                        <h6 class="card-title fw-bold mb-1">Konseling</h6>
                        <p class="card-text mb-3" style="font-size: 12px">
                          Terdapat banyak layanan konseling, yang meliputi Professional Counseling dan Peers Counseling. Segera pilih layanan
                          konseling yang kamu minatti !!
                        </p>
                        <a href="#" class="btn-pilih">Pilih</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section Layanan Konsultasi End -->

      <!-- Section Caraousel Tentang Afeksi Start -->
      <div class="contents">
        <div class="slide-container swiper">
          <h2 class="fw-bold" style="color: #2139f9">Apa Kata Mereka Tentang Afeksi</h2>
          <p>Afeksi telah dipercaya para pengguna dari berbagai kalangan.</p>
          <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
              <div class="swiper-slide">
                <img src="../assets/img/landingpage/Ellipse.svg" alt="" style="width: 50px" />
                <h4 class="pt-2">Nama Client</h4>
                <p>Mahasiswa</p>
                <span
                  >Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span
                >
              </div>
              <div class="swiper-slide">
                <img src="../assets/img/landingpage/Ellipse.svg" alt="" style="width: 50px" />
                <h4 class="pt-2">Nama Client</h4>
                <p>Mahasiswa</p>
                <span
                  >Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span
                >
              </div>
              <div class="swiper-slide">
                <img src="../assets/img/landingpage/Ellipse.svg" alt="" style="width: 50px" />
                <h4 class="pt-2">Nama Client</h4>
                <p>Mahasiswa</p>
                <span
                  >Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span
                >
              </div>
              <div class="swiper-slide">
                <img src="../assets/img/landingpage/Ellipse.svg" alt="" style="width: 50px" />
                <h4 class="pt-2">Nama Client</h4>
                <p>Mahasiswa</p>
                <span
                  >Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span
                >
              </div>
              <div class="swiper-slide">
                <img src="../assets/img/landingpage/Ellipse.svg" alt="" style="width: 50px" />
                <h4 class="pt-2">Nama Client</h4>
                <p>Mahasiswa</p>
                <span
                  >Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span
                >
              </div>
            </div>
          </div>

          <div class="swiper-pagination"></div>
          <!-- If we need navigation buttons -->

          <div class="s-btn swiper-button-prev"></div>
          <div class="s-btn swiper-button-next"></div>
        </div>
      </div>
      <!-- Section Caraousel Tentang Afeksi End -->

      <!-- Section Bekerjasama Start -->
      <div class="mb-5">
        <div class="container px-4">
          <div class="row text-center mb-sm-3">
            <div class="col-sm mb-5">
              <h2 class="fw-bold" style="color: #2139f9">Telah Bekerjasama Dengan</h2>
            </div>
          </div>
          <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-2 col-sm-12 mb-sm-3">
              <img src="../assets/img/landingpage/bekerjasama/landingpagelogo3.png" alt="kementrian" class="" width="140" />
            </div>
            <div class="col-lg-2 col-sm-12 mb-3">
              <img src="../assets/img/landingpage/bekerjasama/landingpagelogo4.png" alt="eternal" class="img-fluid" width="140" />
            </div>
            <div class="col-lg-2 col-sm-12 mb-3">
              <img src="../assets/img/landingpage/bekerjasama/landingpagelogo1.png" alt="eternal" class="img-fluid" width="140" />
            </div>
            <div class="col-lg-2 col-sm-12 mb-3">
              <img src="../assets/img/landingpage/bekerjasama/landingpagelogo2.png" alt="eternal" class="img-fluid" width="140" />
            </div>
          </div>
        </div>
      </div>
      <!-- Section Bekerjasama End -->

      <!-- Section Tanya Admin Start -->
      <section>
        <div class="mb-5">
          <div class="container py-5 px-4 rounded" style="background-color: #5a74fd">
            <div class="row justify-content-center align-items-center">
              <div class="col-md-6 text-center">
                <img src="../assets/img/landingpage/tanyaadmin/tanyadmin.png" alt="tanyadmin" class="img-fluid" width="400" />
              </div>
              <div class="col-md-6">
                <h2
                  class="fw-bold mb-3"
                  style="
                    color: #ffffff;
                    background-image: url(../assets/img/landingpage/tanyaadmin/../assets/img/landingpage/Ellipse\ 1215.svg);
                    background-repeat: no-repeat;
                    background-position: bottom;
                  ">
                  Ingin Berkonsultasi Terlebih Dahulu?
                </h2>
                <p class="mb-4" style="color: #ffffff">
                  Masih bingung dengan layanan yang cocok dengan kamu, yuk konsultasikan bersama admin melalui Whatsapp di tombol ini.
                </p>
                <a href="#" class="btn-tanya"
                  >Tanya Admin Yuk
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp pb-1" viewBox="0 0 16 16">
                    <path
                      d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" /></svg
                ></a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section Tanya Admin End -->
    </main>


@include('../partials/footer') 

@section('script')
   <script src="assets/js/landingpage.js"></script>
@endsection

@endsection
