@extends('../layout')

@section('title', 'Detail Pendaftaran Konselor')

@section('styles')
    <link rel="stylesheet" href="assets/css/internship.css">
@endsection


@include('../partials/navbar') 

@section('content')
<section class="wrapper">
    <div class="banner-wrapper">
    </div>
        <div class="container content">
            <div class="bread-crumbs d-flex gap-2 fw-semibold">
                <p>Karir</p>
                <span>&gt;</span>
                <p>Internship</p>
                <span>&gt;</span>
                <p>Product Development</p>
            </div>
            <h1 class="mt-3 fw-bold">Product Development</h1>
            <div class="info-utils d-flex gap-2 mt-4">
              <i class="bi bi-geo-alt-fill me-3"></i>
              <p class="work-type  fw-semibold">Remote - </p>
              <p>Surabaya, Indonesia</p>
              <i class="bi bi-briefcase-fill me-2"></i>
              <p>Internship</p>
          </div>
          <p class="afeksi-description">Afeksi adalah layanan edukasi dan konsultasi kesehatan hubungan berbasis psikologi relasi pertama di Indonesia Afeksi super team adalah program unpaid internship dengan sistem WFH yang mengasah kemampuan kalian dalam simulasi dunia kerja lewat pembelajaran aktif dalam membangun komunitas startup</p>
          <h3 class="mt-4">Job Description</h3>
          <ul>
              <li>Membantu melakukan research mengenai trend dan pelayanan berbasis psikologi</li>
              <li>Membantu menyusun desain pelayanan berbasis psikologi</li>
              <li>Menghubungi stakeholder terkait dengan produk pelayanan yang di kembangkan</li>
          </ul>
          <h3 class="mt-4">Dicari orang yang:</h3>
          <ul>
              <li>Jurusan psikologi atau tertarik dengan dunia psikologi</li>
              <li>Senang melakukan research dan membantu pengembangan produk</li>
              <li>Memiliki kemampuan analisis yang baik</li>
              <li>Ketertarikan dengan dunia start up dan kesehatan mental</li>
              <li>Percaya diri, kreatif dan memiliki inisiatif yang tinggi</li>
              <li>Mampu mengungkapkan ide secara terbuka</li>
          </ul>
          <button type="button" class="btn btn-primary daftar" data-bs-toggle="modal" data-bs-target="#form-pendaftaran-konselor" data-bs-whatever="@getbootstrap">Daftar Sekarang</button>
          <!-- Modals -->
          <div class="modal fade" id="form-pendaftaran-konselor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class="modal-title fw-semibold text-center px-5">Formulir Pendaftaran Relationship Konselor</h3>
                    <p class="text-center px-4">Silahkan isi data anda dan pastikan data anda sudah sesuai.</p>
                  <form>
                    <div class="mb-3">
                      <label for="email" class="col-form-label">Email</label>
                      <input type="email" placeholder="Masukan Email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="col-form-label">Nama Lengkap</label>
                      <input type="text" placeholder="Nama Lengkap" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                      <label for="jenis-kelamin" class="col-form-label">Jenis Kelamin</label>
                      <input type="text"placeholder="Jenis Kelamin" class="form-control" id="jenis-kelamin">
                    </div>
                    <div class="mb-3">
                      <label for="hp" class="col-form-label">No HP</label>
                      <input type="number" placeholder="08xxxxxxxxx" class="form-control" id="hp">
                    </div>
                    <div class="mb-3">
                      <label for="asal-daerah" class="col-form-label">Daerah</label>
                      <input type="text"placeholder="Asal Daerah" class="form-control" id="asal-daerah">
                    </div>
                    <div class="mb-3">
                      <label for="mahasiswa" class="col-form-label">Mahasiswa Semester</label>
                      <input type="text"placeholder="Semester dalam angka" class="form-control" id="mahasiswa">
                    </div>
                    <div class="mb-3">
                      <label for="universitas" class="col-form-label">Nama Universitas</label>
                      <input type="text" placeholder="Universitas" class="form-control" id="universitas">
                    </div>
                    <div class="mb-3">
                      <label for="jurusan" class="col-form-label">Jurusan Kuliah</label>
                      <input type="text" placeholder="Jurusan" class="form-control" id="jurusan">
                    </div>
                    <div class="mb-3">
                      <div class="mb-3">    
                        <label for="pekerjaan" class="col-form-label">Posisi yang dipilih</label>                  
                        <select name="pekerjaan" class="form-select" id="pekerjaan">
                          <option value="" disabled selected>Pilih posisi yang diminati</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Content Writer">Content Writer</option>
                        <option value="Program Innovator">Program Innovator</option>
                        <option value="Business Development">Business Development</option>
                        <option value="Product Development">Product Development</option>
                        <option value="Marketing and Communication">Marketing and Communication</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="Public Relation">Public Relation</option>
                        <option value="Front End Developer">Front End Developer</option>
                        <option value="Back End Developer">Back End Developer</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="alasan" class="col-form-label">Alasan Memilih Posisi tersebut</label>
                      <textarea class="form-control"placeholder="Alasan" id="alasan"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="kelebihan" class="col-form-label">3 Kelebihan yang kamu miliki</label>
                      <input type="text" placeholder="Kelebihan kamu" class="form-control" id="kelebihan">
                    </div>
                    <div class="mb-3">
                      <label for="kekurangan" class="col-form-label">3 kekurangan yang kamu miliki</label>
                      <input type="text" placeholder="kekurangan kamu" class="form-control" id="kekurangan">
                    </div>
                    <div class="mb-3">
                      <label for="harapan" class="col-form-label">Apa harapan kamu gabung bersama Afeksi</label>
                      <textarea class="form-control"placeholder="Harapan kamu" id="harapan"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="col-form-label">Satu kalimat yang mendeskripsikan diri kamu</label>
                      <input type="text" placeholder="Satu kalimat yang mendeskripsikan diri kamu" class="form-control" id="deskripsi">
                    </div>
                    <div class="mb-3 upload-file-wrapper">                    
                      <label for="follow-ig" class="col-form-label">Bukti Follow ig Afeksi</label>
                      <label class="upload-file" for="follow-ig" class="col-form-label"> <i class="bi bi-plus-circle-fill ps-2 me-3"></i>Upload Bukti</label>
                      <input type="file" name="follow-ig" id="upload-file" class="d-block">
                    </div>
                    <div class="mb-3 upload-file-wrapper">          
                      <label for="cv" class="col-form-label">CV</label>
                      <label class="upload-file" for="cv" class="col-form-label"> <i class="bi bi-plus-circle-fill ps-2 me-3"></i>Upload CV</label>
                      <input type="file" name="follow-ig" id="upload-file" class="d-block">
                    </div>
                    <div class="mb-3 upload-file-wrapper">                    
                      <label for="portfolio" class="col-form-label">Portfolio(Optional)</label>
                      <label class="upload-file" for="portfolio" class="col-form-label"> <i class="bi bi-plus-circle-fill ps-2 me-3"></i>Upload bukti</label>
                      <input type="file" name="portfolio" id="upload-file" class="d-block">
                    </div>
                  </form>
                </div>
                <button type="button" class="btn btn-primary m-3">Daftar</button>                
              </div>
            </div>
          </div>
          <!-- End Modals -->
      </div>
</section>

@include('../partials/footer') 

@section('script')
   <script src="assets/js/form-file-pendaftaran.js"></script>
@endsection

@endsection

