@extends('../layout') 

@section('title', 'junior psikolog') 

@section('styles')
<link rel="stylesheet" href="assets/css/pilihpaket.css" />
<link rel="stylesheet" href="assets/css/stepper.css" />
@endsection 

@include('../partials/navbar-new') 

@section('content')
<div class="container">
  <div class="container" style="padding-top: calc(70px + 94px)">
    <div class="position-relative">
      <div class="stepper-wrapper">
        <div class="stepper-item completed">
          <!-- add class COMPLETED to enable checklist -->
          <div class="step-counter">
            <span class="step-checkmark">✓</span>
          </div>
          <div class="step-name text-center">
            Pilih <br />
            Pengalaman Psikologi
          </div>
        </div>
        <div class="stepper-item active">
          <div class="step-counter">
            <span class="step-checkmark">✓</span>
          </div>
          <div class="step-name">Pilih Paket</div>
        </div>
        <div class="stepper-item">
          <div class="step-counter">
            <span class="step-checkmark">3</span>
          </div>
          <div class="step-name">Data Diri</div>
        </div>
        <div class="stepper-item">
          <!--add class active to enable active step progess-->
          <div class="step-counter">
            <span class="step-checkmark">4</span>
          </div>
          <div class="step-name">Pembayaran</div>
        </div>
      </div>
    </div>
  </div>
  <h5 class="fw-bold mt-5">Pilih Paket Layanan Konseling Relationship</h5>
  <p class="text-secondary sub">
    Kami berharap bahwa layanan Konseling <span >Relationship</span> kami akan membantu setiap orang dalam menciptakan
    hubungan yang harmonis.
  </p>
  <div class="row mb-5">
    <div class="col-lg-6 p-2">
      <div class="box rounded-3 shadow p-3">
        <h5>Sesi Konseling Individu</h5>
        <p class="text-secondary">Sesi konseling individu dengan seorang konselor berlisensi.</p>
        <div class="d-flex align-items-center gap-2">
          <h1 class="lg m-0">Rp 95.000</h1>
          <p class="sm m-0">/ Sesi</p>
        </div>
        <div class="mt-4">
          <div class="d-flex align-items-center gap-2 mb-2">
            <img src="assets/img/pilih-paket/Frame 74.svg" alt="" />
            <p class="m-0">Durasi: 60 menit</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/img/pilih-paket/Frame 74.svg" alt="" />
            <p class="m-0">Fokus pada pemahaman masalah pribadi yang memengaruhi hubungan.</p>
          </div>
        </div>
        <div class="mt-4 rounded-5 btn text-white btn-pilih">Pilih paket</div>
      </div>
    </div>
    <div class="col-lg-6 p-2">
      <div class="box rounded-3 shadow p-3">
        <h5>Sesi Konseling Pasangan</h5>
        <p class="text-secondary">Sesi konseling pasangan dengan seorang konselor berlisensi.</p>
        <div class="d-flex align-items-center gap-2">
          <h1 class="lg m-0">Rp 175.000</h1>
          <p class="sm m-0">/ Sesi</p>
        </div>
        <div class="mt-4">
          <div class="d-flex align-items-center gap-2 mb-2">
            <img src="assets/img/pilih-paket/Frame 74.svg" alt="" />
            <p class="m-0">Durasi: 75 menit</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/img/pilih-paket/Frame 74.svg" alt="" />
            <p class="m-0">Membantu pasangan dalam memecahkan konflik dan memperbaiki hubungan.</p>
          </div>
        </div>
        <div class="mt-4 rounded-5 btn text-white btn-pilih">Pilih paket</div>
      </div>
    </div>
    <div class="col-lg-6 p-2">
      <div class="box rounded-3 shadow p-3">
        <h5>Sesi Kelompok Relationship Mahasiswa</h5>
        <p class="text-secondary">Sesi konseling dalam kelompok dengan mahasiswa lain yang menghadapi masalah hubungan serupa.</p>
        <div class="d-flex align-items-center gap-2">
          <h1 class="lg m-0">Rp 60.000</h1>
          <p class="sm m-0">/ Peserta</p>
        </div>
        <div class="mt-4">
          <div class="d-flex align-items-center gap-2 mb-2">
            <img src="assets/img/pilih-paket/Frame 74.svg" alt="" />
            <p class="m-0">Durasi: 90 menit</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/img/pilih-paket/Frame 74.svg" alt="" />
            <p class="m-0">Diskusi terbuka dan berbagi pengalaman.</p>
          </div>
        </div>
        <div class="mt-4 rounded-5 btn text-white btn-pilih">Pilih paket</div>
      </div>
    </div>
  </div>
</div>

@include('../partials/footer') @endsection
