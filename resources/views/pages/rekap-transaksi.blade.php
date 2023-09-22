@extends('../layout')

@section('title', 'Rekap Transaksi')

@section('styles')
    <link rel="stylesheet" href="assets/css/rekap-transaksi.css">
@endsection


@include('../partials/navbar-new') 

@section('content')
<section id="rekap-transaksi">
    <div class="bg">
        <div class="container d-flex gap-5">
            <div class="Rekap Transaksi               <div class="bg-light rounded-circle d-flex justify-content-center align-items-center" style="width: 125px; height: 125px;">
                    <img src="assets/img/rekap-transaksi/user.svg" width="50px" height="50px"/>
                </div>
                <div class="mt-3">
                    <h6 class="fw-bold">Bimo Setyo</h6>
                    <p>bimo82374@gmail.com</p>
                </div>
                <div class="mb-4 mt-5 p-2"><a href="#" class="text-secondary"><img src="assets/img/rekap-transaksi/dashboard.svg" width="20" height="20" class="me-3">Dashboard</a></div>
                <div class="mb-4 active p-2"><a href="#" class="text-secondary"><img src="assets/img/rekap-transaksi/user.svg" width="20" height="20" class="me-3">Profile</a></div>
                <div class="mb-4 p-2"><a href="#" class="text-secondary"><img src="assets/img/rekap-transaksi/voucher.svg" width="20" height="20" class="me-3">Voucher</a></div>
                <div class="mb-4 p-2"><a href="#" class="text-secondary"><img src="assets/img/rekap-transaksi/e-book.svg" width="20" height="20" class="me-3">My E-Book</a></div>
                <div class="mb-4 p-2"><a href="#" class="text-secondary"><img src="assets/img/rekap-transaksi/transaction.svg" alt="" width="20" height="20" fill="#828282" class="me-3">Rekap Transaksi</a></div>
            </div>
            <div class="rekap-transaksi p-5 pe-2">
                <h3 class="title">Rekap Transaksi</h3>
                <p class="text-white">Anda dapat melihat semua rekap transaksi  anda di sini.</p>
                <div class="utils-wrapper row">
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
                <div class="transaksi-wrapper mt-5 px-3 py-3">
                    <div class="head d-flex">
                        <div class="info d-flex pe-5">
                            <i class="bi bi-cart-fill px-1"></i>
                            <div class="info-desc d-flex flex-column p-0 justify-content-center">
                                <p class="p-0 fw-bold">Transaksi</p>                                        
                                <p class="text-muted p-0">13 September 2023</p>
                            </div>
                        </div>
                        <div class="invoice d-flex">                            
                            <div class="info-desc d-flex flex-column p-0 py-2">
                                <p class="fw-bold p-0">No Invoice</p>                                        
                                <p class="text-muted p-0">87239854927332094</p>
                            </div>
                        </div>
                        <div class="status menunggu">
                            <p>Menunggu Pembayaran</p>
                        </div>
                    </div>
                    <div class="body mt-3 p-2">
                        <div class="row">
                            <div class="col-md-1">
                                <img src="./assets/img/rekap-transaksi/c.png" alt="">
                            </div>
                            <div class="col">
                                <h3 class="product-title">E-book Menelisik Hati, Memahami Pasangan: Panduan Praktis Untuk Kebahagiaan Bersama Pasangan</h3>
                                <p class="qty text-muted">1 barang</p>
                            </div>
                        </div>
                    </div>
                    <div class="foot row justify-content-between">
                        <div class="col-md-2 harga">
                            <p>Total Harga</p>
                            <p class="fw-bold">Rp132.000</p>
                        </div>
                        <div class="col-md-10">
                            <div class="button-wrapper ">
                                <button class="btn btn-primary me-2 admin-button ">Hubungi Admin</button>
                                <button class="btn btn-primary me-2 batal-button">Batalkan</button>
                                <button class="btn btn-primary me-2 lanjut-button ">Lanjutkan</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="transaksi-wrapper mt-5 px-3 py-3">
                    <div class="head d-flex">
                        <div class="info d-flex pe-5">
                            <i class="bi bi-cart-fill px-1"></i>
                            <div class="info-desc d-flex flex-column p-0 justify-content-center">
                                <p class="p-0 fw-bold">Transaksi</p>                                        
                                <p class="text-muted p-0">13 September 2023</p>
                            </div>
                        </div>
                        <div class="invoice d-flex">                            
                            <div class="info-desc d-flex flex-column p-0 py-2">
                                <p class="fw-bold p-0">No Invoice</p>                                        
                                <p class="text-muted p-0">87239854927332094</p>
                            </div>
                        </div>
                        <div class="status selesai">
                            <p>Selesai</p>
                        </div>
                    </div>
                    <div class="body mt-3 p-2">
                        <div class="row">
                            <div class="col-md-1">
                                <img src="./assets/img/rekap-transaksi/c.png" alt="">
                            </div>
                            <div class="col">
                                <h3 class="product-title">E-book Menelisik Hati, Memahami Pasangan: Panduan Praktis Untuk Kebahagiaan Bersama Pasangan</h3>
                                <p class="qty text-muted">1 barang</p>
                            </div>
                        </div>
                    </div>
                    <div class="foot row justify-content-between">
                        <div class="col-md-2 harga">
                            <p>Total Harga</p>
                            <p class="fw-bold">Rp132.000</p>
                        </div>
                        <div class="col-md-10">
                            <button class="btn btn-primary detail-button ms-auto d-block">Detail Product</button>
                        </div>
                    </div>
                </div>
                <div class="transaksi-wrapper mt-5 px-3 py-3">
                    <div class="head d-flex">
                        <div class="info d-flex pe-5">
                            <i class="bi bi-cart-fill px-1"></i>
                            <div class="info-desc d-flex flex-column p-0 justify-content-center">
                                <p class="p-0 fw-bold">Transaksi</p>                                        
                                <p class="text-muted p-0">13 September 2023</p>
                            </div>
                        </div>
                        <div class="invoice d-flex">                            
                            <div class="info-desc d-flex flex-column p-0 py-2">
                                <p class="fw-bold p-0">No Invoice</p>                                        
                                <p class="text-muted p-0">87239854927332094</p>
                            </div>
                        </div>
                        <div class="status gagal">
                            <p>Gagal</p>
                        </div>
                    </div>
                    <div class="body mt-3 p-2">
                        <div class="row">
                            <div class="col-md-1">
                                <img src="./assets/img/rekap-transaksi/c.png" alt="">
                            </div>
                            <div class="col">
                                <h3 class="product-title">E-book Menelisik Hati, Memahami Pasangan: Panduan Praktis Untuk Kebahagiaan Bersama Pasangan</h3>
                                <p class="qty text-muted">1 barang</p>
                            </div>
                        </div>
                    </div>
                    <div class="foot row justify-content-between">
                        <div class="col-md-2 harga">
                            <p>Total Harga</p>
                            <p class="fw-bold">Rp132.000</p>
                        </div>
                        <div class="col-md-10">
                            <button class="btn btn-primary admin-button ms-auto d-block">Hubungi Admin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
   
   
    
    
    

@include('../partials/footer') 
@endsection