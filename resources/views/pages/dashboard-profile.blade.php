@extends('../layout')

@section('title', 'Profile Dashboard | AFEKSI')

@section('styles')
    <link rel="stylesheet" href="/assets/css/dashboard-profile.css">
@endsection


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
                        <h4 class="fw-semibold mt-5"><span>Welcome</span>, {{ Auth::user()->nama }}</h4>
                        <p class="fs-5 fw-light mt-3">Untuk memudahkan proses konsultasi kamu, harap masukkan informasi yang valid.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard ============================== -->
    <div class="dashboard p-3 shadow-sm">
        @include('partials.sidebar')
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
                    <input type="text" class="form-control" id="namaLengkap" placeholder="Masukkan Nama Lengkap" value="{{ Auth::user()->nama }}">
                </div>
               <div class="mb-3">
                     <!-- Email -->
                    <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{ Auth::user()->email }}">
               </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="tanggalLahir" placeholder="Pilih Tanggal Lahir" value="{{ Auth::user()->tgl_lahir }}">
                        <span class="input-group-text" data-toggle="datepicker" data-input="#tanggalLahir">
                            <i class="bi bi-calendar"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="noHP" class="form-label">No. HP</label>
                    <input type="tel" class="form-control" id="noHP" placeholder="Masukkan No. HP" value="{{ Auth::user()->no_whatsapp }}">
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan Kamu" value="{{ Auth::user()->pekerjaan }}">
                </div>
                <div class="my-5 pb-5">
                    <a type="button" href="{{ route('dashboard.profile.show.changePassword') }}" class="btn btn-outline-primary">Ubah Password</a>
                    <a type="button" href="{{ route('dashboard.profile.show.changeFoto') }}" class="btn btn-outline-primary">Ubah Foto Profile</a>
                </div>
                
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenisKelamin">
                        <option hidden>Pilihan</option>
                        <option value="Laki-laki" @if (Auth::user()->jenisKelamin == 'Laki-Laki')
                            selected
                        @endif>Laki-laki</option>
                        <option value="Perempuan" @if (Auth::user()->jenisKelamin == 'Perempuan')
                            selected
                        @endif>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="kota" placeholder="Masukkan Kota" value="{{ Auth::user()->domisili }}">
                </div>
                <div class="mb-3">
                    <label for="instansi" class="form-label">Instansi</label>
                    <input type="text" class="form-control" id="instansi" placeholder="Instansi Kamu" value="{{ Auth::user()->institusi }}">
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
                dateFormat: "Y-m-d", // Format tanggal yang diinginkan
                locale: "id", // Lokal Bahasa Indonesia
                altInput: true, // Menggunakan input alternatif yang mudah diisi
                altFormat: "j F Y", // Format input alternatif
                allowInput: true, // Memungkinkan pengguna menginputkan tanggal langsung
                enableTime:false
            });
        });
    </script>
    
    
    

@include('../partials/footer') 
@endsection