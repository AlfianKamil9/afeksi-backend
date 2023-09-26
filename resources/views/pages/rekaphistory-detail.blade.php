@extends('../layout')
@section('title', 'Rekap History')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
<link rel="stylesheet" href="assets/css/rekaphistory-detail.css" />
@endsection

@include('../partials/navbar')

@section('content')
<div class="container main-image px-lg-5">
    <div style="padding-top:150px;"></div>
    <div class="row">
        <div class="col col-lg-12 mb-4">
            <h4 class="fw-bold mb-4">Embracing Equality: A Pathway to Dissolve Dating Violence</h4>
            <img src="assets/img/rekap-history/main-img.png" alt="" />
        </div>
    </div>
</div>

<!-- KONTENT -->
<div class="container px-lg-5">
    <!-- PROFIL PEMBACA -->
    <div class="row profil-pembaca">
        <div class="col-lg-8">
            <h5 class="fw-bold mb-3">Profil Pembicara</h5>
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="assets/img/rekap-history/people.svg" alt="Foto Profil Pembaca" />
                </div>
                <div class="flex-grow-1 ms-3 mt-4 mb-5">
                    <h6 class="fw-bold">Christy Ms</h6>
                    <p class="text-muted mb-0">Growth Mindset and Relationship Mentor</p>
                </div>
            </div>
            <div class="d-flex mt-lg-3 mt-0">
                <div class="flex-shrink-0">
                    <img src="assets/img/rekap-history/people.svg" alt="Foto Profil Pembaca" />
                </div>
                <div class="flex-grow-1 ms-3 mt-4 mb-5">
                    <h6 class="fw-bold">Eini Neinggolan</h6>
                    <p class="text-muted mb-0">Sadar Sejak Dini Indonesia</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <p style="text-align: justify">
                Kalian tau gak sih apa itu equality? Ternyata hal itu bakal pengaruh banget loh sama dating relationship😯 Buat
                temen-temen yang sekarang sedang dalam hubungan dengan seseorang, dan ingin meningkatkan kualitas hubungan
                kalian, wajib banget tau tentang equality dan hubungannya dengan dating violence! Kalian bisa dapetin insightnya
                di Afeksi Webinar Series 2.0 yang mengusung tema ✨Embracing Equality: A Pathway to Dissolve Dating Violence✨
            </p>
        </div>
    </div>
    <!-- DETAIL KEGIATAN -->
    <div class="row kegiatan">
        <div class="col-lg-8">
            <h5 class="fw-bold mb-3">Detail Kegiatan</h5>
            <p class="text-muted">Webinar ini akan dilaksanakan pada :</p>
            <ul class="list-unstyled m-1 text-muted">
                <li class="mb-2 gap-3">
                    <img src="assets/img/rekap-history/kalender.svg" width="21" height="23" alt="Tanggal Kegiatan" />
                    Minggu, 12 Februari 2023
                </li>
                <li class="mb-2"><img src="assets/img/rekap-history/location.svg" width="21" height="23"
                        alt="Lokasi Kegiatan" /> Online Via Zoom
                </li>
                <li class="mb-2"><img src="assets/img/rekap-history/time.svg" width="21" height="23"
                        alt="Waktu Kegiatan" /> 09.30 - 12.30 WIB
                </li>
                <li class="mb-2"><img src="assets/img/rekap-history/time.svg" width="21" height="23"
                        alt="Waktu Kegiatan" /> Jumlah Peserta 300
                </li>
            </ul>
        </div>
    </div>
    <!-- BENEFITS -->
    <div class="row mt-3 mb-5 benefits">
        <div class="col-lg-8">
            <h5 class="fw-bold mb-3">Benefit Kegiatan</h5>
            <p class="text-muted">Keuntungan yang kamu dapetin</p>
            <ul class="list-unstyled m-1 text-muted">
                <li class="mb-1"><img src="assets/img/rekap-history/certificate.svg" alt="E-Certificate" />
                    E-Certificate</li>
                <li class="mb-1"><img src="assets/img/rekap-history/softcopy.svg" alt="SoftCopy" /> Softcopy Material
                </li>
                <li class="mb-1"><img src="assets/img/rekap-history/knowledge.svg" alt="Knowledge" /> Knowledge</li>
                <li class="mb-1"><img src="assets/img/rekap-history/doorprize.svg" alt="Doorprize" /> Doorprize</li>
                <li class="mb-1"><img src="assets/img/rekap-history/diskusi.svg" alt="Diskusi" /> Diskusi</li>
            </ul>
        </div>
    </div>
</div>

@include('../partials/footer')
@endsection
