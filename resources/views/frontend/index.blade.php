@include('frontend/layouts/header')
<body>
@include('frontend/layouts/navbar')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>BALAI MONITOR SPEKTRUM FREKUENSI RADIO KELAS II BATAM<span></span></h1>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="/frontend/assets/img/kegiatan.jpg" class="img-fluid rounded" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h4>Balai Monitor Spektrum Frekuensi Kelas II Batam</h4>
            <p>
              Spektrum Frekuensi Radio merupakan sumber daya alam yang terbatas sama seperti sumber daya alam yang ada di tanah
              dan juga air, kalau tidak dimanfaatkan dengan benar bisa merugikan warga negara. Karena terbatas maka harus dimanfaatkan
              untuk kepentingan negara sebagai mana diamanatkan dalam UUD 45 pasal 33 ayat 2 yaitu Sumber daya alam terdiri dari tanah,
              air, udara dan semua yang terkandung di dalamnya harus dijaga dan dilindungi oleh negara dan dipergunakan untuk sebesar-
              besarnya kemakmuran rakyat.
            </p>
            <p>
              Balai Monitor Spektrum Frekuensi Radio Kelas II Batam selaku Unit Pelaksana Teknis (UPT) Direktorat Jenderal Sumber Daya
              dan Perangkat Pos dan Informatika (Ditjen SDPPI) di daerah mengemban tugas dan fungsi sebagai pelaksana pengawasan dan
              pengendalian spektrum frekuensi radio dan standar perangkat pos dan informatika di wilayah Provinsi Kepulauan Riau.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="/frontend/assets/img/clients/1-sdppi.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="/frontend/assets/img/clients/2-kominfo.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="/frontend/assets/img/clients/3-prov.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="/frontend/assets/img/clients/4-batam.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="/frontend/assets/img/clients/5-logo.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pelayanan</h2>
          <p>Periksa Layanan kami</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Izin Amatir Radio</a></h4>
              <p>Izin untuk mendirikan, memiliki, mengoperasikan stasiun amatir radio dan menggunakan frekuensi radio pada alokasi yang telah ditentukan untuk radio amatir di Indonesia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Izin Spektrum Frekuensi Radio</a></h4>
              <p>izin yang diberikan oleh otoritas pengatur komunikasi atau badan regulator yang berwenang untuk menggunakan sebagian atau seluruh spektrum frekuensi radio tertentu. Izin ini diperlukan untuk menghindari interferensi dan mengatur penggunaan spektrum frekuensi radio yang terbatas.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Perpanjangan Sertifikat Reor</a></h4>
              <p>Sertifikasi Radio Elektronik dan Elektronik Radio atau yang lebih dikenal dengan sebutan REOR merupakan salah satu layanan publik yang diselenggarakan oleh Direktorat Jenderal Sumber Daya dan Perangkat Pos dan Informatika (Ditjen SDPPI), Kementerian Komunikasi dan Informatika. Sertifikat tersebut adalah keterangan/bukti bahwa seseorang memiliki kompetensi untuk dapat melakukan pekerjaan sebagai radio elektronika dan/atau operator radio.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

    @include('frontend/layouts/footer')
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('frontend/layouts/script')
</body>

</html>