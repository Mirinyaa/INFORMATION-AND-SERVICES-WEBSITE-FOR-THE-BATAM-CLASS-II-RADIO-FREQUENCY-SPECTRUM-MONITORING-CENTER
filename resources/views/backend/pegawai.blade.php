@include('backend/layouts/header')
<style>
	td {
		vertical-align: middle;
	}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('search-engine', '/pegawai/search')
@section('judul', 'Pegawai')
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
						<!-- Row start -->
						<div class="row ">
							<div class="col-xxl-12">
								<div class="card mb-4">
									<div class="card-body">
										@if(session('success'))
										<div class="alert alert-success">
											{{ session('success') }}
										</div>
										@elseif(session('success-deleted'))
										<div class="alert alert-success">
											{{ session('success-deleted') }}
										</div>
										@elseif(session('success-add-data'))
										<div class="alert alert-success">
											{{ session('success-add-data') }}
										</div>
										@endif
										@if ($errors->has('email'))
										<div class="alert alert-danger text-danger">{{ $errors->first('email') }}</div>
										@elseif($errors->has('photo'))
										<div class="alert alert-danger text-danger">{{ $errors->first('photo') }}</div>
										@endif
										<div class="text-end container mb-2">
											<button type="button " class="btn btn-info" data-bs-toggle="modal"
											data-bs-target="#exampleModalCenter">
											<i class="bi bi-plus-square"></i> Add
										</button>
									</div>
									<form action="/tambah-data-pegawai" method="post" enctype="multipart/form-data">
										@csrf
										<div class="modal fade" id="exampleModalCenter" tabindex="-1"
										aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">
														Tambah Data
													</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<label class="form-label">Nama Pegawai</label>
													<input type="text" class="form-control mb-2" name="nama" placeholder="Nama Pegawai" />
													<label class="form-label">NIP</label>
													<input type="text" class="form-control mb-2" name="nip" placeholder="NIP" />
													<label class="form-label">Password</label>
													<input type="password" class="form-control mb-2" name="password" placeholder="Password" />
													<label class="form-label">Email</label>
													<input type="text" class="form-control mb-2" name="email" placeholder="Email" />
													<label class="form-label">Posisi / Jabatan </label>
													<input type="text" class="form-control mb-2" name="posisi" placeholder="Posisi / Jabatan" />
													<label class="form-label">Role</label>
													<select class="form-select mb-2" name="role">
														<option value="superadmin">Super Admin</option>
														<option value="admin">Admin</option>
														<option value="user">User</option>
													</select>
													<label class="form-label" for="formFile">Photo</label>
													<input class="form-control" name="photo" type="file" id="formFile" >
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
														Close
													</button>
													<button type="submit" class="btn btn-primary">
														Save
													</button>
												</div>
											</div>
										</div>
									</form>
										</div>
										<div class="table-responsive container">
											<table class="table table-striped table-bordered m-0">
												<thead>
													<tr class="text-center">
														<th scope="col">Nama</th>
														<th scope="col">NIP</th>
														<th scope="col">Photo</th>
														<th scope="col">Email</th>
														<th scope="col">Posisi</th>
														<th scope="col">Role</th>
														<th scope="col">Aksi</th>
													</tr>
												</thead>
												<tbody class="">
													@foreach($pegawai as $data)
													<tr class="text-center mt-auto">
														<td>{{$data->nama}}</td>
														<td>{{$data->nip}}</td>
														<td><img src="/storage/photos/{{ $data->photo }}" class="rounded-circle img-4xx" alt="profile" /></td>
														<td>{{$data->email}}</td>
														<td>{{$data->posisi}}</td>
														<td>{{$data->role}}</td>
														<td>
															<div class="d-flex justify-content-around">
															<button type="button" class="btn btn-secondary edit-pegawai-button" data-pegawai-id="{{ $data->id }}" data-role="{{ $data->role }}" data-bs-toggle="modal" data-bs-target="#edit-pegawai"><i class="bi bi-sticky"></i></button>
															<button class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#hapus-user" data-id="{{ $data->id }}" ><i class="bi bi-trash"></i></button>
															</div>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										<div class="col-lg-12 mt-2">
											<div id="paginationLinks">
												{{ $pegawai->links() }}
											</div>
										</div>
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
	

<!-- Edit Pegawai Modal -->
<div class="modal fade" id="edit-pegawai" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                   Update Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-pegawai-form" action="/update-data-pegawai" method="post">
                    @csrf
                    <label class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control mb-2" name="nama" value="{{ old('nama') }}" placeholder="Nama Pegawai" />
					<label class="form-label">NIP</label>
                    <input type="text" class="form-control mb-2" name="nip" value="{{ old('nip') }}" placeholder="Nama Pegawai" />
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control mb-2" name="email" value="{{ old('email') }}" placeholder="Email" />
                    <label class="form-label">Posisi / Jabatan</label>
                    <input type="text" class="form-control mb-2" name="posisi" value="{{ old('posisi') }}" placeholder="Posisi / Jabatan" />
					<label class="form-label">Role</label>
					<select class="form-select mb-2" name="role">
						<option value="superadmin">Super Admin</option>
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
					<label class="form-label" for="formFile">Photo</label>
					
					<input class="form-control" name="photo" value="{{ isset($data) ? $data->photo : '' }}" type="file" id="formFile">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary" form="edit-pegawai-form">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>


{{-- MODAL HAPUS DATA --}}
<div class="modal fade" id="hapus-user" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                   Alert
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="delete-form" method="post">
                    @csrf
                    @method('DELETE')
                    <h6 class="modal-text text-center">Yakin mau hapus user ini ?</h6>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" form="delete-form" class="btn btn-primary">
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.edit-pegawai-button').on('click', function() {
            var pegawaiId = $(this).data('pegawai-id');
            var roleValue = $(this).data('role'); // Ambil nilai role dari atribut data-role

            var form = $('#edit-pegawai-form');
            form.attr('action', '/update-data-pegawai/' + pegawaiId);
            form.attr('enctype', 'multipart/form-data');

            // Set data old to the form fields
            var row = $(this).closest('tr');
            var nama = row.find('td:eq(0)').text();
			var nip = row.find('td:eq(1)').text();
            var photo = row.find('td:eq(2)').text();
            var email = row.find('td:eq(3)').text();
            var posisi = row.find('td:eq(4)').text();
			

            // Populate form fields
            $('#edit-pegawai input[name="nama"]').val(nama);
			$('#edit-pegawai input[name="nip"]').val(nip);
            $('#edit-pegawai input[name="photo"]').val(photo);
            $('#edit-pegawai input[name="email"]').val(email);
            $('#edit-pegawai input[name="posisi"]').val(posisi);

            // Set the selected value for the role select element
            $('#edit-pegawai select[name="role"]').val(roleValue);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#hapus-user').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang dipilih
            var dataId = button.data('id'); // Ambil data-id dari tombol yang dipilih

            // Tempatkan ID ke dalam modal
            var modal = $(this);
            modal.find('#data-id').text(dataId);

            // Atur action URL form sesuai dengan ID
            var form = modal.find('#delete-form');
            var actionUrl = '/delete/' + dataId;
            form.attr('action', actionUrl);
        });
    });
</script>

		
@include('backend/layouts/js');
	</body>
</html>