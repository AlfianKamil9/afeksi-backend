@extends('../layout')

@section('title', 'Artikel Detail | AFEKSI')

@section('styles')
    <link rel="stylesheet" href="/assets/css/artikel-detail.css">
@endsection


@include('../partials/navbar') 

@section('content')

<div class="contents row">
      <div class="content">
        <img class="mb-2" src="{{ $data->gambar ? $data->gambar : '/assets/img/article/contentImg.png' }}" alt="{{ $data->judul_artikel }}" />
        <div class="title mb-5">
          <h1 style="color: #233dff;">{{ $data->judul_artikel }}</h1>
          <span class="text-secondary">{{ $data->created_at->format('d M Y') }}</span>
        </div>
        <p>
          {{ $data->isi_artikel }}
        </p>
      </div>
    </div>

@include('../partials/footer') 
@endsection

