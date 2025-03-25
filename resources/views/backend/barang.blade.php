@include('backend/layouts/header')
<style>
	td {
		vertical-align: middle;
	}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('judul', 'Barang')
@section('search-engine', '/cari-barang')
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
                                    <div class="table-responsive container">
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @elseif(session('success-hapus-barang'))
                                        <div class="alert alert-success">
                                            {{ session('success-hapus-barang') }}
                                        </div>
                                        @endif

                                        <div class="text-end">
											<button type="button" class="btn btn-info mb-2" data-bs-toggle="modal"
											data-bs-target="#exampleModalCenter">
											<i class="bi bi-plus-square"></i> Add
										</button>
                                        </div>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                                        Tambah Data Barang
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/tambah-barang" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <label class="form-label" for="kodebarang">Kode Barang</label>
                                                    <input type="number" id="kodebarang" name="kode_barang" class="form-control mb-2">
                                                    <label class="form-label" for="barang">Nama Barang</label>
                                                    <input type="text" id="barang" name="nama" class="form-control mb-2">
                                                    <label class="form-label">Merk / Type</label>
                                                    <textarea name="deskripsi" class="form-control mb-2" cols="30" rows="2"></textarea>
                                                    <label class="form-label" for="total">Gambar Barang</label>
                                                    <input type="file" id="total" name="photo" class="form-control mb-2">
                                                    <label class="form-label" for="total">Jumlah Total Barang</label>
                                                    <input type="number" id="total" name="jumlah_awal" class="form-control mb-2">
                                                    <label class="form-label" for="available">Jumlah Yang Tersedia</label>
                                                    <input type="number" id="available" name="jumlah_tersedia" class="form-control mb-2">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Save 
                                                    </button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                        <table class="table table-striped table-bordered m-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Merk / Type</th>
                                                    <th>Gambar Barang</th>
                                                    <th>Jumlah Awal Barang</th>
                                                    <th>Jumlah Yang Tersedia</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($barang as $data)
                                                <tr class="text-center">
                                                    <td>{{$data->kode_barang}}</td>
                                                    <td>{{$data->nama}}</td>
                                                    <td>{{$data->deskripsi}}</td>
                                                    <td><img src="/storage/photos/{{ $data->gambar }}" class="rounded-circle img-4xx" alt="profile" /></td>
                                                    <td>{{$data->jumlah_awal}}</td>
                                                    <td>{{$data->jumlah_tersedia}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary edit-barang-button" data-barang-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#edit-barang">
                                                            <i class="bi bi-sticky"></i>
                                                        </button>
                                                    
                                                        <button type="button" class="btn btn-danger delete-barang-button" data-bs-target="#delete" data-bs-toggle="modal" data-barang-id="{{ $data->id }}"><i class="bi bi-trash"></i></button>
                                                      
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div id="paginationLinks">
                                            {{ $barang->links() }}
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

        <div class="modal fade" id="edit-barang" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                           Update Data
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-barang-form" action="/update-data-barang" method="post">
                            @csrf
                        <label class="form-label" for="nama">Kode Barang</label>
                        <input type="number" id="kode_barang" name="kode_barang" class="form-control mb-2" value="{{ old('kode_barang') }}">
                        <label class="form-label" for="nama">Nama Barang</label>
                        <input type="text" id="nama" name="nama" class="form-control mb-2" value="{{ old('nama') }}">
                        <label class="form-label" for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control mb-2">{{ old('deskripsi') }}</textarea>
                        <label class="form-label" for="photo">Gambar Barang</label>
                        <input type="file" id="photo" name="photo" class="form-control mb-2">
                        <label class="form-label" for="jumlah_awal">Jumlah Total Barang</label>
                        <input type="number" id="jumlah_awal" name="jumlah_awal" class="form-control mb-2" value="{{ old('jumlah_awal') }}">
                        <label class="form-label" for="jumlah_tersedia">Jumlah Yang Tersedia</label>
                        <input type="number" id="jumlah_tersedia" name="jumlah_tersedia" class="form-control mb-2" value="{{ old('jumlah_tersedia') }}">
                        </div>
                    </form>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" form="edit-barang-form">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>

{{-- MODAL HAPUS DATA --}}

<div class="modal fade" id="delete" tabindex="-1"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">
                Alert
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="delete-form" action="{{ route('barang.destroy', '') }}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" id="delete-barang-id" name="barang_id">
            <div class="modal-body">
                <h6 class="modal-text text-center">Yakin mau dihapus?</h6>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn btn-danger">
                Delete
            </button>
        </div>
    </form>
    </div>
</div>
</div>

            <script>
                $(document).ready(function() {
                    $('.edit-barang-button').on('click', function() {
                        var barangId = $(this).data('barang-id');
                        var form = $('#edit-barang-form');
                        form.attr('action', '/update-data-barang/' + barangId);
                        form.attr('enctype', 'multipart/form-data');
            
                        // Set data old to the form fields
                        var row = $(this).closest('tr');
                        var kode_barang = row.find('td:eq(0)').text();
                        var nama = row.find('td:eq(1)').text();
                        var deskripsi = row.find('td:eq(2)').text();
                        var gambar = row.find('td:eq(3) img').attr('src');
                        var jumlah_awal = row.find('td:eq(4)').text();
                        var jumlah_tersedia = row.find('td:eq(5)').text();
            
                        // Populate the input fields and textarea with the retrieved data
                        $('#kode_barang').val(kode_barang);
                        $('#nama').val(nama);
                        $('#deskripsi').val(deskripsi); // This line should correctly populate the textarea.
                        $('#photo').prev('img').attr('src', gambar);
                        $('#jumlah_awal').val(jumlah_awal);
                        $('#jumlah_tersedia').val(jumlah_tersedia);
                    });
                });          
                
                
                document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.querySelectorAll(".delete-barang-button");

        deleteButtons.forEach((button) => {
            button.addEventListener("click", function () {
                const barangId = button.getAttribute("data-barang-id");
                const deleteForm = document.querySelector("#delete-form");
                const actionRoute = `{{ route('barang.destroy', '') }}/${barangId}`;
                deleteForm.setAttribute("action", actionRoute);
                document.querySelector("#delete-barang-id").value = barangId;
            });
        });
    });
            </script>
        
        
        
@include('backend/layouts/js');
	</body>

</html>