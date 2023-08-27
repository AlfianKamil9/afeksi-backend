@extends('../layout')

@section('title', 'junior psikolog')

@section('styles')
    <link rel="stylesheet" href="assets/css/data-diri.css">
    <link rel="stylesheet" href="assets/css/stepper.css">
@endsection


@include('../partials/navbar') 

@section('content')
<!-- Step -->
<div class="container" style="padding-top:calc(70px + 94px);">
    <div class="position-relative">
      <div class="stepper-wrapper">
        <div class="stepper-item completed">
          <!-- add class COMPLETED to enable checklist -->
          <div class="step-counter">
            <span class="step-checkmark">✓</span>
          </div>
          <div class="step-name text-center">
            Pilih <br />
            Pengalaman Psikologi
          </div>
        </div>
        <div class="stepper-item completed">
          <div class="step-counter">
            <span class="step-checkmark">✓</span>
          </div>
          <div class="step-name">Pilih Paket</div>
        </div>
        <div class="stepper-item completed">
          <div class="step-counter">
            <span class="step-checkmark">✓</span>
          </div>
          <div class="step-name">Pilih Psikolog</div>
        </div>
        <div class="stepper-item active">
          <div class="step-counter">
            <span class="step-checkmark">4</span>
          </div>
          <div class="step-name">Data Diri</div>
        </div>
        <div class="stepper-item">
          <!--add class active to enable active step progess-->
          <div class="step-counter">
            <span class="step-checkmark">5</span>
          </div>
          <div class="step-name">Pembayaran</div>
        </div>
      </div>
    </div>
  </div>
<!-- End Step -->

<!-- form -->

<div class="data-diri p-3 p-md-5 mb-5">
  <h4 class="fw-bold" style="color: #233dff">Data diri</h4>
  <p>Isi data anda dengan benar</p>
  <form>
    <div class="mb-3">
      <label for="namaLengkap" class="form-label fw-bold">Nama Lengkap</label>
      <input type="text" class="form-control" id="namaLengkap" placeholder="Jawaban Anda" />
    </div>
    <div class="mb-3">
      <label for="jenisKelamin" class="form-label fw-bold">Jenis Kelamin</label>
      <select class="form-select" id="jenisKelamin">
        <option selected>Pilih</option>
        <option value="laki">Laki-laki</option>
        <option value="perempuan">Perempuan</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label fw-bold">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Jawaban Anda" />
    </div>
    <div class="mb-3">
      <label for="nomor-whatsapp" class="form-label fw-bold">No whatsapp</label>
      <input type="text" class="form-control" id="nomor-whatsapp" placeholder="Jawaban Anda" />
    </div>
    <div class="mb-3">
      <label for="umur" class="form-label fw-bold">Umur</label>
      <input type="text" class="form-control" id="umur" placeholder="Jawaban Anda" />
    </div>
    <div class="mb-3">
      <label for="tanggalKonsultasi" class="form-label fw-bold">Tanggal Konsultasi</label>
      <input type="date" class="form-control" id="tanggalKonsultasi" />
    </div>
    <div class="mb-3">
      <label for="jamKonsultasi" class="form-label fw-bold">Jam Konsultasi</label>
      <input type="time" class="form-control" id="jamKonsultasi" />
    </div>
    <div class="mb-3">
      <label for="detailMasalah" class="form-label fw-bold">Detail Masalah</label>
      <textarea class="form-control" id="detailMasalah" rows="4" placeholder="Jawaban anda"></textarea>
    </div>
    <button type="submit" class="btn btn-fill">Selanjutnya</button>
  </form>
</div>


<!-- end form -->



@include('../partials/footer') 
@endsection

