@include('frontend/layouts/header')
</head>

<body>

  @include('frontend/layouts/navbar')
  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="justify-content-center" data-aos-delay="100">
            <br></br><br></br>
            <h2>Izin Spektrum Frekuensi Radio</h2>
            <p>
              Izin spektrum frekuensi radio diperlukan untuk mengatur penggunaan yang efisien dan aman dari spektrum frekuensi radio. Dengan memiliki izin ini, pengguna dapat melindungi hak mereka untuk mengakses dan menggunakan frekuensi tertentu, serta memastikan bahwa tidak ada gangguan atau interferensi yang merusak komunikasi antar perangkat.
            </p>
            <h2>Persyaratan</h2>
            <ol>
              <li>Surat Permohonan Izin Stasiun Radio (ISR)</li>
              <li>Surat Kesanggupan Pembayaran Biaya Hak Penggunaan (BHP) ISR</li>
              <li>Nomor Induk Berusaha (NIB) RBA yang sudah terintegrasi dengan OSS</li>
              <li>Surat Kuasa apabila diwakilkan</li>
              <li>Persyaratan sesuai jenis perizinan ISR dapat dilihat pada<a href="https://pelayanansdppi.postel.go.id/"> https://pelayanansdppi.postel.go.id/</a></li>
            </ol>
            <h2>Sistem, Mekanisme dan Prosedur</h2>
            <img src="assets/img/prosedur.PNG" style="width: 70%;">
            <br>
            <ol>
              <li>Sudah memiliki NIB RBA dan teritegrasi dengan Kominfo melalui PB-UMKU</li>
              <li>Akses Spectraweb di <a href="https://spectraweb.ditfrek.postel.go.id/">https://spectraweb.ditfrek.postel.go.id/</a></li>
              <li>Mengisi formulir pengajuan ISR</li>
              <li>Verifikasi Dokumen pengajuan ISR</li>
              <li>Analisa Teknis dokumen pengajuan ISR</li>
              <li>Penerbitan dan pembayaran Invoice / SPP</li>
              <li>Pengajuan ISR selesai dan dapat diunduh</li>
            </ol>
            <h2>Waktu Penyelesaian</h2>
            <p>
              Jangka waktu penyelesaian permohonan ISR baru paling lama 1 hari kerja.
            </p>
            <h2>Biaya/Tarif</h2>
            <ol>
              <li>Tarif BHP Frekuensi Radio ditetapkan berdasarkan data parameter teknis dan zona lokasi stasiun radio, sebagaimana diatur dalam PP No. 80 Tahun 2015</li>
              <li>Simulasi BHP Frekuensi Radio pada Aplikasi SDPPI Maps (postel.go.id) atau pada link berikut <a href="https://www.postel.go.id/sdppi_maps/10-20200601-sdppi-maps-simulasi-bhp.php">BHP Frekuensi Radio</a></li>
            </ol>
            <h2>Produk Pelayanan</h2>
            <p>
              Izin Stasiun Radio (ISR) Satelit, ISR Broadband Wireless Access (BWA), ISR STL-TV, ISR Microwave Link, ISR Penyiaran, ISR Maritim, ISR Penerbangan, Izin Pita Frekuensi Radio (IPFR)
            </p>
            <h2>Pengaduan Layanan</h2>
            <ol>
              <li>LAPOR! <a href="https://www.lapor.go.id/">https://www.lapor.go.id/</a>
              <li>Contact Center SDPPI</li>
              <ul style="list-style-type:disc;">
                <li>Telpon : 159</li>
                <li>Email  : callcenter_sdppi@kominfo.go.id</li>
              </ul>
              <li>Website Direktorat Jenderal Sumber Daya dan Perangkat Pos dan Informatika (kominfo.go.id)</li>
              <li>Mobile App ADEYA</li>
              <li>Whats App Pelayanan (08111100159)</li>
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