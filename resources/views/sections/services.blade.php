<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container">
    <div class="section-title">
      <h2>Kantor Cabang</h2>
    </div>

    <div class="row justify-content-center">
      
      @foreach ($branchs as $b)
      <div class="col-md-6 mt-4">
        <div class="icon-box">
          <i class="bi bi-geo-alt"></i>
          <h4><a href="#">{{ $b->city }}</a></h4>
          <p>{{ $b->address }}</p>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</section>
<!-- End Services Section -->