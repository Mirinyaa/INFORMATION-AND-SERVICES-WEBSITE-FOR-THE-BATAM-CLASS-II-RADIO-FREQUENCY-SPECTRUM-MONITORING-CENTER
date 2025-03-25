@include('backend/layouts/header')
@section('search-engine', '/search/barang')
@section('judul', 'List Barang')
<style>
		.card-img-top{
			border-radius: 30px;
			padding: 20px;
			height: 250px;!important
		}
		.card{
			border-radius: 30px;
			box-sizing: border-box;
			box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
		}
		.card-body{
			padding: 25px;
			margin-top: -15px;
		}
		.btn-primary{
			border-radius: 50px;
			width: 120px;
		}
		.btn-primary:hover{
			background-color: black;
			border: none;
		}
		h3,h5{
			color: rgb(0, 91, 228);
		}
		</style>
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
						
						{{-- <div class="row">
							<div class="d-flex flex-wrap justify-content-around">
								@foreach ($barang as $data)
								<div class="card custom-card mt-3">
									<img src="/storage/photos/{{ $data->gambar }}" class="card-img-top" alt="Gambar Barang">
									<div class="card-body">
										<h5 class="card-title custom-card-title">Nama Barang</h5>
										<p class="card-text custom-card-text">Jumlah Barang: 10</p>
										<button class="btn btn-primary" style="">Pinjam</button>
									</div>
								</div>
								@endforeach
							</div>
						</div> --}}
						
						<div class="container">
							@if(session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
							@elseif(session('error'))
							<div class="alert alert-danger">
								{{ session('error') }}
							</div>
							@endif
							<div class="row row-cols-1 row-cols-md-3 g-4">
						@foreach ($barang as $data)
						<div class="col">
							<div class="card">
								<img src="/storage/photos/{{ $data->gambar }}" class="card-img-top"  alt="...">
								<div class="card-body">
									<h5 class="card-title">{{ $data->nama }}</h5>
									<hr>
									<p class="card-text fs-5">Deskripsi : {{ $data->deskripsi }}</p>
									<p class="card-text fs-5">Total Barang : {{ $data->jumlah_awal }}</p>
									<p class="card-text fs-5 fw-bold">Barang Yang Tersedia : {{ $data->jumlah_tersedia }}</p>
								</div>
								<div class="mb-5 d-flex justify-content-around">
									<button data-bs-toggle="modal" data-bs-target="#pinjamModal" class="btn btn-primary btn-pinjam" data-idbarang="{{ $data->id }}">Pinjam</button>
								</div>
							</div>
						</div>
						@endforeach
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

		<!-- Modal -->
		<form action="{{ route('user.pinjam') }}" method="post">
			@csrf
			<div class="modal fade" id="pinjamModal" tabindex="-1" aria-labelledby="pinjamModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="pinjamModalLabel">Pinjam Barang</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<!-- Form input untuk jumlah yang mau dipinjam -->
							<input type="hidden" name="id_barang" id="id_barang_input">
							<label for="spt">Surat Perintah Tugas</label>
							<input type="text" name="spt" class="form-control mb-2" id="spt" required>
							<label for="jumlahPinjam">Jumlah yang ingin dipinjam:</label>
							<input type="number" name="jumlah_pinjam" class="form-control mb-2" id="jumlahPinjam" required>
							<label for="tanggal_surat">Tanggal Surat</label>
							<input type="date" name="tanggal_surat" class="form-control mb-2" id="tanggal_surat" required>
							<label for="waktu_pelaksanaan">Waktu Pelaksanaan</label>
							<input type="time" name="waktu_pelaksanaan" class="form-control mb-2" id="waktu_pelaksanaan" required>
							<label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
							<input type="date" name="tanggal_pelaksanaan" class="form-control mb-2" id="tanggal_pelaksanaan" required>
							<label for="kegiatan" class="form-label">Kegiatan</label>
							<textarea type="text" name="kegiatan" id="kegiatan" class="form-control mb-2"></textarea>
							<label for="tanggal_peminjaman">Tanggal Peminjaman</label>
							<input type="date" name="tanggal_peminjaman" class="form-control" id="tanggal_peminjaman" required>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Pinjam</button>
						</div>
					</div>
				</div>
			</div>
		</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Menangkap id_barang saat tombol "Pinjam" diklik
        $('.btn-pinjam').click(function () {
            var idBarang = $(this).data('idbarang');
            $('#id_barang_input').val(idBarang);
        });
    });
</script>
		<!-- Page wrapper end -->
@include('backend/layouts/js');
	</body>

</html>