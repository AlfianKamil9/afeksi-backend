@extends('../layout')

@section('title', 'lupa-password')

@section('styles')
    <link rel="stylesheet" href="assets/css/junior-psikolog.css">
@endsection
@section('styles')
    <link rel="stylesheet" href="assets/css/stepper.css">
@endsection


@include('../partials/navbar') 

@section('content')
<!-- Step -->
<div class="container">
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
        <div class="stepper-item active">
          <div class="step-counter">
            <span class="step-checkmark">4</span>
          </div>
          <div class="step-name">Data Diri</div>
        </div>
        <div class="stepper-item">
          <!--add class active to enable active step progess-->
          <div class="step-counter">
            <span class="step-checkmark">5</span>
          </div>
          <div class="step-name">Pembayaran</div>
        </div>
      </div>
    </div>
  </div>
<!-- End Step -->

<!-- content -->
<div class="container py-5">
<div class="junior-psikolog-wrapper row align-items-center px-5 mb-5">
    <div class="col-xl-6">
        <img class="psikolog-img" src="./assets/img/junior-psikolog-img.png" alt="">
    </div>
    <div class="col-xl-6 content-wrapper">
        <h3 class="fw-semibold">Psikolog Junior</h3>
        <p class="py-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button class="btn btn-primary btn-lg">Pilih</button>
    </div>
</div>
<div class="junior-psikolog-wrapper row align-items-center px-5 mb-5">
    <div class="col-xl-6">
        <img class="psikolog-img" src="./assets/img/junior-psikolog-img.png" alt="">
    </div>
    <div class="col-xl-6 content-wrapper">
        <h3 class="fw-semibold">Psikolog Senior</h3>
        <p class="py-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button class="btn btn-primary btn-lg">Pilih</button>
    </div>
</div>
</div>
@endsection

@include('../partials/footer') 