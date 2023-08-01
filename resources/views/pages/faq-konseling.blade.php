@extends('../layout')

@section('title', 'FAQ | AFEKSI')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
    <link rel="stylesheet" href="/assets/css/faq-konseling.css">
@endsection

{{-- @include('../partials/navbar')  --}}

@section('content')

<section id="Konseling">
      <div class="hero-2 d-flex align-items-center">
          <div class="container py-5 my-5">
            <h1 class="display-5 fw-semibold">F.A.Q - Pertanyaan yang Sering Ditanyakan</h1>
            <p class="fs-4 mt-5 fw-light">Bagaimana kami bisa membantu Anda?</p>
          </div>
        </div>

      <div>
        <div class="container pe-2 py-5">
          <div class="row">
            <div class="col-sm">
              {{-- @if (request()->query('mentoring') == "true")      --}}
                <button onclick="konseling()" id="btn-konseling" class="tombol-aktif btn px-5 py-3 fw-bold btn-secondary" >FAQ Konseling</button>
                <button onclick="mentoring()" id="btn-mentoring" class="btn px-5 py-3 fw-bold btn-outline-secondary">FAQ Mentoring</button>
            </div>
          </div>
        </div>
      </div>

      {{-- @if(request()->query('mentoring') == "true") --}}
        <div class="mb-5" id="mentoring-badge">
        <div class="container">
          <div class="row mb-3">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Apa itu Mentoring?</button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">Mentoring adalah Kelas dengan topik tertentu secara intensif dengan materi dan interaksi berkesinambungan dan dalam jangka waktu lama.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Apa saja masalah yang bisa ditangani dalam mentoring?
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      Masalah yang ditangani dalam konseling sangat beragam mulai dari masalah berkaitan dengan overthinking, butuh teman bercerita, masalah kecemasan hingga masalah yang bersifat klinis dan dikhawatirkan dapat menyebabkan
                      perselisihan maupun membahayakan hubungan relasi maupun individu lain.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Ada berapa macam layanan mentoring?</button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      Kami membedakan layanan mentoring kami berdasarkan pada kebutuhan Anda serta tingkat permasalahan yang anda alami. Kami memiliki tiga layanan yaitu <i>peers konseling serta professional konseling.</i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Apa perbedaan keduanya?</button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      Peers konseling hanya diperuntukkan untuk Anda yang memiliki masalah kecemasan, overthinking, maupun masalah non klinis yang tidak membahayakan Anda serta orang di sekitar anda. Professional konseling diperuntukkan
                      bagi Anda yang memiliki masalah yang bersifat klinis dan dikhawatirkan dapat menyebabkan perselisihan maupun membahayakan hubungan relasi maupun individu lain.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      Siapa sajakah yang memberikan layanan dalam konseling? Tergantung pada layanan yang anda pilih.
                    </button>
                  </h2>
                  <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <i>Peers konseling</i> akan dilayani oleh lulusan psikologi dari berbagai kampus kenamaan di seluruh Indonesia yang sudah melewati pelatihan khusus terkait dengan masalah psikologis dan sudah memiliki ilmu serta
                      pemahaman mendalam tentang ilmu psikologi dan selalu dipantau oleh psikolog Afeksi.<i>Professional konseling</i> akan dilayani oleh professional di bidangnya masing-masing sehingga dapat menjawab keresahan dan
                      menyelesaikan permasalahan klinis maupun permasalahan yang membahayakan keselamatan jiwa dengan baik. Kami memiliki psikolog professional dengan keahlian masing-masing, Kami memiliki ahli hukum yang berpengalaman
                      terkait hubungan relasi, Kami juga memiliki ahli kekerasan seksual yang akan membantu menyelesaikan permasalahanmu.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

          
      <div class="mb-5" id="konseling-badge" >
        <div class="container">
          <div class="row mb-3">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Apa itu Konseling?</button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">Konseling adalah layanan konsultasi one on one maupun berpasangan dalam waktu tertentu dan jadwal yang sudah dipesan dan dijadwalkan di awal pemesanan.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Apa saja masalah yang bisa ditangani dalam konseling?
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      Masalah yang ditangani dalam konseling sangat beragam mulai dari masalah berkaitan dengan overthinking, butuh teman bercerita, masalah kecemasan hingga masalah yang bersifat klinis dan dikhawatirkan dapat menyebabkan
                      perselisihan maupun membahayakan hubungan relasi maupun individu lain.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Ada berapa macam layanan konseling?</button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      Kami membedakan layanan konseling kami berdasarkan pada kebutuhan Anda serta tingkat permasalahan yang anda alami. Kami memiliki dua layanan yaitu <i>peers konseling serta professional konseling.</i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Apa perbedaan keduanya?</button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      Peers konseling hanya diperuntukkan untuk Anda yang memiliki masalah kecemasan, overthinking, maupun masalah non klinis yang tidak membahayakan Anda serta orang di sekitar anda. Professional konseling diperuntukkan
                      bagi Anda yang memiliki masalah yang bersifat klinis dan dikhawatirkan dapat menyebabkan perselisihan maupun membahayakan hubungan relasi maupun individu lain.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      Siapa sajakah yang memberikan layanan dalam konseling? Tergantung pada layanan yang anda pilih.
                    </button>
                  </h2>
                  <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <i>Peers konseling</i> akan dilayani oleh lulusan psikologi dari berbagai kampus kenamaan di seluruh Indonesia yang sudah melewati pelatihan khusus terkait dengan masalah psikologis dan sudah memiliki ilmu serta
                      pemahaman mendalam tentang ilmu psikologi dan selalu dipantau oleh psikolog Afeksi.<i>Professional konseling</i> akan dilayani oleh professional di bidangnya masing-masing sehingga dapat menjawab keresahan dan
                      menyelesaikan permasalahan klinis maupun permasalahan yang membahayakan keselamatan jiwa dengan baik. Kami memiliki psikolog professional dengan keahlian masing-masing, Kami memiliki ahli hukum yang berpengalaman
                      terkait hubungan relasi, Kami juga memiliki ahli kekerasan seksual yang akan membantu menyelesaikan permasalahanmu.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    

      <div class="mb-5">
        <div class="container p-5 rounded" style="background-color: #d3daff">
          <div class="row">
            <div class="col-sm-8 fw-bold mb-3" style="color: #233dff">Memiliki pertanyaan lain atau ingin berdiskusi lebih lanjut?</div>
            <div class="col-sm-4">
              <a href="https://wa.me/6282142625552" target="blank" class="btn-whatsapp" style="color: #ffffff"><i class="bi bi-whatsapp me-3"></i>Whatsapp Kami</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    

@include('../partials/footer') 

@section('script')
   <script src="assets/js/faq.js"></script>
@endsection

@endsection
