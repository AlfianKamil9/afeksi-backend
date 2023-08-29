@extends('../layout')

@section('title', 'Volunteer')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
    <link rel="stylesheet" href="assets/css/volunteer.css">
@endsection

@include('../partials/navbar') 

@section('content')

<!-- HEADER -->
<div class="mb-5 text-white position-relative" style="padding-top:90px;">
  <div class="hero">
    <div class="container d-flex justify-content-between flex-column flex-lg-row gap-5 text-center text-lg-start">
      <div class="left col-lg-7">
        <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Karir</li>
            <li class="breadcrumb-item active" aria-current="page">Volunteer</li>
          </ol>
        </nav>
        <div class="text text-white mt-5">
          <h1 class="mb-4 fw-bold">Positive collaboration yields wonderful outcomes.</h1>
          <p class="fs-6">
            Dengan membantu orang lain melalui pengetahuan dan panduan, Anda turut berperan dalam menciptakan hubungan yang lebih sehat dan
            bahagia.
          </p>
        </div>
        <a href="#" type="button" class="btn btn-join mt-4 fw-medium">Gabung Jadi Volunteer</a>
      </div>
      <div class="col-lg-4 m-3">
        <img class="hero-image w-100" src="assets/img/volunteer/Banner.png" />
      </div>
    </div>
  </div>
</div>
<!-- End HEADER -->

<!-- BENEFIT SECTION -->
<div class="container mb-5">
  <div class="col justify-content-center text-center">
    <h4 class="fw-bold" style="color: #233dff">Benefit Menjadi Bagian Dari Volunteer Afeksi</h4>
    <p class="text-muted mb-5">Bergabunglah dengan kami dan mari bersama menciptakan dunia hubungan yang lebih bermakna dan bahagia!</p>
  </div>

    <div class="row mb-3">
      <div class="col-lg-4 mb-2">
        <div class="card rounded-4 p-3 border-0 shadow card-benefits" style="background-color: #5a74fd">
          <div class="card-body text-white">
            <div class="d-flex flex-column justify-content-start align-items-start white">
              <div class="justify-content-lg-start mb-4 mt-2">
                <img src="assets/img/pendaftaran-konselor/fleksibilitas.png" alt="Fleksibilitas Waktu" class="card-img" />
              </div>
              <h5 class="card-title fw-semibold">Fleksibilitas Waktu</h5>
              <p class="card-text mt-3">Gak usah khawatir soal jam kerja yang kaku. Di sini, anda bisa atur jadwal sesuai keinginanmu..</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-2">
        <div class="card rounded-4 p-3 border-0 shadow card-benefits" style="background-color: #fafafa">
          <div class="card-body">
            <div class="d-flex flex-column justify-content-start align-items-start white">
              <div class="justify-content-lg-start mb-4 mt-2">
                <img src="assets/img/pendaftaran-konselor/agen.png" alt="Jadi Agen Perubahan" class="card-img" />
              </div>
              <h5 class="card-title fw-semibold">Jadi Agen Perubahan</h5>
              <p class="card-text mt-3">
                Anda dapat menjadi agen perubahan positif dalam kehidupan mereka dan menciptakan dampak positif dalam hidup orang lain.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-2">
        <div class="card rounded-4 p-3 border-0 shadow card-benefits" style="background-color: #fafafa">
          <div class="card-body">
            <div class="d-flex flex-column justify-content-start align-items-start">
              <div class="justify-content-lg-start mb-4 mt-2">
                <img src="assets/img/pendaftaran-konselor/jangkauan-luas.png" alt="Jangkauan Luas" class="card-img" />
              </div>
              <h5 class="card-title fw-semibold">Jangkuan Luas</h5>
              <p class="card-text mt-3">Beragam individu yang memiliki latar belakang dan kebutuhan akan berinteraksi dengan Anda.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-2">
        <div class="card rounded-4 p-3 border-0 shadow card-benefits" style="background-color: #fafafa">
          <div class="card-body">
            <div class="d-flex flex-column justify-content-start align-items-start">
              <div class="justify-content-lg-start mb-4 mt-2">
                <img src="assets/img/pendaftaran-konselor/pengembangan-diri.png" alt="Pengembangan Diri & Karir" class="card-img" />
              </div>
              <h5 class="card-title fw-semibold">Pengembangan Diri & Karir</h5>
              <p class="card-text mt-3">Dukungan penuh, panduan, pelatihan khusus, bimbingan personal, dan sumber daya relevan.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-2">
        <div class="card rounded-4 p-3 border-0 shadow card-benefits" style="background-color: #fafafa">
          <div class="card-body">
            <div class="d-flex flex-column justify-content-start align-items-start">
              <div class="justify-content-lg-start mb-4 mt-2">
                <img src="assets/img/pendaftaran-konselor/dukungan-jaringan.png" alt="Dukungan Jaringan Profesional" class="card-img" />
              </div>
              <h5 class="card-title fw-semibold">Dukungan Jaringan Profesional</h5>
              <p class="card-text mt-3">Jadilah bagian dari tim yang multikultural, bersemangat, dan menyenangkan untuk saling berbagi.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-2">
        <div class="card rounded-4 p-3 border-0 shadow card-benefits" style="background-color: #fafafa">
          <div class="card-body">
            <div class="d-flex flex-column justify-content-start align-items-start">
              <div class="justify-content-lg-start mb-4 mt-2">
                <img src="assets/img/pendaftaran-konselor/gaji.png" alt="Gaji Kompetitif" class="card-img" />
              </div>
              <h5 class="card-title fw-semibold">Gaji Kompetitif</h5>
              <p class="card-text mt-3">Lebih fokus pada layanan konseling Anda. Potensi pendapatan terjamin melalui konseling yang berarti</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- END BENEFIT SECTION -->

