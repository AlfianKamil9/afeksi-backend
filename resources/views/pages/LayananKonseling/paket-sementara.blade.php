@extends('../layout')
 @section('title', 'Pilih Paket Peers Konseling | AFEKSI')

<!-- path style disesuaikan dengan folder css masing-masing page -->
@section('styles')
<link rel="stylesheet" href="/assets/css/parenting-mentoring.css" />
@endsection 

@section('content')
    <!-- MASALAH SECTION -->
    <div class="container mb-5 mt-5">
      

      <div class="row g-5 mb-3 mt-1">
        @foreach ($data as $item)
        <div class="col-lg-4">
            <form action="{{ route('peers.konseling.process.paket', $slug) }}" method="POST">
                @csrf
          <div class="card rounded-4 p-3 border-0 shadow card-masalah" style="background-color: #5a74fd">
            <div class="card-body text-white">
              <div class="d-flex flex-column justify-content-start align-items-start white">
                <div class="justify-content-lg-start mb-4 mt-2">
                  <img src="/assets/img/parenting-mentoring/box-1.png" alt="Baby Care" class="card-img" />
                </div>
                <h5 class="card-title fw-semibold">{{ $item->nama_paket }}</h5>
                <p class="card-text mt-3">Rp.{{ $item->harga }}</p>
                <button type="submit" name="id_paket" value="{{ $item->id }}" class="btn btn-warning">Pilih</button>
              </div>
            </div>
          </div>
        </form>
        </div>
        @endforeach
        
       
      </div>
    </div>
    <!-- END MASALAH SECTION -->



@include('../partials/footer')

@section('script')
   <script src="assets/js/landingpage.js"></script>
@endsection

@endsection
