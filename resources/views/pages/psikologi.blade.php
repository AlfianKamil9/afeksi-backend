@extends('../layout') @section('title', 'Campagin')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
<link rel="stylesheet" href="assets/css/psikolog-konselor.css" />
@endsection @include('../partials/navbar') @section('content')
<div style="height:90px;"></div> <!-- for space-->
<div class="contents row">
      <h1 style="color: #233dff">Psikolog</h1>
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
          <p class="side-heading fw-semibold">Topik</p>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="relationship" id="relationshipCheckbox" />
            <label class="form-check-label" for="relationshipCheckbox"> Relationship </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="selfLove" id="selfLoveCheckbox" />
            <label class="form-check-label" for="selfLoveCheckbox"> Pendidikan </label>
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
        <div class="row d-flex">
          <div class="col-lg-6 p-2">
            <div class="card border-0">
              <div class="card-top d-flex align-items-center justify-content-between">
                <img src="assets/img/psikolog-konselor/Ellipse 1216.png" alt="" class="elips">
                <div class="stars">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                </div>
                <span>(500)</span>
              </div>
              <div class="person">
                <h5 class="m-0">Namaku Asep, S.Psi.,M.Psi</h5>
                <span>Sarjana Psikologi ITB</span>
              </div>
              <img src="assets/img/psikolog-konselor/Rectangle 816.png" alt="" class="main-img">
              <div class="btn side-btn">Terapkan Filter</div>
            </div>
          </div>
          <div class="col-lg-6 p-2">
            <div class="card border-0">
              <div class="card-top d-flex align-items-center justify-content-between">
                <img src="assets/img/psikolog-konselor/Ellipse 1216.png" alt="" class="elips">
                <div class="stars">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                </div>
                <span>(500)</span>
              </div>
              <div class="person">
                <h5 class="m-0">Namaku Asep, S.Psi.,M.Psi</h5>
                <span>Sarjana Psikologi ITB</span>
              </div>
              <img src="assets/img/psikolog-konselor/Rectangle 816.png" alt="" class="main-img">
              <div class="btn side-btn">Terapkan Filter</div>
            </div>
          </div>
          <div class="col-lg-6 p-2">
            <div class="card border-0">
              <div class="card-top d-flex align-items-center justify-content-between">
                <img src="assets/img/psikolog-konselor/Ellipse 1216.png" alt="" class="elips">
                <div class="stars">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                </div>
                <span>(500)</span>
              </div>
              <div class="person">
                <h5 class="m-0">Namaku Asep, S.Psi.,M.Psi</h5>
                <span>Sarjana Psikologi ITB</span>
              </div>
              <img src="assets/img/psikolog-konselor/Rectangle 816.png" alt="" class="main-img">
              <div class="btn side-btn">Terapkan Filter</div>
            </div>
          </div>
          <div class="col-lg-6 p-2">
            <div class="card border-0">
              <div class="card-top d-flex align-items-center justify-content-between">
                <img src="assets/img/psikolog-konselor/Ellipse 1216.png" alt="" class="elips">
                <div class="stars">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                  <img src="assets/img/psikolog-konselor/star.png" alt="" class="star">
                </div>
                <span>(500)</span>
              </div>
              <div class="person">
                <h5 class="m-0">Namaku Asep, S.Psi.,M.Psi</h5>
                <span>Sarjana Psikologi ITB</span>
              </div>
              <img src="assets/img/psikolog-konselor/Rectangle 816.png" alt="" class="main-img">
              <div class="btn side-btn">Terapkan Filter</div>
            </div>
          </div>
        </div>
      </div>
    </div>

@include('../partials/footer') @endsection
