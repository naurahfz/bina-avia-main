<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
    <div class="logo me-auto">
      <a href="index.html"><img src="assets/img/logo.jpg" alt="" class="img-fluid" /></a>
    </div>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto {{ Request::is('home') ? 'active' : '' }}" href="/home">Beranda</a></li>
        <li><a class="nav-link {{ Request::is('program-pelatihan') ? 'active' : '' }}" href="/program-pelatihan">Program Pelatihan</a></li>
        <li><a class="nav-link {{ Request::is('galeri') ? 'active' : '' }}" href="/galeri">Galeri</a></li>
        <li><a class="nav-link {{ Request::is('berita') ? 'active' : '' }}" href="/berita">Berita</a></li>
        <!-- <li><a class="nav-link scrollto" href="/home#testimonials">Testimoni</a></li> -->
        <li><a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <!-- .navbar -->
  </div>
</header>
<!-- End Header -->