@extends('../layout')

@section('title', 'Artikel Detail | AFEKSI')

@section('styles')
    <link rel="stylesheet" href="/assets/css/artikel-detail.css">
@endsection


{{-- @include('../partials/navbar')  --}}

@section('content')

<div class="contents row">
      <div class="content">
        <img class="mb-2" src="/assets/img/article/contentImg.png" alt="" />
        <div class="title mb-5">
          <h1 style="color: #233dff;">Lorem Ipsum</h1>
          <span class="text-secondary">15 Agustus 2023</span>
        </div>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu fermentum ipsum, eget eleifend odio. Aliquam lacinia congue risus
          sed pharetra. Integer a ante nec nunc semper dictum. Sed ultrices sagittis leo a posuere. Donec eu eros accumsan, sagittis nisl eget,
          volutpat justo. Mauris sodales nibh at dui bibendum, vitae bibendum nulla rutrum. Vivamus ac efficitur sem. Proin fermentum consequat
          accumsan. Suspendisse at quam eget nulla vehicula porta. Integer malesuada, est vel gravida consectetur, tellus quam placerat enim, sed
          consequat quam sem id tortor. Nulla vel luctus nibh. Quisque mattis enim ipsum, sed facilisis sapien placerat sed. Morbi fringilla ipsum ut
          diam feugiat molestie viverra vel velit. Donec scelerisque massa nibh, sed suscipit augue imperdiet ut. Vivamus nec odio massa. Aliquam
          libero lacus, varius vitae venenatis vitae, molestie at risus Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum sed placeat ut, magnam facere repudiandae!. <br /> <br>
          Nulla facilisi. Suspendisse a dictum sapien, id facilisis risus. Nulla sit amet pellentesque velit. Aenean vel laoreet justo, quis pharetra
          erat. Etiam sit amet egestas sem. Etiam iaculis enim egestas magna interdum ultricies. Donec blandit lectus a nibh posuere, quis cursus nisi
          auctor. Etiam ut fermentum leo Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam quis incidunt quidem obcaecati reprehenderit perferendis!.
        </p>
      </div>
    </div>

@include('../partials/footer') 
@endsection

