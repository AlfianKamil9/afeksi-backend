@extends('../layout')

@section('title', 'dashboard-profile')

@section('styles')
    <link rel="stylesheet" href="assets/css/dashboard-profile.css">
@endsection


@include('../partials/navbar-new') 

@section('content')

<div class="row justify-content-end">    
<div class="col-12 position-relative">
    <!-- HERO
      ================================================================= -->
    <section>
        <div class="hero d-flex">
            <div class="container py-5 my-5 ">
                <div class="row justify-content-end">
                    <div class="col-md-9 d-flex flex-column">
                        <h4 class="fw-semibold mt-5"><span>Welcome</span>, Bimo Setyo</h4>
                        <p class="fs-5 fw-light mt-3">Untuk memudahkan proses konsultasi kamu, harap masukkan informasi yang valid.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard ============================== -->
    <div class="dashboard p-5">
        <div class="bg-light rounded-circle d-flex justify-content-center align-items-center" style="width: 125px; height: 125px;">
            <svg data-src="assets/img/dashboard-profile/user.svg" width="50px" height="50px"></svg>
        </div>
        <div class="mt-3">
            <h6 class="fw-bold">Bimo Setyo</h6>
            <p>bimo82374@gmail.com</p>
        </div>
        <div class="mb-4 mt-5 p-2"><a href="#" class="text-secondary"><svg data-src="assets/img/dashboard-profile/dashboard.svg" class="me-3" width="20" height="20" fill="#828282"></svg>Dashboard</a></div>
        <div class="mb-4 active p-2"><a href="#" class="text-secondary"><svg data-src="assets/img/dashboard-profile/user.svg" class="me-3" width="20" height="20"></svg>Profile</a></div>
        <div class="mb-4 p-2"><a href="#" class="text-secondary"><img src="assets/img/dashboard-profile/voucher.svg" width="20" height="20" class="me-3">Voucher</a></div>
        <div class="mb-4 p-2"><a href="#" class="text-secondary"><svg data-src="assets/img/dashboard-profile/courses.svg" width="20" height="20" fill="#828282" class="me-3"></svg>My Courses</a></div>
        <div class="mb-4 p-2"><a href="#" class="text-secondary"><svg data-src="assets/img/dashboard-profile/e-book.svg" width="20" height="20" fill="#828282" class="me-3"></svg>My E-Book</a></div>
        <div class="mb-4 p-2"><a href="#" class="text-secondary"><img src="assets/img/dashboard-profile/transaction.svg" alt="" width="20" height="20" fill="#828282" class="me-3">Rekap Transaksi</a></div>
    </div>
</div>
<!-- End of dashboard profile  ===================================-->
<div class="col-9">
    <!-- FORM ===================== -->
    <div class="container mt-5">
        <form class="mx-3">
            <div class="row">
            <div class="col-12">
                <div class="mb-3">
                     <!-- Nama Lengkap -->
                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" placeholder="Masukkan Nama Lengkap">
                </div>
               <div class="mb-3">
                     <!-- Email -->
                    <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
               </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="tanggalLahir" placeholder="Pilih Tanggal Lahir">
                        <span class="input-group-text" data-toggle="datepicker" data-input="#tanggalLahir">
                            <i class="bi bi-calendar"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="noHP" class="form-label">No. HP</label>
                    <input type="tel" class="form-control" id="noHP" placeholder="Masukkan No. HP">
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan Kamu">
                </div>
                <div class="my-5 pb-5">
                    <button type="submit" class="btn btn-outline-primary">Ubah Password</button>
                    <button type="submit" class="btn btn-outline-primary">Ubah Foto Profile</button>
                </div>
                
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenisKelamin">
                        <option hidden>Pilihan</option>
                        <option value="laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="kota" placeholder="Masukkan Kota">
                </div>
                <div class="mb-3">
                    <label for="instansi" class="form-label">Instansi</label>
                    <input type="text" class="form-control" id="instansi" placeholder="Instansi Kamu">
                </div>
                <div class="my-5 pb-5">
                    <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                </div>
               
            </div>            
            
            </div>
        </form>
    </div>
</div>
</div>


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
    
    
    

@include('../partials/footer') 
@endsection