@include('backend/layouts/header')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('judul', 'Returned')
@section('search-engine', '/barang-return/search')

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

                        <div class="col-xxl-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">

                                        </div>
                                    </div>
                                    <div>
                                    
                   
  
                                    </div>
                                    <div class="text-end container">
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Nama Peminjam</th>
                                                    <th>Nama Barang</th>
                                                    <th>Quantity</th>
                                                    <th>Tanggal Peminjaman</th>
                                                    <th>Tanggal Pengembalian</th>
                                                    <th>Catatan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($peminjamans as $peminjaman)
                                                <tr class="text-center">
                                                    <td>{{$i++}}</td>
                                                    <td>{{ $peminjaman->pegawai->nama }}</td>
                                                    <td>{{ $peminjaman->barang->nama ?? 'N/A' }}</td>
                                                    <td>{{ $peminjaman->jumlah_pinjam ?? 'N/A' }}</td>
                                                    <td>{{ $peminjaman->tanggal_peminjaman ?? 'N/A' }}</td>
                                                    <td>{{ $peminjaman->pengembalian->tanggal_pengembalian ?? 'N/A' }}</td>
                                                    <td>{{ $peminjaman->pengembalian->catatan ?? 'N/A' }}</td>
                                                    <td>{{ $peminjaman->status ?? 'N/A' }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div id="paginationLinks">
                                            {{ $peminjamans->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

	

					</div>
					<!-- App body ends -->

				</div>
				<!-- App container ends -->

			</div>
			<!-- Main container end -->

		</div>
		<!-- Page wrapper end -->
@include('backend/layouts/js');
	</body>

</html>