@extends('../layout')

@section('title', 'Register')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
    <link rel="stylesheet" href="{{ asset('storage/assets/css/register.css') }}">
@endsection

@section('content')

    <div class="container p-5">
    <div class="mt-4">
        <a href="#">Kembali ke halaman homepage</a>
      </div>
      <div class="row">
        <div class="p-5 col-sm-6 text-center d-none d-sm-block">
          <img src="{{ asset('storage/assets/img/loginregis.svg') }}" alt="Image" class="img-fluid" />
        </div>

        <div class="p-5 col-sm-6">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="text-center mb-4">
              <img src="{{ asset('storage/assets/img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 130px" />
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
            <div class="d-grid gap-2 col-8 col-sm-10 mx-auto custom-button">
              <button type="submit" class="btn rounded-4 fw-semibold">Signup Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
