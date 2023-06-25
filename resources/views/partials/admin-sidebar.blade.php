      <style type="text/css">
        .nav-item.active .nav-link i{color: #000 !important;}
        .nav-item.active .nav-link span{color: #000 !important;}
      </style>
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
              <i class="mdi mdi-speedometer menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/news">
              <i class="mdi mdi-newspaper menu-icon"></i>
              <span class="menu-title">Berita</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/gallery">
              <i class="mdi mdi-image-area menu-icon"></i>
              <span class="menu-title">Galeri</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/branch">
              <i class="mdi mdi-office-building menu-icon"></i>
              <span class="menu-title">Kantor cabang</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="/admin/training">
              <i class="mdi mdi-shield-airplane menu-icon"></i>
              <span class="menu-title">Pelatihan</span>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="/admin/testimonial">
              <i class="mdi mdi-star-face menu-icon"></i>
              <span class="menu-title">Testimoni</span>
            </a>
          </li>
          
          @if (Auth::user()->role=="superadmin")
          <li class="nav-item">
            <a class="nav-link" href="/admin/user">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Pengaturan User</span>
            </a>
          </li>
          @endif

          <li class="nav-item">
            <a class="nav-link" href="/admin/profile">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Profil</span>
            </a>
          </li>
          
        </ul>
      </nav>