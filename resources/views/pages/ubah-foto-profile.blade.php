@extends('../layout')

@section('title', 'Ubah Foto Profile')

@section('styles')
    <link rel="stylesheet" href="assets/css/ubah-foto-profile.css">
@endsection

@include('../partials/navbar') 

@section('content')
<section id="ubah-foto">
    <div class="bg">
        <div class="wrapper p-5">
            <img class="foto-profil d-block m-auto" src="assets/img/ubah-foto-profile/person.png" alt="">
            <h3 class="nama text-center mt-3">Bimo Setyo</h3>
            <div class="mb-3 upload-file-wrapper">          
                <label for="foto" class="col-form-label fw-semibold">Upload Foto</label>
                <label class="upload-file" for="foto" class="col-form-label"> <i class="bi bi-plus-circle-fill ps-2 me-3"></i>Upload foto</label>
                <input type="file" name="follow-ig" id="upload-file" class="d-block">
                <p class="info-file mt-3">Ukuran file MAX 2MB</p>
                <button class="btn btn-primary w-100 mt-3 mb-3 btn-simpan">Simpan</button>
                <a href="" class="btnKembali">Kembali</a>
              </div>
        </div>
    </div>
  </section>
@endsection
@include('../partials/footer') 