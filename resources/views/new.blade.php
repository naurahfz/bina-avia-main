@extends('layouts.index')

@section('hero')
  @include('sections.hero')
@endsection

@section('content')

<section id="team" class="team">
  <div class="container">

    <a href="/berita"><i class="bi bi-arrow-left"></i> Semua Berita</a>
    <h1 class="text-left">{{ $new->title }}</h1>
    @php
      $date = date_create($new->created_at);
    @endphp
    <span>Diposting tanggal {{date_format($date,"d M Y")}}</span>
    <br><br><hr>
    <div class="row">
      <div class="col-12 col-md-9">
        <img src="/assets/img/news/{{ $new->image }}" alt="" style="aspect-ratio: 16/9; width: 100%; object-fit: cover">
        <br><br>
        <p style="text-align: justify">{{ $new->body }}</p>
      </div>
      <div class="col-12 col-md-3">

      </div>
    </div>

  </div>
</section><!-- End Team Section -->
<hr>
@endsection