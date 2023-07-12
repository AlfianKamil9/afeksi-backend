@extends('../layout')

@section('title', 'Register')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
    <link rel="stylesheet" href="assets/css/register.css">
@endsection

@section('content')

    <div class="container p-5">
    <div class="mt-4">
        <a href="#">Kembali ke halaman homepage</a>
      </div>
      <div class="row">
        <div class="p-5 col-sm-6 text-center d-none d-sm-block">
          <img src="assets/img/Download Mental Health Due To Psychology, Depression, Loneliness, Illness, Brain Development, or Hopelessness_ Psychotherapy And Mentality Healthcare (1) 2 (1).svg" alt="Image" class="img-fluid" />
        </div>

        <div class="p-5 col-sm-6">
          <form action="">
            <div class="text-center mb-4">
              <img src="assets/img/logo.png" alt="Logo" class="img-fluid" style="max-width: 130px" />
            </div>
            <div class="mb-4">
              <input type="text" class="form-control border-dark rounded-0 py-3" placeholder="Nama Lengkap" required />
            </div>
            <div class="mb-3">
              <input type="email" class="form-control border-dark rounded-0 py-3" placeholder="Email" required />
            </div>
            <div class="mb-3">
              <input type="password" class="form-control border-dark rounded-0 py-3" placeholder="Password" required />
            </div>
            <div class="mb-5">
              <input type="password" class="form-control border-dark rounded-0 py-3" placeholder="Konfirmasi Password" required />
            </div>
            <div class="d-grid gap-2 col-8 col-sm-10 mx-auto custom-button">
              <button type="submit" class="btn rounded-4 fw-semibold">Signup Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
