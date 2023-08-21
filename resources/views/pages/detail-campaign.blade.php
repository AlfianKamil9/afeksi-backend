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

<div class="hero campaign mt-5" style="background-image: url(../assets/img/kegiatan/Banner.svg)" style="padding-top:94px;">
      <div class="d-flex justify-content-between flex-column flex-lg-row gap-5 text-center text-lg-start">
        <div class="left col-lg-8">
          <div class="d-flex dflex gap-2 text-white ">
            <p>Kegiatan</p>
            <p><img src="{{ asset('assets/img/kegiatan/Vector (6).png') }}" class="img-fluid" alt="" /></p>
            <p><a href="{{ route("campaign") }}" class="text-light">Campaign</a></p>
            <p><img src="{{ asset('assets/img/kegiatan/Vector (6).png') }}" class="img-fluid" alt="" /></p>
            <p><a href="/kegiatan-campaign/{{ $data->slug_event  }}" class="text-light">{{ $data->title_event }}</a></p>
          </div>
          <div class="text text-white mt-5">
            <h1 class="mb-4">{{ $data->title_event }}</h1>
            <p>Bersama-sama, mari kita belajar, berbagi, dan tumbuh dalam kualitas hubungan kita, agar hidup kita dipenuhi dengan cinta, kebahagiaan, dan kedamaian batin.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="card-daftar-campaign col-lg-3">
      <div class="card border-0 rounded-4 shadow">
        {{-- <img src="{{ Storage::url($data->cover_event) }}" class="card-img-top" alt="Hero " /> --}}
        <img src="{{ asset('/assets/img/kegiatan/'.$data->cover_event) }}" class="card-img-top" alt="Hero " />
        <div class="card-body">
          <h4 class="card-title fw-bold mb-4" style="color: #2139f9">
          @if ($data->pay_category_event != "FREE")
              Rp{{ number_format($data->price_event, 0, ',', '.') }}
          @else
            Gratis
          @endif</h4>
          <form>
          <div class="d-grid gap-2">
            <a href="#" class="btn text-white btn-daftar" type="button" style="background-color: #2139f9">Daftar Sekarang</a>
          </div>
          </form>
          <h6 class="fw-bold mt-3">Keuntungan yang kamu dapetin:</h6>
          <ul class="custom-list list-unstyled m-1 text-muted">
            <li class="mb-1 gap-3"><img src="{{ asset('assets/img/kegiatan-detail-webinar/certificate.svg') }}" alt="E-Certificate" /> E-Certificate</li>
            <li class="mb-1"><img src="{{ asset('assets/img/kegiatan-detail-webinar/knowledge.svg') }}" alt="Knowledge" /> Knowledge</li>
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
        <div class="p-2"><a href="#cara-ikut-campaign" class="text-muted">Cara Mengikuti Campaign</a></div>
      </div>
    </div>
    <!-- End Tab Bar -->
    <hr class="mt-4" />

    <!-- DESKRIPSI -->
    <div class="container">
      <div class="row" id="deskripsi">
        <div class="col-lg-8">
          <h5 class="fw-bold mt-3">Deskripsi</h5>
          <p style="text-align: justify">
            {!! $data->description_event !!}
          </p>
        </div>
      </div>

      <!-- DETAIL KEGIATAN -->
      <div class="row mt-4" id="detail-kegiatan">
        <div class="col-lg-8">
          <h5 class="fw-bold mb-3">Detail Kegiatan</h5>
          <p>Campaign ini akan dilaksanakan pada :</p>
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
      <div class="row mt-4 mb-5" id="cara-ikut-campaign">
        <div class="col-lg-8">
          <h5 class="fw-bold mb-3">Cara Mengikuti Campaign</h5>
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
