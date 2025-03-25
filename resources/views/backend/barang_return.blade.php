@include('backend/layouts/header')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('judul', 'Returned')
@section('search-engine', '/barang/search')

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
                                        @if(session('success-deleted'))
                                            <div class="alert alert-success">
                                                {{ session('success-deleted') }}
                                            
                                            </div>
                                        @endif

                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">

                                        </div>
                                    </div>
                                    <div>
                                    
                                    <form action="/barang/search" method="GET">
                                        <div class="input-group mb-3 container">
                                            <input type="date" class="form-control" name="tanggal_pengembalian" id="tanggal_pengembalian" placeholder="Tanggal Pengembalian">
                                            <button type="submit" class="btn btn-secondary">Cari</button>
                                        </div>
                                    </form>
  
                                    </div>
                                    <div class="text-end container">
                                        <a href="#" id="printButton" class="btn btn-warning mb-2"><i class="bi bi-printer"></i> Print</a>
                                  
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Kode Barang</th>
                                                    <th>Surat Perintah</th>
                                                    <th>Tanggal Surat</th>
                                                    <th>Nama Peminjam</th>
                                                    <th>Nama Barang</th>
                                                    <th>Quantity</th>
                                                    <th>Tanggal Peminjaman</th>
                                                    <th>Tanggal Pengembalian</th>
                                                    <th>Catatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($pengembalians as $pengembalian)
                                                <tr class="text-center">
                                                    <td>{{$pengembalian->peminjaman->barang->kode_barang}}</td>
                                                    <td>{{$pengembalian->peminjaman->spt}}</td>
                                                    <td>{{date('d F Y', strtotime($pengembalian->peminjaman->tanggal_surat))}}</td>
                                                    <td>{{ $pengembalian->peminjaman->pegawai->nama  }}</td>
                                                    <td>{{ $pengembalian->peminjaman->barang->nama ?? 'N/A' }} ({{ $pengembalian->peminjaman->barang->deskripsi ?? 'N/A' }})</td>
                                                    <td>{{ $pengembalian->peminjaman->jumlah_pinjam ?? 'N/A' }}</td>
                                                    <td>{{ date('d F Y', strtotime($pengembalian->peminjaman->tanggal_peminjaman)) }}</td>
                                                    <td>{{ date('d F Y', strtotime($pengembalian->tanggal_pengembalian)) }}</td>
                                                    <td>{{$pengembalian->catatan}}</td>
                                                    <td>
                                                        <a href="/delete-history/{{$pengembalian->id}}" class="btn btn-danger btn-icon" data-confirm="Apakah Anda yakin ingin menghapus data ini?"><i class="bi bi-trash"></i></a> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div id="paginationLinks">
                                            {{ $pengembalians->links() }}
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

    

        <script>
            // Ambil tanggal_pengembalian dan pencarian 'value' (nama) dari URL
            const urlParams = new URLSearchParams(window.location.search);
            const tanggalPengembalian = urlParams.get('tanggal_pengembalian');
            const searchValue = urlParams.get('search');
        
            // Buat URL cetak PDF dengan mempertahankan query yang ada
            let printUrl = "{{ url('/cetak-pdf') }}";
        
            if (tanggalPengembalian) {
                // Jika ada tanggal_pengembalian, tambahkan ke URL cetak PDF
                printUrl += "?tanggal_pengembalian=" + tanggalPengembalian;
            }
        
            if (searchValue) {
                // Jika ada pencarian 'value' (nama), tambahkan ke URL cetak PDF
                if (tanggalPengembalian) {
                    // Jika sudah ada parameter sebelumnya, tambahkan tanda '&' untuk parameter baru
                    printUrl += "&";
                } else {
                    // Jika belum ada parameter sebelumnya, tambahkan tanda '?' untuk parameter pertama
                    printUrl += "?";
                }
                printUrl += "search=" + searchValue;
            }
        
            // Setel href tombol "Print" dengan URL cetak PDF yang sesuai
            document.getElementById('printButton').href = printUrl;
        </script>

        <script>
                        document.addEventListener('DOMContentLoaded', function () {
                const confirmLinks = document.querySelectorAll('[data-confirm]');
                
                confirmLinks.forEach(function (link) {
                    link.addEventListener('click', function (event) {
                        const confirmation = confirm(link.getAttribute('data-confirm'));
                        
                        if (!confirmation) {
                            event.preventDefault(); // Batalkan navigasi jika pengguna tidak mengonfirmasi
                        }
                    });
                });
            });
        </script>

@include('backend/layouts/js');
	</body>

</html>