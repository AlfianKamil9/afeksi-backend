@extends('../layout')

@section('title', 'Login')

<!-- @include('partials/navbar') -->

@section('content')
<div class="container p-5">
      <div class="mt-4">
        <a href="#">Kembali ke halaman homepage</a>
      </div>
      <div class="row align-items-center justify-content-around">
        <div class="col-md-5">
          <img
            src="{{ asset('storage/assets/img/loginregis.svg') }}"
            class="img-fluid"
            alt="Image" />
        </div>
        <div class="col-md-5 d-flex flex-column">
        <img src="{{ asset('storage/assets/img/logo.png') }}" alt="Logo" class="img-fluid align-self-center" style="max-width: 130px" />
          <form>
            <div class="mb-4">
              <input
                type="email"
                class="form-control border-dark rounded-0 px-2 py-3"
                id="email"
                placeholder="Email" />
            </div>
            <div class="mb-4">
              <input
                type="password"
                class="form-control border-dark rounded-0 px-2 py-3"
                id="password"
                placeholder="Password" />
            </div>
            <div class="mb-3 text-end">
              <a href="#" class="link-secondary text-decoration-none"
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
              <button type="submit" class="btn fw-semibold mb-2">
                <img src="assets/img/google.png" alt="" /> Sign in with Google
              </button>
              <a type="button" href="/register" class="btn fw-semibold">Signup Now</a>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
