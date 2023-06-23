<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
  <div class="container">

    <div class="section-title">
      <h2>Galeri</h2>
    </div>

    <br>

    {{-- <div class="row">
      <div class="col-lg-12">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-app">App</li>
          <li data-filter=".filter-card">Card</li>
          <li data-filter=".filter-web">Web</li>
        </ul>
      </div>
    </div> --}}

    <div class="row portfolio-containerx">
      @forelse($galleries as $g)
      @php
        $image = $g->image;
        if (empty($image)) {$image="not-available.jpg";}
      @endphp
      <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
        <div class="portfolio-wrap">
          <figure>
            <img src="assets/img/gallery/{{$image}}" class="img-fluid" alt="">
          </figure>
        </div>
      </div>
      @empty
        <p class="text-center">Tidak ada data yang ditampilkan</p>
      @endforelse
    </div>

  </div>
</section><!-- End Portfolio Section -->