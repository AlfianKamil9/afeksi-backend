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
            src="assets/img/Download Mental Health Due To Psychology, Depression, Loneliness, Illness, Brain Development, or Hopelessness_ Psychotherapy And Mentality Healthcare (1) 2 (1).svg"
            class="img-fluid"
            alt="Image" />
        </div>
        <div class="col-md-5 d-flex flex-column">
        <img src="assets/img/logo.png" alt="Logo" class="img-fluid align-self-center" style="max-width: 130px" />
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
          <form method="POST" action="{{ route('login') }}"> 
            @csrf
            <div class="mb-4">
              <input
                type="email"
                name="email"
                class="form-control border-dark rounded-0 px-2 py-3"
                id="email"
                placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mb-4">
              <input
                type="password"
                name="password"
                class="form-control border-dark rounded-0 px-2 py-3"
                id="password"
                placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mb-3 text-end">
              <a href="{{ route("sendForgotPassword") }}" class="link-secondary text-decoration-none"
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
