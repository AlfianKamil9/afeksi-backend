@extends('../layout')

@section('title', 'Artikel')

@section('styles')
    <link rel="stylesheet" href="assets/css/artikel.css">
@endsection


@include('../partials/navbar') 

@section('content')


<div class="contents row">
      <h1 style="color: #233dff">Article</h1>
      <div class="side col-lg-3 col-md-4 mb-5">
        <div class="form-group">
          <p class="side-heading fw-semibold">Filter</p>
          <div class="input-group password-container form-group">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append button">
                  <button class="btn rounded-0 rounded-end-2 bg-body-secondary" type="button"><img class="password-icon" src="assets/img/kegiatan/material-symbols_search.png" alt=""></button>
              </div>
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
            <label class="form-check-label" for="selfLoveCheckbox"> Kesetaraan </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Kesehatan </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Family Issue </label>
          </div>
        </div>

        <hr class="mt-4" />

        <div class="d-flex flex-column mt-4">
          <div class="btn side-btn">Terapkan Filter</div>
          <div class="btn side-btn btn-outline">Hapus Filter</div>
        </div>
      </div>

      <div class="content col-lg-9 col-md-8">
        <div class="d-flex flex-column align-content-center justify-content-center">
          <div class="article-card row px-3 py-5 rounded-4 gap-3 gap-lg-0 mb-4">
            <img class="col-lg-5" src="assets/img/article/cardImg.png" alt="" />
            <div class="article-content d-flex flex-column col-lg-7">
              <h3 class="fw-bold m-0" style="color: #233dff">Lorem Ipsum</h3>
              <p class="m-0">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu fermentum ipsum, eget eleifend odio. Aliquam lacinia congue
                risus sed pharetra. Integer a ante nec nunc semper dictum. Sed ultrices sagittis leo a posuere. Donec eu eros accumsan, sagittis nisl
                eget, volutpat justo.
              </p>
              <span class="text-secondary">15 Agustus 2023</span>
              <div class="btn card-btn px-3 align-self-end">Selengkapnya</div>
            </div>
          </div>
          <div class="article-card row px-3 py-5 rounded-4 gap-3 gap-lg-0">
            <img class="col-lg-5" src="assets/img/article/cardImg.png" alt="" />
            <div class="article-content d-flex flex-column col-lg-7">
              <h3 class="fw-bold m-0" style="color: #233dff">Lorem Ipsum</h3>
              <p class="m-0">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu fermentum ipsum, eget eleifend odio. Aliquam lacinia congue
                risus sed pharetra. Integer a ante nec nunc semper dictum. Sed ultrices sagittis leo a posuere. Donec eu eros accumsan, sagittis nisl
                eget, volutpat justo.
              </p>
              <span class="text-secondary">15 Agustus 2023</span>
              <div class="btn card-btn px-3 align-self-end">Selengkapnya</div>
            </div>
          </div>
        </div>
      </div>
    </div>

@include('../partials/footer') 
@endsection

