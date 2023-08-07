@extends('../layout')

@section('title', 'Pendaftaran Relationship Konselor | AFEKSI')

@section('styles')
    <link rel="stylesheet" href="assets/css/detail-pendaftaran-relationship.css">
@endsection

@section('content')
<section class="wrapper">
    <div class="banner-wrapper">
    </div>
        <div class="container content">
            <div class="bread-crumbs d-flex gap-2 fw-semibold">
                <p>Karir</p>
                <span>&gt;</span>
                <p>Konselor</p>
                <span>&gt;</span>
                <p>Relationship Konselor</p>
            </div>
            <h1 class="mt-3 fw-bold">Relationship Konselor</h1>
            <div class="info-utils d-flex gap-2 mt-4">
              <i class="bi bi-geo-alt-fill me-3"></i>
              <p class="work-type  fw-semibold">Remote - </p>
              <p>Surabaya, Indonesia</p>
              <i class="bi bi-briefcase-fill me-2"></i>
              <p>Fulltime</p>
          </div>
          <p class="afeksi-description">Afeksi merupakan layanan edukasi dan konsultasi hubungan relasi pertama di Indonesia. Kami memiliki ide kecil agar semua orang paham serta dapat merasakan hubungan hubungan relasi yang lebih meaningful, sehat, dan saling memahami. Kami mencari mitra professional yang akan menjadi konselor hubungan di dalam platform kami. Kami mencari psikolog maupun professional lain di bidang hubungan untuk berkolaborasi bersama kami mewujudkan hubungan yang lebih meaningful, sehat, dan saling memahami.</p>
          <h3 class="mt-4">Job Description</h3>
          <ul>
              <li>Melakukan praktik psikologi secara online (waktu fleksibel)</li>
              <li>Melakukan asesmen serta pembuatan laporan</li>
              <li>Bertanggungjawab dalam semua laporan psikologi dan hasil wawancara kepada klien</li>
              <li>Mampu membantu dan mengkoordinir dalam pengembangan alat tes psikologi</li>
          </ul>
          <h3 class="mt-4">Syarat & Ketentuan:</h3>
          <ul>
              <li>Lulusan S2 Profesi Psikologi</li>
              <li>Mempunyai SIPP aktif (tidak dalam proses pengurusan)</li>
              <li>Memahami proses Asesmen psikologi</li>
              <li>Memiliki kemampuan konseling</li>
              <li>Memahami administrasi dan interpretasi alat test psikologi</li>
              <li>Minimal pengalaman 1 tahun</li>
              <li>Bersedia bekerja</li>
              <li>Mampu bersinergi dengan visi misi Afeksi</li>
              <li>Mampu meluangkan waktu</li>
          </ul>
          <h3 class="mt-4">Skills</h3>
          <ul>
              <li>Psychological assessment</li>
              <li>Psychological report</li>
              <li>Counseling</li>
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
                    <h4 class="modal-title fw-semibold text-center" id="exampleModalLabel">Formulir Pendaftaran</h4>
                    <p class="text-center">Silahkan isi data anda dan pastikan data anda sudah sesuai.</p>
                  <form>
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Recipient:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Message:</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                  </form>
                </div>
                <button type="button" class="btn btn-primary m-3">Send message</button>                
              </div>
            </div>
          </div>
          <!-- End Modals -->
      </div>
</section>
@endsection