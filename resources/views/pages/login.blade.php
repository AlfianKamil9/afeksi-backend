@extends('../layout')

@section('title', 'Login')

<!-- @include('partials/navbar') -->

@section('styles')
    <link rel="stylesheet" href="assets/css/loginregis.css">
@endsection


@section('content')
<<<<<<< HEAD
<div class="container p-5">
      <div class="mt-4">
        <a href="/">Kembali ke halaman homepage</a>
      </div>
      <div class="row align-items-center justify-content-around">
        <div class="col-md-5">
          <img
            src="/assets/img/loginregis.svg"
            class="img-fluid"
            alt="Image" />
        </div>
        <div class="col-md-5 d-flex flex-column">
        <img src="assets/img/logo.png" alt="Logo" class="img-fluid align-self-center" style="max-width: 130px" />
        <!-- Session Status -->
        <x-auth-session-status class="mb-4 fst-italic text-success" :status="session('status')" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 fst-italic text-danger" style="font-size: 14px" />
        {{-- <x-input-error :messages="$errors->get('password')" class="mt-2 fst-italic text-danger" style="font-size: 14px" /> --}}
          <form method="POST" action="{{ route('login') }}"> 
            @csrf
          <form>
            <div class="mb-4">
              <input
                type="email"
                name="email"
                class="form-control border-dark rounded-0 px-2 py-3"
                id="email"
                value="{{ old('email') }}"
                placeholder="Email" required />
            </div>
            <div class="mb-4">
              <input
                type="password"
                name="password"
                class="form-control border-dark rounded-0 px-2 py-3"
                id="password"
                placeholder="Password" required/>
            </div>
            <div class="mb-3 text-end">
              <a href="{{ route('password.request') }}" class="link-secondary text-decoration-none"
                >Forgot password?</a
              >
            </div>
            <div class="d-flex flex-column mt-auto">
              <button
                style="background: #d2e122"
                type="submit"
                class="btn btn-success fw-semibold mb-2 py-3 rounded-4 w-75 align-self-center border-0 text-dark">
                Login
              </button>
              <a href="{{ route('auth.google') }}" type="btn" class="btn fw-semibold mb-2">
                <img src="assets/img/google.png" alt="" /> Sign in with Google
              </a>

              <a href="{{ route('register') }}" class="btn fw-semibold text-decoration-none">Signup Now</a>

            </div>
          </form>
        </div>
=======
<div class="container-md pt-5 mt-5 px-4">
    <div class="row align-items-center justify-content-center gap-2">
      <!-- Left Column -->
      <div class="col-md-5 d-none d-md-inline">
        <img src="assets/img/loginImg.svg" class="img-fluid align-self-center" alt="Image">
        <div class="heading text-center mt-5">
          <h3 class="fw-semibold">Selamat Datang, Heroes!</h3>
          <p class="text-secondary">Bercerita & berbagi rasa. Tenangkan hati & tenangkan diri.</p>
        </div>
      </div>
      <!-- Right Column -->
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
            <button type="submit" class="btn mb-2 fw-semibold">Masuk</button>
            <div class="formSmText mb-2">
              <div class="horizontal-line"></div>
              <span class="mx-3 text-muted">Atau Masuk Dengan</span>
              <div class="horizontal-line"></div>
            </div>
            <button type="submit" class="btn btn-transparent mb-2 fw-semibold d-flex align-items-center justify-content-center">
              <img src="assets/img/Google.png" alt=""><span class="mx-3">Masuk dengan Google</span>
            </button>
            <div class="formSmText">
              <p class="text-muted">Belum punya akun? <a href="">Daftar sekarang</a></p>
            </div>
          </div>
        </form>
>>>>>>> 073a489258bbd306b1e804c62c29490562f3fca4
      </div>
    </div>
  </div>

  <script>
    const passwordInput = document.getElementById("passwordInput");
    const passwordIcon = document.querySelector(".password-icon");

    passwordIcon.addEventListener("click", () => {
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);
      passwordIcon.classList.toggle("fa-eye");
      passwordIcon.classList.toggle("fa-eye-slash");
    });
  </script>
@endsection
