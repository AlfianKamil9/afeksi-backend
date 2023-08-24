@extends('../layout')

@section('title', 'junior psikolog')

@section('styles')
    <link rel="stylesheet" href="/assets/css/popinformasi.css">
    <link rel="stylesheet" href="/assets/css/stepper.css">
@endsection


{{-- @include('../partials/navbar')  --}}

@section('content')
<!-- Step -->
<div class="container" style="padding-top:calc(70px + 94px);">
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
        <div class="stepper-item completed">
          <div class="step-counter">
            <span class="step-checkmark">✓</span>
          </div>
          <div class="step-name">Pilih Paket</div>
        </div>
        <div class="stepper-item completed">
          <div class="step-counter">
            <span class="step-checkmark">✓</span>
          </div>
          <div class="step-name">Pilih Psikolog</div>
        </div>
        <div class="stepper-item completed">
          <div class="step-counter">
            <span class="step-checkmark">✓</span>
          </div>
          <div class="step-name">Data Diri</div>
        </div>
        <div class="stepper-item completed">
          <!--add class active to enable active step progess-->
          <div class="step-counter">
            <span class="step-checkmark">✓</span>
          </div>
          <div class="step-name">Pembayaran</div>
        </div>
      </div>
    </div>
  </div>
<!-- End Step -->

<div class="pop-up">
  <div class="row justify-content-center rounded-4 shadow-lg mt-5 mb-3 p-5">
    <div class="col-lg-8 col-md-8 col-sm p-2 d-flex flex-column justify-content-center align-items-center">
      <img src="/assets/img/page-informasi-new/Finish.png" alt="finish" class="img-fluid w-75" />

      <h5 class="mt-3 fw-bold">
        Terima kasih telah mendaftar konsultasi <br />
        Kami akan mengingatkan Anda H-1 dari jadwal yang sudah dipilih
      </h5>

      <a href="{{ route('homepage') }}" class="mt-4 btn-kembali">
        Kembali Ke Halaman Utama ➡
      </a>
    </div>
  </div>
</div>

@include('sweetalert::alert')
@include('../partials/footer') 
@endsection

