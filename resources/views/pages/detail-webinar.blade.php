@extends('../layout')

@section('title')
    {{ $data->title_event }} | AFEKSI
@endsection

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-kegiatan.css') }}">
@endsection

{{-- @include('../partials/navbar')  --}}

@section('content')
    {{-- Header --}}
    <div class="hero webinar" style="background-image: url(../assets/img/kegiatan/Banner.svg)">
        <div class="d-flex justify-content-between flex-column flex-lg-row gap-5 text-center text-lg-start">
            <div class="left col-lg-8">
                <div class="d-flex dflex gap-2 text-white ">
                    <p>Kegiatan</p>
                    <p><img src="{{ asset('assets/img/kegiatan/Vector (6).png') }}" class="img-fluid" alt="" /></p>
                    <p><a href="{{ route("webinar") }}" class="text-light">Webinar</a></p>
                    <p><img src="{{ asset('assets/img/kegiatan/Vector (6).png') }}" class="img-fluid" alt="" /></p>
                    <p><a href="/kegiatan-webinar/{{ $data->slug_event  }}" class="text-light">{{ $data->title_event }}</a></p>
                </div>
                <div class="text text-white mt-5">
                    <h1 class="mb-4">{{ $data->title_event }}</h1>
                    <p>
                    Jangan lewatkan kesempatan untuk belajar dari para ahli, mendapatkan wawasan baru, dan berinteraksi dengan orang-orang lain yang memiliki minat yang sama. Bersama-sama, mari kita bangun hubungan yang lebih mendalam, intim, dan
                    penuh makna!
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Cover Webinar --}}
    <div class="card-daftar col-lg-3">
        <div class="card border-0 rounded-4 shadow">
            <img src="{{ asset('/assets/img/kegiatan/'.$data->cover_event) }}" class="card-img-top" alt="{{ $data->title_event }}" />
            <div class="card-body">
                <h4 class="card-title fw-bold mb-4" style="color: #2139f9">
                    @if ($data->pay_category_event != "FREE")
                        Rp{{ number_format($data->price_event, 0, ',', '.') }}
                    @else
                        Gratis
                    @endif
                </h4>
                <form>
                    <div class="d-grid gap-2">
                        <a href="#" class="btn text-white btn-daftar" type="button" style="background-color: #2139f9">Daftar Sekarang</a>
                    </div>
                </form>
                <h6 class="fw-bold mt-3">Keuntungan yang kamu dapetin:</h6>
                <ul class="custom-list list-unstyled m-1 text-muted">
                    <li class="mb-1 gap-3"><img src="{{ asset('assets/img/kegiatan-detail-webinar/certificate.svg') }}" alt="E-Certificate" /> E-Certificate</li>
                    <li class="mb-1"><img src="{{ asset('assets/img/kegiatan-detail-webinar/softcopy.svg') }}" alt="SoftCopy" /> Softcopy Material</li>
                    <li class="mb-1"><img src="{{ asset('assets/img/kegiatan-detail-webinar/knowledge.svg') }}" alt="Knowledge" /> Knowledge</li>
                    <li class="mb-1"><img src="{{ asset('assets/img/kegiatan-detail-webinar/doorprize.svg') }}" alt="Doorprize" /> Doorprize</li>
                    <li class="mb-1"><img src="{{ asset('assets/img/kegiatan-detail-webinar/diskusi.svg') }}" alt="Diskusi" /> Diskusi</li>
                </ul>
                <h6 class="fw-bold mt-3">Bahasa Pengantar</h6>
                <p class="text-muted">Bahasa Indonesia</p>
            </div>
        </div>
    </div>

    <!-- Tab Bar -->
    <div class="container">
        <div class="d-flex flex-row mb-3">
            <div class="p-2"><a href="#deskripsi">Deskripsi</a></div>
            <div class="p-2"><a href="#detail-kegiatan" class="text-muted">Detail Kegiatan</a></div>
            <div class="p-2"><a href="#cara-mengikuti" class="text-muted">Cara Mengikuti Webinar</a></div>
            <div class="p-2"><a href="#profil-pembicara" class="text-muted">Profil Pembicara</a></div>
        </div>
    </div>
    <!-- End Tab Bar -->
    <hr class="mt-4" />

    <div class="container">
        <!-- DESKRIPSI -->
        <div class="row" id="deskripsi">
            <div class="col-lg-8">
                <h5 class="fw-bold">Deskripsi</h5>
                <p style="text-align: justify">
                    {!! $data->description_event !!}
                </p>
            </div>
        </div>

        <!-- PROFIL PEMBICARA -->
        <div class="row" id="profil-pembicara">
            <div class="col-lg-8">
