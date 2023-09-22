@extends('../layout') @section('title', 'Dashboard')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
<link rel="stylesheet" href="assets/css/dashboard.css" />
@endsection @include('../partials/navbar-new') @section('content')

<div class="row justify-content-end">
      <div class="col-12 position-relative">
        <!-- HERO
                ================================================================= -->
        <section>
          <div class="hero d-flex">
            <div class="container py-5 my-5">
              <div class="row justify-content-end">
                <div class="col-md-9 d-flex flex-column">
                  <h4 class="fw-semibold mt-5">
                    <span>Dashboard</span>
                  </h4>
                  <p class="fs-5 fw-light mt-3">
                    Bercerita dan Berbagi rasa. Tenangkan hati dan tenangkan diri.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Dashboard ============================== -->
        <div class="dashboard p-5">
          <div
            class="bg-light rounded-circle d-flex justify-content-center align-items-center"
            style="width: 125px; height: 125px"
          >
            <img
              src="assets/img/dashboard-profile/user.svg"
              width="50px"
              height="50px"
            ></img>
          </div>
          <div class="mt-3">
            <h6 class="fw-bold">Bimo Setyo</h6>
            <p>bimo82374@gmail.com</p>
          </div>
          <div class="mb-4 mt-5 p-2 active">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/dashboardblue.png"
                class="me-3"
                width="20"
                height="20"
              ></img
              >Dashboard</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/user.png"
                class="me-3"
                width="20"
                height="20"
              ></img
              >Profile</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/voucher.svg"
                width="20"
                height="20"
                class="me-3"
            ></img>Voucher</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/e-book.svg"
                width="20"
                height="20"
                fill="#828282"
                class="me-3"
              ></img
              >My E-Book</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/dashboard-profile/transaction.svg"
                alt=""
                width="20"
                height="20"
                fill="#828282"
                class="me-3"
              />Rekap Transaksi</a
            >
          </div>
        </div>
      </div>
      <!-- End of dashboard profile  ===================================-->
      <div class="col-md-9 p-4" style="min-height: 90vh;">
        <div class="card position-relative">

            <div class="card-top d-flex row align-items-center">
                <div class="py-3 px-4 col-4">
                    <div class="p-0">
                        <p class="m-0">Transaksi</p>
                        <span>13 September 2023</span>
                    </div>
                </div>
                <div class="py-3 px-4 col-4">
                    <div class="card-top-content py-0">
                        <p class="m-0">No invoice</p>
                        <span>87239854927332094</span>
                    </div>
                </div>
                <div class="py-3 px-4 col-4">
                    <div class="p-0">
                        <p class="m-0">Total Harga</p>
                        <span>Rp132.000</span>
                    </div>
                </div>
            </div>

            <div class="card-middle d-flex px-4 py-3 gap-3 ">
                <img src="assets/img/dashboard-profile/cardpic.png" alt="">
                <div class="texts">
                    <p class="m-0">Plus Counseling</p>
                    <span>1 sesi</span>
                </div>
            </div>

            <div class="card-bottom d-flex flex-column flex-lg-row align-items-center justify-content-between px-4 py-3">
                <div class="card-bottom-content">
                    <span>Jadwal</span>
                    <p>15 september 2023 / 16:00 WIB</p>
                </div>
                <div class="card-bottom-content">
                    <span>Psikolog</span>
                    <p>Heru Dwi Kurniawan</p>
                </div>
                <div class="card-bottom-content">
                    <div class="btn btn-join me-2 py-2 px-3 rounded-3" style="background-color: #2139F9;">Join meeting</div>
                    <div class="btn btn-admin bg-secondary py-2 px-3 rounded-3">Hubungi admin</div>
                </div>
            </div>
            
        </div>
      </div>
    </div>

@include('../partials/footer')

<script>
        document.addEventListener("DOMContentLoaded", function () {
            flatpickr("#tanggalLahir", {
                dateFormat: "d/m/Y", // Format tanggal yang diinginkan
                locale: "id", // Lokal Bahasa Indonesia
                altInput: true, // Menggunakan input alternatif yang mudah diisi
                altFormat: "j F Y", // Format input alternatif
                allowInput: true // Memungkinkan pengguna menginputkan tanggal langsung
            });
        });
    </script>

@endsection
