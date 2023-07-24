@extends('../layout')

@section('title', 'lupa-password')

@section('styles')
    <link rel="stylesheet" href="assets/css/lupa-password.css">
@endsection


@section('content')
<section id="lupa-password">
    <nav class="navbar w-100">
        <a class="navbar-brand ms-5 p-5" href="#">
            <img src="assets/img/logoafeksi.svg" alt="Logo" class="d-block w-50 ">
        </a>
    </nav>
    <div class="wrapper p-4 m-auto d-flex flex-column justify-content-center text-center">
        <h3 class="mb-3">Lupa Password</h3>
        <p>Masukkan alamat email yang kamu daftarkan dan kami akan mengirimkan link untuk membuat password baru.</p>
        <div class="input-container">
            <label class="mb-1" for="email">Email</label>
            <input type="email" placeholder="Masukkan Email">
            <button class="btn mt-4 mb-3">Reset Password</button>
            <a href="#" class="text-center">Kembali</a>
        </div>
    </div>
</section> 