<!-- Pertumbuhan karir section -->
<div class="position-relative karir">
  <div class="container mb-5 pt-2 pb-4">
    <!-- karna ada margin bottom pada img jadi paddingnya ditambah -->
    <div class="text-center px-lg-5 px-4">
      <h2 class="fw-bold mb-3" style="color: #2139f9">Bertumbuh Dalam Keberagaman, Berkarya Dengan Semangat Kebersamaan</h2>
      <p class="text-muted">
        Kami percaya bahwa edukasi adalah kunci untuk hubungan yang sehat dan bahagia. Bergabunglah dengan kami dalam misi mulia ini untuk
        memberikan panduan berharga kepada masyarakat. Jadilah bagian dari perubahan positif diri sendiri dan orang lain
      </p>
    </div>
    <div class="img-container d-flex mt-5 gap-2 justify-content-lg-between justify-content-around px-lg-0 px-2 flex-wrap">
      <img class="img" src="assets/img/volunteer/kegiatan.png" alt="" />
      <img class="img" src="assets/img/volunteer/kegiatan (1).png" alt="" />
      <img class="img" src="assets/img/volunteer/kegiatan4.png" alt="" />
      <img class="img" src="assets/img/volunteer/kegiatan (3).png" alt="" />
    </div>
  </div>
  <img class="background-vecassets/img/volunteer/ic_sharp-person.png" alt="" />
  <img class="background-vectortwo" src="assets/img/volunteer/backgroundRight.png" alt="" />
</div>
<!-- Pertumbuhan karir section -->

<!-- slider -->
<div class="contents px-lg-5 px-4 mb-5">
  <div class="slide-container px-lg-2 swiper">
    <h2 class="fw-bold text-white">Apa Kata Mereka Tentang Afeksi</h2>
    <div class="slide-content">
      <div class="card-wrapper swiper-wrapper">
        <div class="swiper-slide">
          <img src="assets/img/volunteer/ic_sharp-person.png" alt="" style="width: 50px" />
          <h4>Nama Client</h4>
          <p>Mahasiswa</p>
          <span>Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span>
        </div>
        <div class="swiper-slide">
          <img src="assets/img/volunteer/ic_sharp-person.png" alt="" style="width: 50px" />
          <h4>Nama Client</h4>
          <p>Mahasiswa</p>
          <span>Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span>
        </div>
        <div class="swiper-slide">
          <img src="assets/img/volunteer/ic_sharp-person.png" alt="" style="width: 50px" />
          <h4>Nama Client</h4>
          <p>Mahasiswa</p>
          <span>Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span>
        </div>
        <div class="swiper-slide">
          <img src="assets/img/volunteer/ic_sharp-person.png" alt="" style="width: 50px" />
          <h4>Nama Client</h4>
          <p>Mahasiswa</p>
          <span>Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span>
        </div>
        <div class="swiper-slide">
          <img src="assets/img/volunteer/ic_sharp-person.png" alt="" style="width: 50px" />
          <h4>Nama Client</h4>
          <p>Mahasiswa</p>
          <span>Sangat Rekomendasi Psikolog di Afeksi ini, karena masalah saya cepat teratasi dengan konsultasi dengan psikolog dari afeksi</span>
        </div>
      </div>
    </div>

    <div class="swiper-pagination"></div>
    <!-- If we need navigation buttons -->

    <div class="s-btn swiper-button-prev"></div>
    <div class="s-btn swiper-button-next"></div>
  </div>
</div>
<!-- slider end -->

<!-- BERGABUNG BERSAMA KAMI -->
<div class="bergabung position-relative py-5 overflow-hidden">
  <img class="background" src="assets/img/volunteer/backgroundbergabung.png" alt="" />
  <div class="container py-4 px-4">
    <div class="row text-center mb-sm-3">
      <div class="col-sm">
        <h2 class="fw-bold" style="color: #2139f9">Bergabunglah bersama kami</h2>
        <p>Ayo ambil bagian menjadi konselor di Afeksi dan menjadi bagian dari perubahan positif serta berdampak bersama AFEKSI</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4 mb-3">
        <div class="card shadow col-join">
          <img
            src="assets/img/volunteer/relationshiphero.png"
            class="card-img-top img-fluid"
            alt="Peer Konselor"
            style="background-size: cover" />
          <div class="card-body">
            <h5 class="card-title fw-bold" style="color: #2139f9">Peer Konselor</h5>
            <p class="card-text" style="color: #717171">
              Mewadahi Niat Baik Semua Orang yang Ingin Terlibat Langsung di Lapangan sebagai Peer Konselor. Siapapun Bisa Bergabung!
            </p>
            <a href="#" class="btn btn-selengkapnya w-100" style="background-color: #233dff; color: #ffffff; font-size: 14px; font-weight: 500"
              >Selengkapnya</a
            >
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card shadow col-join">
          <img
            src="assets/img/volunteer/brand ambassador.png"
            class="card-img-top img-fluid"
            alt="Realtionship Konselor"
            style="background-size: cover" />
          <div class="card-body">
            <h5 class="card-title fw-bold" style="color: #2139f9">Relationship Konselor</h5>
            <p class="card-text" style="color: #717171">
              Mewadahi Niat Baik Semua Orang yang Ingin Terlibat Langsung di Lapangan sebagai Relationship konselor. Siapapun Bisa Bergabung!
            </p>
            <a href="#" class="btn btn-selengkapnya w-100" style="background-color: #233dff; color: #ffffff; font-size: 14px; font-weight: 500"
              >Selengkapnya</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END BERGABUNG BERSAMA KAMI -->

@include('../partials/footer') 

@section('script')
   <script src="assets/js/slider.js"></script>
@endsection

@endsection
