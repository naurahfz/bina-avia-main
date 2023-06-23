<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
  <div class="container">
    <div class="section-title">
      <h2>Sedikit Cerita Dari Lulusan Bina Avia Persada</h2>
    </div>

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        @foreach ($testimonials as $te)
        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              {{ $te->review }}
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            @php
                $image = $te->image;
                if($image==""){$image="default.png";}
            @endphp
            <img src="assets/img/testimoni/{{ $image }}" class="testimonial-img" alt="" style="aspect-ratio: 1/1;object-fit: cover;"/>
            <h3>{{ $te->name }}</h3>
            <h4>{{ $te->position }}</h4>
          </div>
        </div>
        <!-- End testimonial item -->
        @endforeach

      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
<!-- End Testimonials Section -->