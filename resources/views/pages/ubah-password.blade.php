@extends('../layout')

@section('title', 'Ubah Password | AFEKSI')

@section('styles')
    <link rel="stylesheet" href="/assets/css/ubah-password.css">
@endsection

{{-- @include('../partials/navbar')  --}}

@section('content')
<section id="ubah-password">
    <div class="bg">
        <div class="wrapper p-5 ">
           <h3 class="text-center fw-semibold">Ubah Password</h3>
           <p class="text-center">Buat Password baru untuk akun anda</p>
           <div class="mb-3">
            <label for="password-lama" class="col-form-label fw-semibold">Masukan password lama anda</label>
            <input type="password" placeholder="Masukan Password" class="form-control" id="password-lama">
          </div>
           <div class="mb-3">
            <label for="password" class="col-form-label fw-semibold">Password Baru anda</label>
            <input type="password" placeholder="Masukan Password" class="form-control" id="password">
          </div>
           <div class="mb-3">
            <label for="konfirmasi-password" class="col-form-label fw-semibold">Konfirmasi Password Baru</label>
            <input type="password" placeholder="Masukan Password" class="form-control" id="konfirmasi-password">
          </div>
          <button class="btn btn-primary w-100 mt-3 mb-3 button-submit">Ubah Password</button>
          <a href="" class="btnKembali">Kembali</a>
        </div>        
    </div>
  </section>

  <section class="pt-5 mt-5">
    <div  class="pt-5">
      @include('../partials/footer') 
    </div>
  </section>
  @endsection
  