<<<<<<< HEAD
            <h5 class="fw-bold mt-3 mb-3">Profil Pembicara</h5>
            <?php $i = 1; ?>
            @foreach ($data->webinar_session as $item)
                @if ($data->webinar_session->count() > 1)
                    <h6 class="text-secondary"> <span class="fw-bold text-dark">Materi {{ $i++ }} :</span> {{ $item->title_sesi }}</h6>    
                @endif
=======
            <h5 class="fw-bold mb-3">Profil Pembicara</h5>
            @foreach ($data->webinar_session as $psikolog)
>>>>>>> 8b1f588bf8c9fe21e40656918f3d635a06c8b85d
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="{{ asset('assets/img/kegiatan-detail-webinar/people.svg') }}" alt="Foto Profil Pembaca" />
                </div>
                <div class="flex-grow-1 ms-3 mb-5">
<<<<<<< HEAD
                    <h6 class="fw-bold">{{ $item->pembicara->nama_psikolog }}</h6>
                    <p class="text-muted mb-0">{{ $item->pembicara->profil }}</p>
{{-- =======
                    <h6 class="fw-bold">{{ $data->webinar_session->pembicara->nama_psikolog }}</h6>
                    <p class="text-muted mb-0">{{ $data->webinar_session->pembicara->profil }}</p>
>>>>>>> 4025f3ba2600f01aa15784aa4670cfd14aa5076e --}}
                    <p class="text-muted mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab magni expedita quam voluptate suscipit commodi?</p>
                    {{-- <p class="fw-bold">Materi : {{ $item->title_sesi }}</p> --}}
=======
                    <h6 class="fw-bold">{{ $psikolog->pembicara->nama_psikolog }}</h6>
                    <p class="text-muted mb-0">{{ $psikolog->pembicara->profil }}</p>
                    <p class="text-muted mb-0">{{ $psikolog->pembicara->deskripsi }}</p>
>>>>>>> 8b1f588bf8c9fe21e40656918f3d635a06c8b85d
                </div>
            </div>
            @endforeach
            </div>
        </div>

        <!-- DETAIL KEGIATAN -->
        <div class="row" id="detail-kegiatan">
            <div class="col-lg-8">
                <h5 class="fw-bold mb-3">Detail Kegiatan</h5>
                <p>Webinar ini akan dilaksanakan pada :</p>
                <ul class="custom-list list-unstyled m-1 text-muted">
                    <li class="mb-2 gap-3"><img src="{{ asset('assets/img/kegiatan-detail-webinar/kalender.svg') }}" width="21" height="23" alt="Tanggal Kegiatan" /> {{ $data->date_event }}</li>
                    <li class="mb-2"><img src="{{ asset('assets/img/kegiatan-detail-webinar/location.svg') }}" width="21" height="23" alt="Lokasi Kegiatan" />
                    @if ( $data->time_category_event != "ONLINE")
                    Offline Di {{ $data->is_place }}
                    @else
                    Online Via {{ $data->is_place }} </li>
                    @endif
                    <li class="mb-2"><img src="{{ asset('assets/img/kegiatan-detail-webinar/time.svg') }}" width="21" height="23" alt="Waktu Kegiatan" /> {{ $data->time_start }} - {{ $data->time_finish }} WIB</li>
                </ul>
            </div>
        </div>

        <!-- CARA MENGIKUTI WEBINAR -->
        <div class="row mt-5 mb-5" id="cara-mengikuti">
            <div class="col-lg-8">
            <h5 class="fw-bold mb-3">Cara Mengikuti Webinar</h5>
            <ol class="list-daftar-webinar">
                <li class="mb-1">Daftar dan akses webinar di Afeksi melalui situs resmi.</li>
                <li class="mb-1">Daftar dan akses webinar di Afeksi melalui situs resmi.</li>
                <li class="mb-1">Daftar dan akses webinar di Afeksi melalui situs resmi.</li>
                <li class="mb-1">Daftar dan akses webinar di Afeksi melalui situs resmi.</li>
            </ol>
            </div>
        </div>
    </div>

@include('../partials/footer')

@endsection
