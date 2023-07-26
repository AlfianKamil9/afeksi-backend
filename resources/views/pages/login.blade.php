@extends('../layout')

@section('title', 'Login')

@section('styles')
    <link rel="stylesheet" href="assets/css/loginregis.css">
@endsection

@include('../partials/navbar') 

@section('content')
<div class="container-lg pt-5 mt-2 px-4">
    <div class="row align-items-center justify-content-center gap-2">
     
      <div class="col-md-5 d-none d-md-inline">
        <img src="assets/img/login-register/loginImg.svg" class="img-fluid align-self-center" alt="Image">
        <div class="heading text-center mt-5">
          <h3 class="fw-semibold">Selamat Datang, Heroes!</h3>
          <p class="text-secondary">Bercerita & berbagi rasa. Tenangkan hati & tenangkan diri.</p>
        </div>
      </div>
     
      <div class="col-md-5 d-flex flex-column">
        <div class="heading text-center">
          <h3 class="fw-semibold">Masuk ke Akun</h3>
          <p class="text-secondary">Silahkan masukkan informasi akun anda.</p>
        </div>
        <form>
          <div class="mb-2">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control py-2 px-3" id="email" placeholder="Masukkan Email">
          </div>
          <div class="mb-2">
            <label for="passwordInput" class="form-label fw-semibold">Password</label>
            <div class="password-container">
              <input type="password" class="form-control" id="passwordInput" placeholder="Masukkan Password">
              <i class="password-icon fas fa-eye"></i>
            </div>
          </div>
          <div class="mb-2 text-end">
            <a href="#" class="text-decoration-none forgetPassBtn fw-semibold">Forgot password?</a>
          </div>
          <div class="d-flex flex-column mt-auto">
            <button type="submit" class="btn form-btn mb-2 fw-semibold">Masuk</button>
            <div class="formSmText mb-2">
              <div class="horizontal-line"></div>
              <span class="mx-3 text-muted">Atau Masuk Dengan</span>
              <div class="horizontal-line"></div>
            </div>
            <button type="submit" class="btn form-btn btn-transparent mb-2 fw-semibold d-flex align-items-center justify-content-center">
              <img src="assets/img/login-register/Google.png" alt=""><span class="mx-3">Masuk dengan Google</span>
            </button>
            <div class="formSmText">
              <p class="text-muted">Belum punya akun? <a href="">Daftar sekarang</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  @section('script')
   <script src="assets/js/login-regis.js"></script>
  @endsection
@endsection
