@extends('../layout') @section('title', 'Rekap History')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
<link rel="stylesheet" href="assets/css/rekaphistory.css" />
@endsection @include('../partials/navbar') @section('content')


<div class="hero" style="background-image: url(assets/img/kegiatan/Banner.svg)">
      <div class="py-5"></div>
      <div class="d-flex justify-content-between flex-column flex-lg-row gap-5 text-center text-lg-start">
        <div class="left col-lg-6">
        <div class="bread-crumbs d-flex gap-2 fw-semibold text-white">
                <p>Kegiatan</p>
                <span>&gt;</span>
                <p>Rekap History</p>
            </div>
          <div class="text text-white mt-5">
            <h1 class="mb-4" >Temukan beragam webinar menarik dan bermanfaat dari Afeksi</h1>
            <p>
              Jangan lewatkan kesempatan untuk belajar dari para ahli, mendapatkan wawasan baru, dan berinteraksi dengan orang-orang lain yang
              memiliki minat yang sama. Bersama-sama, mari kita bangun hubungan yang lebih mendalam, intim, dan penuh makna!
            </p>
          </div>
        </div>
        <div class="right col-lg-6 ">
          <img src="assets/img/kegiatan/Hero.svg" />
        </div>
      </div>
    </div>

    <div class="contents row">
      <div class="side col-lg-3 col-md-4 mb-5">
        <div class="form-group">
          <p class="side-heading fw-semibold">Filter</p>
          <div class="password-container">
            <input type="text" class="form-control" placeholder="Search" />
            <img class="password-icon" src="assets/img/kegiatan/material-symbols_search.png" alt="" />
          </div>
        </div>

        <hr class="mt-4" />

        <div class="form-group">
          <p class="side-heading fw-semibold">Urutkan</p>
          <select class="form-select" aria-label="Default select example">
            <option selected>Terbaru</option>
            <option value="2">Terlama</option>
          </select>
        </div>

        <hr class="mt-4" />

        <div class="form-group">
          <div class="d-flex justify-content-between">
            <p class="side-heading fw-semibold">Harga</p>
            <!-- <p><img style="height: 22px; margin-right: 9px;" src="assets/img/kegiatan/keyboard_arrow_up.png" alt=""></p> -->
          </div>

          <div class="d-flex align-items-center">
            <div class="p-2 bg-body-secondary rounded-start-2">
              <label for="inputRp" style="font-size: 14px">Rp</label>
            </div>
            <input type="text" class="form-control rounded-0 rounded-end-2" id="inputRp" placeholder="Harga Maksimum" />
          </div>

          <div class="mt-3 d-flex align-items-center">
            <div class="p-2 bg-body-secondary rounded-start-2">
              <label for="inputRp" style="font-size: 14px">Rp</label>
            </div>
            <input type="text" class="form-control rounded-0 rounded-end-2" id="inputRp" placeholder="Harga Minimum" />
          </div>
        </div>

        <hr class="mt-4" />

        <div class="form-group">
          <p class="side-heading fw-semibold">Topik</p>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="relationship" id="relationshipCheckbox" />
            <label class="form-check-label" for="relationshipCheckbox"> Relationship </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Self Love </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Parenting </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Pre-Marriage </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Emotional Management </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Family Issue </label>
          </div>
        </div>

        <hr class="mt-4" />

        <div class="form-group">
          <p class="side-heading fw-semibold">Kategori</p>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="relationship" id="relationshipCheckbox" />
            <label class="form-check-label" for="relationshipCheckbox"> Offline </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Online </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Gratis </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Berbayar </label>
          </div>
        </div>

        <div class="d-flex flex-column mt-4">
          <div class="btn side-btn">Terapkan Filter</div>
          <div class="btn side-btn btn-outline">Hapus Filter</div>
        </div>
      </div>

      <div class="content col-md-8 ms-lg-4">
        <div class="row d-flex">
          <div class="col my-2 box shadow rounded-4 d-flex flex-md-row flex-column p-5 gap-5 align-items-center">
            <div class="left d-flex flex-column gap-1">
              <img src="assets/img/rekaphistory/Image.png" alt="" />
              <span class="date text-secondary">Minggu, 12 February</span>
              <div class="bio py-2 d-flex align-content-center gap-2">
                <img src="assets/img/kegiatan/Ellipse 216.png" alt="" />
                <div class="nama d-flex flex-column">
                  <p>Heraldha Savira, Dip. ABRSM, S.Psi</p>
                  <span>Clinical Physcology Grads</span>
                </div>
              </div>
            </div>
            <div class="right pe-md-5 ps-md-3">
              <h5>Self-love: A Rroad to Relationship Goals</h5>
              <p class="my-3">
                Webinar Series 1.0 yang bertajuk “Self-love: A Road to Relationship Goals” membahas mengenai pentingnya  belajar mencintai, menerima,
                menghormati, dan mengenali diri sendiri, sebelum mencintai orang lain.,,,,,
              </p>
              <div class="btn side-btn d-inline">Selengkapnya</div>
            </div>
          </div>
          <div class="col my-2 box shadow rounded-4 d-flex flex-md-row flex-column p-5 gap-5 align-items-center">
            <div class="left d-flex flex-column gap-1">
              <img src="assets/img/rekaphistory/Image (1).png" alt="" />
              <span class="date text-secondary">25 juli 2023</span>
              <div class="bio py-2 d-flex align-content-center gap-2">
                <img src="assets/img/kegiatan/Ellipse 216.png" alt="" />
                <div class="nama d-flex flex-column">
                  <p>Christy MS</p>
                  <span>Growth Mindset and Relationship Mentor</span>
                </div>
              </div>
              <div class="bio py-2 d-flex align-content-center gap-2">
                <img src="assets/img/kegiatan/Ellipse 216.png" alt="" />
                <div class="nama d-flex flex-column">
                  <p>Eini Neinggolan</p>
                  <span>Sadar Sejak Dini Indonesia</span>
                </div>
              </div>
            </div>
            <div class="right pe-md-5 ps-md-3">
              <h5>Embracing Equality: A Pathway to Dissolve Dating Violence</h5>
              <p class="my-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu fermentum ipsum, eget eleifend odio. Aliquam lacinia congue risus sed pharetra. Integer a ante nec nunc semper dictum. Sed ultrices sagittis leo a posuere. Donec eu eros accumsan, sagittis nisl eget, volutpat justo. 
              </p>
              <div class="btn side-btn d-inline">Selengkapnya</div>
            </div>
          </div>

        </div>
      </div>
    </div>

@include('../partials/footer') @endsection
