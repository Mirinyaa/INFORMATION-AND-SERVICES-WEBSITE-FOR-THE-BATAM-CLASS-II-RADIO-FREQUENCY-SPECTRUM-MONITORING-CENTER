@include('backend/layouts/header')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('search-engine', '/peminjaman-barang/search')
@section('judul', 'Pinjam Barang')

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
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @elseif(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @elseif(session('success-pengembalian-barang'))
                                    <div class="alert alert-success">
                                        {{ session('success-pengembalian-barang') }}
                                    </div>
                                @endif
                                <div class="container mt-3">
                                    <div class="tab-content" id="customTabContent">
                                        <div class="tab-pane fade show active" id="one" role="tabpanel">
                                            <div class="container text-end">
                                                <div class="text-end container">
                                                    <button type="button" class="btn btn-info"
                                                        style="margin-top:-20px;" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter">
                                                        <i class="bi bi-plus-square"></i> Add
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                Form
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('peminjamans.store') }}"
                                                                method="post">
                                                                @csrf
                                                                <label class="form-label" for="id_pegawai">Ketua TIM
                                                                    Kerja Pemeliharaan Infrastruktur SMFR dan Konsultasi Publik</label>
                                                                <select class="form-select mb-2" name="id_pegawai" required>
                                                                    @foreach ($pegawais as $pegawai)
                                                                        <option value="{{ $pegawai->id }}">
                                                                            {{ $pegawai->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label class="form-label" for="id_pegawai">Penanggung Jawab</label>
                                                                <select class="form-select mb-2" name="penanggung_jawab" required>
                                                                    @foreach ($pegawais as $pegawai)
                                                                        <option value="{{ $pegawai->id }}">
                                                                            {{ $pegawai->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="spt" class="form-label">Surat Perintah
                                                                    Tugas</label>
                                                                <input type="text" name="spt" id="spt" class="form-control mb-2" required>
                                                                <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                                                                <input type="date" name="tanggal_surat" id="tgl_surat" class="form-control mb-2" required>
                                                                <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan</label>
                                                                <input type="time" name="waktu_pelaksanaan" id="waktu_pelaksanaan" class="form-control mb-2" required>
                                                                <label for="tglpelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                                                                <input type="date" name="tanggal_pelaksanaan" id="tglpelaksanaan" class="form-control mb-2" required>
                                                                <label for="" class="form-label">Kegiatan</label>
                                                                <textarea type="text" name="kegiatan" class="form-control mb-2" required></textarea>
                                                                <label class="form-label">Barang</label>
                                                                    <div id="barang-container">
                                                                        <button type="button" id="add-barang-btn" class="btn btn-primary ">Add Barang</button>
                                                                        <button type="button" class="btn btn-danger" id="btn-hapus-barang">Hapus Barang</button>
                                                                        <div class="barang-input">
                                                                    <select class="form-select mb-2 mt-2" name="id_barang[]" id="id_barang">
                                                                        @foreach ($groupedBarangs as $key => $group)
                                                                        <optgroup label="{{ $key }}">
                                                                            @foreach ($group as $barang)
                                                                                <option value="{{ $barang->id }}" data-jumlah-tersedia="{{ $barang->jumlah_tersedia }}">
                                                                                    {{ $barang->nama }} - {{ $barang->deskripsi }}
                                                                                </option>
                                                                            @endforeach
                                                                        </optgroup>
                                                                        <!-- Tambahkan input jumlah pinjam untuk setiap barang -->
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('id_barang'))
                                                                        <div class="alert alert-danger mt-2">
                                                                            {{ $errors->first('id_barang') }}
                                                                        </div>
                                                                    @endif
                                                                    <label class="form-label" for="jumlah_pinjam">Jumlah Pinjam</label>
                                                                    <input type="number" name="jumlah_pinjam[]" class="form-control mb-2" style="width: 200px;" placeholder="Jumlah Pinjam" min="1" required>
                                                                </div>
                                                            </div>
                                                    
                                                            {{-- <span class="badge rounded-pill bg-info" id="sisa-stok" data-sisa-stok-awal="{{ $barangs[0]->jumlah_tersedia }}">
                                                                Sisa Stok Barang: {{ $barangs[0]->jumlah_tersedia }}
                                                            </span>
                                     --}}
                                                                <label class="form-label" for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                                                <input class="form-control mb-2" type="date" name="tanggal_peminjaman" required>
                                                                <label hidden class="form-label" for="status">Status</label>
                                                                <select hidden class="form-select" name="status">
                                                                    <option value="borrowed">Borrowed</option>
                                                                </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">
                                                                Save
                                                            </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg mx-auto">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered m-0">
                                                                <thead>
                                                                    <tr class="text-center">
                                                                        <th>Kode Barang</th>
                                                                        <th>Surat Perintah Tugas</th>
                                                                        <th>Ketua</th>
                                                                        <th>Penanggung Jawab</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Merk Type</th>
                                                                        <th>Quantity</th>
                                                                        <th>Tanggal Peminjaman</th>
                                                                        <th>Status</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="peminjamanTableBody">
                                                                    @foreach ($peminjamans as $peminjaman)
                                                                        <tr class="text-center">
                                                                            <td>{{ $peminjaman->barang->kode_barang ?? 'N/A' }}
                                                                            </td>
                                                                            <td>{{ $peminjaman->spt }}</td>
                                                                            <td>{{ $peminjaman->pegawai->nama }}</td>
                                                                            <td>
                                                                                @php
                                                                                    // Cari pegawai berdasarkan ID penanggung jawab
                                                                                    $penanggungJawab = $peminjaman->pegawai->where('id', $peminjaman->penanggung_jawab)->first();
                                                                    
                                                                                    // Jika pegawai ditemukan, tampilkan namanya; jika tidak, tampilkan "N/A"
                                                                                    echo $penanggungJawab ? $penanggungJawab->nama : 'N/A';
                                                                                @endphp
                                                            
                                                                            </td>
                                                                            <td>{{ optional($peminjaman->barang)->nama }}
                                                                            </td>
                                                                            <td>{{ $peminjaman->barang->deskripsi ?? 'N/A' }}
                                                                            </td>
                                                                            <td>{{ $peminjaman->jumlah_pinjam }}</td>
                                                                            <td>{{ $peminjaman->tanggal_peminjaman }}
                                                                            </td>
                                                                            <td>{{ $peminjaman->status }}</td>
                                                                            <td>
                                                                                @if ($peminjaman->status === 'Menunggu Persetujuan')
																				<div class="d-flex">
                                                                                    <a href="{{ route('peminjamans.approve', $peminjaman->id) }}"class="btn btn-primary">Setujui</a>
                                                                                    <a href="{{ route('peminjamans.reject', $peminjaman->id) }}"class="btn btn-danger">Tolak</a>
																				</div>
                                                                                    @elseif($peminjaman->status === 'Borrowed')
                                                                                    <a href="{{ route('peminjamans.completePengembalian', $peminjaman->id) }}"class="btn btn-success">PengembalianBarang</a>
                                                                                @endif
                                                                            </td>
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
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var query = $(this).val();

            $.ajax({
                url: '{{ route('peminjaman_barang.search') }}',
                method: 'GET',
                data: {
                    search: query
                },
                success: function(data) {
                    $('#peminjamanTableBody').html(data);
                    // Update pagination links
                    $('#paginationLinks').html($('#paginationLinks', data).html());
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var barangSelect = document.getElementById('id_barang');
            var jumlahTersediaSpan = document.getElementById('jumlah_tersedia');

            barangSelect.addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var jumlahTersedia = selectedOption.getAttribute('data-jumlah-tersedia');
                jumlahTersediaSpan.textContent = 'Jumlah Barang Yang Tersedia: ' +
                    jumlahTersedia;
            });

            // Hide the "Pengembalian Barang" button if the status is not "Borrowed"
            @if (isset($peminjaman))
                var status = "{{ $peminjaman->status }}";
                if (status !== 'Borrowed') {
                    $("a.btn-success").hide();
                }
            @endif
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var query = $(this).val();

            $.ajax({
                url: '{{ route('peminjaman_barang.search') }}',
                method: 'GET',
                data: {
                    search: query
                },
                success: function(data) {
                    $('#peminjamanTableBody').html(data);
                    // Update pagination links
                    $('#paginationLinks').html($('#paginationLinks', data).html());
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var barangSelect = document.getElementById('id_barang');
        var jumlahTersediaSpan = document.getElementById('jumlah_tersedia');

        barangSelect.addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var jumlahTersedia = selectedOption.getAttribute('data-jumlah-tersedia');
            jumlahTersediaSpan.textContent = 'Jumlah Barang Yang Tersedia: ' + jumlahTersedia;
        });
    });
</script>
    <script>
        $(document).ready(function() {
            // Function untuk menghitung total jumlah pinjam
            function updateTotalPinjam() {
                var total = 0;
                $("select[name='id_barang[]']").each(function(index) {
                    var jumlahPinjam = parseInt($(this).closest('.barang-input').find("input[name='jumlah_pinjam[]']").val()) || 0;
                    total += jumlahPinjam;
                });
                $("#total-pinjam").text("Total Jumlah Pinjam: " + total);
            }
        
            // Event listener untuk mendengarkan perubahan dalam input barang dan jumlah pinjam
            $("#barang-container").on("change", "select[name='id_barang[]'], input[name='jumlah_pinjam[]']", function() {
                updateTotalPinjam();
            });
        });
        </script>
      <script>
        $(document).ready(function() {        
            // Event handler untuk tombol "Add Barang"
            $("#add-barang-btn").on("click", function() {
                // Duplikasi inputan barang pertama
                var newInput = $(".barang-input:first").clone();
        
                // Bersihkan nilai-nilai input
                newInput.find("select[name='id_barang[]']").val([]);
                newInput.find("input[name='jumlah_pinjam[]']").val("");
        
                // Tambahkan inputan barang yang baru ke dalam container
                $("#barang-container").append(newInput);
        
                // Perbarui informasi sisa stok setiap kali ada perubahan dalam dropdown select atau input jumlah pinjam
                // updateSisaStok();
            });


            $("#btn-hapus-barang").on("click", function() {
                // Hapus elemen .barang-input termasuk select
                $(".barang-input:last").remove();
            });

            // Sembunyikan tombol "Hapus Barang" pada elemen pertama
            $(".barang-input:first .btn-hapus-barang").hide();

        });
        </script>
@include('backend/layouts/js');

</html>
