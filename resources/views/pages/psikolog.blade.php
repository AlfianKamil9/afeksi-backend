@extends('../layout')

@section('title', 'Login')

@section('styles')
    <link rel="stylesheet" href="assets/css/psikolog-page.css">
@endsection

@section('content')
    <section id="psikologi" class="py-5">
        <div class="container">
            <div class="form-container">
                <label class="text-medium" for="">Masalah yang dihadapi</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-masalah" placeholder="masukan masalah" aria-label="Username" aria-describedby="basic-addon1">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-arrow-right"></i></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card-container py-5">
                        <img src="https://placehold.co/300" alt="" class="psikolog-image">
                        <h3 class="text-center mt-3">Nama</h3>
                        <div class="rating-wrapper d-flex justify-content-center gap-2">
                            <h4 class="me-3">Rating</h4>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="profil">
                            <h4>Profil Singkat</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, nesciunt illum delectus temporibus quibusdam dignissimos iste laboriosam a exercitationem modi vel, quaerat facilis? Officiis facilis quos id laborum, iste dolores.</p>
                        </div>
                        <div class="keahlian">
                            <h3>Keahlian</h3>
                            <div class="keahlian-items">
                                <p>lorem</p>
                                <p>lorem</p>
                                <p>lorem</p>
                                <p>lorem</p>
                            </div>
                        </div>
                        <button class="button-konsultasi mx-auto">Jadwalkan Konsultasi</button>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card-container py-5">
                        <img src="https://placehold.co/300" alt="" class="psikolog-image">
                        <h3 class="text-center mt-3">Nama</h3>
                        <div class="rating-wrapper d-flex justify-content-center gap-2">
                            <h4 class="me-3">Rating</h4>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="profil">
                            <h4>Profil Singkat</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, nesciunt illum delectus temporibus quibusdam dignissimos iste laboriosam a exercitationem modi vel, quaerat facilis? Officiis facilis quos id laborum, iste dolores.</p>
                        </div>
                        <div class="keahlian">
                            <h3>Keahlian</h3>
                            <div class="keahlian-items">
                                <p>lorem</p>
                                <p>lorem</p>
                                <p>lorem</p>
                                <p>lorem</p>
                            </div>
                        </div>
                        <button class="button-konsultasi mx-auto">Jadwalkan Konsultasi</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('../partials.footer') 
@endsection