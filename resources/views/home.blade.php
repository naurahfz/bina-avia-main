@extends('layouts.index')

@section('hero')
  @include('sections.hero')
@endsection

@section('content')
  @include('sections.about')
  @include('sections.what-we-do')
  @include('sections.services')
  @include('sections.testimonials')
  <section id="team" class="team">
    <div class="container">
      <div class="section-title">
        <h2>Terbaru dari Bina Avia Persada</h2>
      </div>
      <div class="row">
        @foreach ($news as $n)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="/assets/img/news/{{ $n->image }}" alt="news-image" style="max-width: 100%; border-radius:0px; aspect-ratio: 4/3; object-fit:cover"">
              <h4><a href="/berita/{{ $n->id }}">{{ $n->title }}</a></h4>
              <p>{{ substr($n->body,0,75) }}...</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section><!-- End Team Section -->
@endsection