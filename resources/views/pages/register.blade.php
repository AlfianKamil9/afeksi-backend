@extends('../layout')

@section('title', 'Register')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
    <link rel="stylesheet" href="assets/css/loginregis.css">
@endsection

@section('content')
<<<<<<< HEAD

    <div class="container p-5">
    <div class="mt-4">
        <a href="/">Kembali ke halaman homepage</a>
      </div>
      <div class="row">
        <div class="p-5 col-sm-6 text-center d-none d-sm-block">
          <img src="/assets/img/loginregis.svg" alt="Image" class="img-fluid" />
        </div>

        <div class="p-5 col-sm-6">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="text-center mb-4">
              <img src="/assets/img/logo.png" alt="Logo" class="img-fluid" style="max-width: 130px" />
            </div>
            @if ($errors->get('email'))
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger fst-italic" style="font-size:14px;" />
            @else
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger fst-italic" style="font-size:14px;" />
            @endif
            <div class="mb-4">
              <input type="text" name="name" class="form-control border-dark rounded-0 py-3 fw-medium" placeholder="Nama Lengkap" value="{{ old('name') }}" required />
            </div>
            <div class="mb-3">
              <input type="email" name="email" class="form-control border-dark rounded-0 py-3 fw-medium" placeholder="Email" value="{{ old('email') }}" required />
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control border-dark rounded-0 py-3" placeholder="Password" required />
            </div>
            <div class="mb-5">
              <input type="password" name="password_confirmation" class="form-control border-dark rounded-0 py-3" placeholder="Konfirmasi Password" required />
            </div>
             <div class="d-flex flex-column mt-auto">
              <button
                style="background: #d2e122"
                type="submit"
                class="btn btn-success fw-semibold mb-2 py-3 rounded-4 w-75 align-self-center border-0 text-dark">
                Sign Up
              </button>
             </div>
          </form>
        </div>
=======
<div class="container-md pt-5 mt-5 px-4">
    <div class="row align-items-center justify-content-center gap-2">
      <!-- Left Column -->
      <div class="col-md-5 d-none d-md-inline">
        <img src="assets/img/registerImg.svg" class="img-fluid align-self-center" alt="Image">
        <div class="heading text-center mt-5">
          <h3 class="fw-semibold">Selamat Datang, Heroes!</h3>
          <p class="text-secondary">Bercerita & berbagi rasa. Tenangkan hati & tenangkan diri.</p>
        </div>
      </div>
      <!-- Right Column -->
      <div class="col-md-5 d-flex flex-column">
        <div class="heading text-center">
          <h3 class="fw-semibold">Buat Akun Baru</h3>
          <p class="text-secondary">Silahkan isi data berikut untuk melanjutkan.</p>
        </div>
        <form>
          <div class="mb-2">
            <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
            <input type="text" class="form-control py-2 px-3" id="nama" placeholder="Masukkan Nama Lengkap">
          </div>
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
          <div class="mb-2">
            <label for="confirmPasswordInput" class="form-label fw-semibold">Konfirmasi Password</label>
            <div class="password-container">
              <input type="password" class="form-control" id="confirmPasswordInput" placeholder="Konfirmasi Password">
              <i class="password-icon fas fa-eye"></i>
            </div>
          </div>
          <div class="mb-2 text-end">
            <a href="#" class="text-decoration-none forgetPassBtn fw-semibold">Forgot password?</a>
          </div>
          <div class="d-flex flex-column mt-auto">
            <button type="submit" class="btn mb-2 fw-semibold">Daftar</button>
            <div class="formSmText mb-2">
              <div class="horizontal-line"></div>
              <span class="mx-3 text-muted">Atau Daftar Dengan</span>
              <div class="horizontal-line"></div>
            </div>
            <button type="submit" class="btn btn-transparent mb-2 fw-semibold d-flex align-items-center justify-content-center">
              <img src="assets/img/Google.png" alt=""><span class="mx-3">Daftar dengan Google</span>
            </button>
            <div class="formSmText">
              <p class="text-muted">Sudah punya akun? <a href="">Masuk sekarang</a></p>
            </div>
          </div>
        </form>
>>>>>>> 073a489258bbd306b1e804c62c29490562f3fca4
      </div>
    </div>
  </div>
@endsection
