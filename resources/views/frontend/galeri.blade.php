@include('frontend/layouts/header')
<body>

@include('frontend/layouts/navbar')
  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      {{-- <div class="container">

        <div class="row">
          <div class="justify-content-center" data-aos-delay="100">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 text-center my-2">
                     <br></br>
                      <h2>Galeri Kegiatan</h2>
                      <br></br>
                  </div>
               </div>
               <div class="portfolio-item d-flex justify-content-center flex-wrap">
                  <div class="">
                     <img src="/frontend/assets/img/galeri/1.jpg" alt="" width="350" height="350" class="fancylight popup-btn" data-fancybox-group="light"> 
                     <img class="img-fluid" alt="">
                    
                  </div>
                  <div class="">
                    <img src="/frontend/assets/img/galeri/2.jpg" alt="" width="350" height="350" class="fancylight popup-btn" data-fancybox-group="light"> 
                     <img class="img-fluid" alt="">
                   
                  </div>
                  <div class="">
                    <img src="/frontend/assets/img/galeri/3.jpg" alt="" width="350" height="350" class="fancylight popup-btn" data-fancybox-group="light"> 
                     <img class="img-fluid" alt="">
                    
                  </div>
                  <div class="">
                    <img src="/frontend/assets/img/galeri/4.jpg" alt="" width="250" height="350" class="fancylight popup-btn" data-fancybox-group="light"> 
                     <img class="img-fluid" alt="">
                   
                  </div>
                  <div class="">
                    <img src="/frontend/assets/img/galeri/5.jpg" alt="" width="550" height="350" class="fancylight popup-btn" data-fancybox-group="light"> 
                     <img class="img-fluid" alt="">
                    
                  </div>
               </div>
            </div>
            </div>
        </div>

      </div> --}}







      <!-- Modal gallery -->
<section class="">
  <!-- Section: Images -->
  <section class="">
    <div class="container d-flex justify-content-center flex-wrap ">
      <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <div
          class="bg-image hover-overlay ripple shadow-1-strong rounded"
          data-ripple-color="light"
        >
          <img
            src="/frontend/assets/img/galeri/1.jpg"
            class="w-100"
          />
          <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 mb-4 mb-lg-0">
        <div
          class="bg-image hover-overlay ripple shadow-1-strong rounded"
          data-ripple-color="light"
        >
          <img
            src="/frontend/assets/img/galeri/2.jpg"
            class="w-100"
          />
          <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 mb-4 mb-lg-0">
        <div
          class="bg-image hover-overlay ripple shadow-1-strong rounded"
          data-ripple-color="light"
        >
          <img
            src="/frontend/assets/img/galeri/3.jpg"
            class="w-100"
          />
          <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal3">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div
          class="bg-image hover-overlay ripple shadow-1-strong rounded"
          data-ripple-color="light"
        >
          <img
            src="/frontend/assets/img/galeri/4.jpg"
            class="w-100"
          />
          <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal3">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div
          class="bg-image hover-overlay ripple shadow-1-strong rounded"
          data-ripple-color="light"
        >
          <img
            src="/frontend/assets/img/galeri/5.jpg"
            class="w-100"
          />
          <a href="#!" data-mdb-toggle="modal" data-mdb-target="#exampleModal3">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Images -->
    </section><!-- End About Section


  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  @include('frontend/layouts/footer')
 

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('frontend/layouts/script')
</body>

</html>