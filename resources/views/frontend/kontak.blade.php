@include('frontend/layouts/header')
<body>

  @include('frontend/layouts/navbar')

<br></br>
<br></br>

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">
      <div class="row">
        
        <div class="justify-content-center" data-aos-delay="100">
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
                <br></br>
                <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo_kominfo_sdppi.png" alt="" class="img-fluid"></a>
              <p>
                Tj. Pinggir, Kec. Sekupang<br>
                Kota Batam, Kepulauan Riau 29425<br>
                <strong>Phone:</strong> (0778) 327189<br>
                <strong>Email:</strong> upt_batam@postel.go.id<br>
              </p>
              <div class="col-lg-6 col-md-6">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15956.191665952261!2d103.9348366!3d1.1259712!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98b3b3541969b%3A0x9b370451048121ff!2sBalmon%20Spektrum%20Frekuensi%20Radio%20Kelas%20II%20Batam!5e0!3m2!1sid!2sid!4v1693382910793!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
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