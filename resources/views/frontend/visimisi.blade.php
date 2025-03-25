@include('frontend/layouts/header')

<body>

  @include('frontend/layouts/navbar')

  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="justify-content-center" data-aos-delay="100">
            <br></br><br></br>
            <h1>Visi</h1>
            <p>
              Menjadikan Balmon SFR Kelas II Batam Sebagai Unit Pelaksana Teknis yang berkualitas internasional dalam pengendalian dan pengawasan spektrum frekuensi radio, guna terwujudnya tertib dan efisiensi penggunaan spektrum frekuensi di wilayah Kepulauan Riau
            </p>
            <br></br>
            <h1>Misi</h1>
            <ol>
              <li>Meningkatkan pengawasan dan pengendalian spektrum frekuensi radio diwilayah Kepulauan Riau.</li>
              <li>Meningkatkan pelayanan kepada pengguna spektrum radio.</li>
              <li>Meningkatkan kualitas pemahaman pengguna spektrum frekuensi radio terhadap peraturan perundang-undangan yang berlaku.</li>
              <li>Meminimalisir tingat pelanggaran peraturan perundang-undangan yang berlaku di bidang spektrum frekuensi radio.</li>
              <li>Mengantisipasi sumber daya manusia, sarana dan prasarana penunjang kegiatan operasional sehingga layak pakai dan sesuai perkembangan teknologi.</li>
            </ol>
            </div>
        </div>

      </div>
    </section><!-- End About Section -->


  </main><!-- End #main -->

  @include('frontend/layouts/footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('frontend/layouts/script')

</body>

</html>