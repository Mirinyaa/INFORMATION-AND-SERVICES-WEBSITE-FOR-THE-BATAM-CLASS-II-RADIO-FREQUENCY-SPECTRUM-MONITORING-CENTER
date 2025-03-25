@include('backend/layouts/header')
@section('judul', 'Dashboard')
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Main container start -->
			<div class="main-container">

@include('backend/layouts/sidebar')
				<!-- App container starts -->
				<div class="app-container">


@include('backend/layouts/navbar')


					<!-- App body starts -->
					<div class="app-body">

						<!-- Row starts -->
						<div class="row">
							<div class="col-lg-4 col-sm-6 col-12">
								<div class="card mb-4">
									<div class="card-body d-flex align-items-center p-0">
										<div class="p-4">
											<i class="bi bi-sticky fs-1 lh-1 text-primary"></i>
										</div>
										<div class="py-4">
											<h5 class="text-secondary fw-light m-0">Pegawai Yang Pinjam Barang</h5>
											{{-- <h1 class="m-0">{{ $countPegawaiPinjam }}</h1> --}}
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-sm-6 col-12">
								<div class="card mb-4">
									<div class="card-body d-flex align-items-center p-0">
										<div class="p-4">
											<i class="bi bi-emoji-smile fs-1 lh-1 text-primary"></i>
										</div>
										<div class="py-4">
											<h5 class="text-secondary fw-light m-0"></h5>
											{{-- <h1 class="m-0">{{ $countPegawaiSelesaiPinjam }}</h1> --}}
										</div>
									</div>
								</div>
							</div>

						</div>
						<!-- Row ends -->

						<!-- Row starts -->
						
						<div class="row">
							<div class="card mb-4">
								<div class="card-body d-flex justify-content-center align-items-center">
									<div class="p-4">
										<p class="current-time" style="font-size: 35px;">Current Date and Time: <span id="currentDateTime">{{ now()->format('Y-m-d H:i:s') }}</span></p>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->



	

					</div>
					<!-- App body ends -->

				</div>
				<!-- App container ends -->

			</div>
			<!-- Main container end -->

		</div>
		<!-- Page wrapper end -->

		<script>
			function updateDateTime() {
				const currentDateTimeElement = document.getElementById('currentDateTime');
				const now = new Date();
				currentDateTimeElement.textContent = now.toLocaleString();
			}
		  
			setInterval(updateDateTime, 1000); // Memperbarui setiap 1 detik
		
		  </script>
		  
		  
@include('backend/layouts/js');
	</body>

</html>