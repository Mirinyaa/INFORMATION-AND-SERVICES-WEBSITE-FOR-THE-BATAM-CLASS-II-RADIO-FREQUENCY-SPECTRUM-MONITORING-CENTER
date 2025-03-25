
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">


      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="/" class="logo me-auto me-lg-0"><img src="/frontend/assets/img/kominfo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/tugas-dan-fungsi">Tugas dan Fungsi</a></li>
              <li><a href="/struktur">Struktur Organisasi</a></li>
              <li><a href="/visi-dan-misi">Visi dan Misi</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Pelayanan & Pengaduan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/izin-amatir">Izin Amatir Radio</a></li>
              <li><a href="/izin-spektrum">Izin Spektrum Frekuensi Radio</a></li>
              <li><a href="/perpanjangan">Perpanjangan Sertifikat Reor</a></li>
              <li><a href="https://laporgangguansfr.postel.go.id/">Lapor Gangguan Frekuensi</a></li>
              <li><a href="https://www.postel.go.id/sdppi_maps/10-20200601-sdppi-maps-simulasi-bhp.php">Simulasi Biaya Hak penggunaan (BHP) Frekuensi Radio</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto " href="/galeri">Galeri</a></li>
          <li><a class="nav-link scrollto" href="/kontak">Kontak</a></li>
          @if(isset(Auth::user()->email))
          <li class="dropdown"><a href="#"><span>{{Auth::user()->email}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/dashboard">Dashboard</a></li>
              <form action="{{route('logout')}}" method="post">
                @csrf
              <li><button type="submit" style="margin-left: 20px; font-size: 15px;" class="dropdown-item">Logout</button></li>
              </form
            </ul>
          </li>
          @else 
          <li class="dropdown"><a href="/login"><span>Login</span></a>
          </li>
          @endif
        </ul>
         </li>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
