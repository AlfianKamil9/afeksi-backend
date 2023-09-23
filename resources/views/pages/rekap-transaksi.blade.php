@extends('../layout') @section('title', 'Rekap Transaksi')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
<link rel="stylesheet" href="assets/css/rekap-transaksi.css" />
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
                    <span>Rekap Transaksi</span>
                  </h4>
                  <p class="fs-5 fw-light mt-3">
                    Anda dapat melihat semua rekap transaksi anda di sini.
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
              src="assets/img/rekap-transaksi/user.svg"
              width="50px"
              height="50px"
            />
          </div>
          <div class="mt-3">
            <h6 class="fw-bold">Bimo Setyo</h6>
            <p>bimo82374@gmail.com</p>
          </div>
          <div class="mb-4 mt-5 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/rekap-transaksi/dashboardblue.png"
                class="me-3"
                width="20"
                height="20"
              />Dashboard</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/rekap-transaksi/user.png"
                class="me-3"
                width="20"
                height="20"
              />Profile</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/rekap-transaksi/voucher.svg"
                width="20"
                height="20"
                class="me-3"
            />Voucher</a
            >
          </div>
          <div class="mb-4 p-2">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/rekap-transaksi/e-book.svg"
                width="20"
                height="20"
                fill="#828282"
                class="me-3"
              />My E-Book</a
            >
          </div>
          <div class="mb-4 p-2 active">
            <a href="#" class="text-secondary"
              ><img
                src="assets/img/rekap-transaksi/transaction.svg"
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
      <div class="col-md-9 px-3 utils-wrapper row">
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                  <i class="bi bi-search border-end-0"></i>
                </span>
                <input type="search" class="form-control border-start-0" placeholder="Cari Transaksi">
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                  <i class="bi bi-clock border-end-0"></i>
                </span>
                <select type="search" class="form-select border-start-0" placeholder="Status Transaksi">
                    <option value="" selected disabled>Status Transaksi</option>
                    <option value="selesai">Selesai</option>
                    <option value="gagal">Gagal</option>
                    <option value="menunggu">Menunggu Pembayaran</option>
                </select>                              
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                  <i class="bi bi-calendar3 border-end-0"></i>
                </span>
                <input type="search" class="form-control border-start-0" placeholder="Tanggal">
            </div>
        </div>
        <div class="col-md-3 d-flex gap-1">
            <button class="btn btn-primary temukan-btn">Temukan</button>
            <button class="btn btn-outline-primary">Semua Transaksi</button>
        </div>
    </div>
      <!-- End of dashboard profile  ===================================-->
      <div class="col-md-9 p-4" style="min-height: 90vh;">
        <div class="card position-relative mt-5">

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
                <div class="py-3 px-4 col-4 text-center">
                    <div class="p-0">
                        <p class="status menunggu">Menunggu Pembayaran</p>                        
                    </div>
                </div>
            </div>

            <div class="card-middle d-flex px-4 py-3 gap-3 ">
                <img src="assets/img/rekap-transaksi/c.png" alt="">
                <div class="texts">
                    <p class="m-0">E-book Menelisik Hati, Memahami Pasangan: Panduan Praktis Untuk Kebahagiaan Bersama Pasangan</p>
                    <span>1 barang</span>
                </div>
            </div>

            <div class="card-bottom d-flex flex-column flex-lg-row align-items-center justify-content-between px-4 py-3">
                <div class="card-bottom-content">
                    <span>Transaksi</span>
                    <p>13 september 2023</p>
                </div>
                <div class="card-bottom-content">
                    <div class="btn btn-join me-2 py-2 px-3 rounded-3" style="background-color: #2139F9;">Lanjutkan</div>
                    <div class="btn btn-join me-2 py-2 px-3 rounded-3" style="background-color: #D60F27;">Bayar</div>
                    <div class="btn btn-admin bg-secondary py-2 px-3 rounded-3">Hubungi admin</div>
                </div>
            </div>
            
        </div>
        <div class="card position-relative mt-3">
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
                <div class="py-3 px-4 col-4 text-center">
                    <div class="p-0">
                        <p class="status selesai">Selesai</p>                        
                    </div>
                </div>
            </div>

            <div class="card-middle d-flex px-4 py-3 gap-3 ">
                <img src="assets/img/rekap-transaksi/c.png" alt="">
                <div class="texts">
                    <p class="m-0">E-book Menelisik Hati, Memahami Pasangan: Panduan Praktis Untuk Kebahagiaan Bersama Pasangan</p>
                    <span>1 barang</span>
                </div>
            </div>

            <div class="card-bottom d-flex flex-column flex-lg-row align-items-center justify-content-between px-4 py-3">
                <div class="card-bottom-content">
                    <span>Transaksi</span>
                    <p>13 september 2023</p>
                </div>
                <div class="card-bottom-content">
                    <div class="btn btn-join me-2 py-2 px-3 rounded-3" style="background-color: #2139F9;">Detail Product</div>                    
                </div>
            </div>
            
        </div>
        <div class="card position-relative mt-3">
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
                <div class="py-3 px-4 col-4 text-center">
                    <div class="p-0">
                        <p class="status gagal">Gagal</p>                        
                    </div>
                </div>
            </div>

            <div class="card-middle d-flex px-4 py-3 gap-3 ">
                <img src="assets/img/rekap-transaksi/c.png" alt="">
                <div class="texts">
                    <p class="m-0">E-book Menelisik Hati, Memahami Pasangan: Panduan Praktis Untuk Kebahagiaan Bersama Pasangan</p>
                    <span>1 barang</span>
                </div>
            </div>

            <div class="card-bottom d-flex flex-column flex-lg-row align-items-center justify-content-between px-4 py-3">
                <div class="card-bottom-content">
                    <span>Transaksi</span>
                    <p>13 september 2023</p>
                </div>
                <div class="card-bottom-content">
                    <div class="btn btn-join me-2 py-2 px-3 rounded-3 bg-secondary">Hubungi Admin</div>                    
                </div>
            </div>
            
        </div>
      </div>
    </div>

@include('../partials/footer')  