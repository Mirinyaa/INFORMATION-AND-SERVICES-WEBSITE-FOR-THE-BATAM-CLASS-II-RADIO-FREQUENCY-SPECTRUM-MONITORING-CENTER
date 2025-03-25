<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengembalian</title>
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
       
        }
    
        .table, .table th, .table td {
            border: 1px solid #000; /* Atur warna dan ketebalan garis sesuai kebutuhan Anda */
        }
       

        .user-info {
            margin-bottom: 20px;
        }

        h3 {
            text-align: center;
        }

        textarea {
           
            padding: 5px;
            border: 1px solid #000;
            resize: none;
            height: 50px;
        }

        textarea[name="kegiatan"] {
        font-size: 14px; /* Ganti dengan ukuran font yang Anda inginkan */
        font-family: Arial, Helvetica, sans-serif; /* Ganti dengan jenis font yang Anda inginkan */
         }

        .kegiatan {
            margin-top: 10px;
        }

        .head {
            text-align: left;
            width:30%;
        }

        p {
            margin: 0;
            padding: 2px;
        }

        .table2 {
            border-collapse: collapse;
            width: 100%;
            page-break-inside: avoid;
        }

 

        

    </style>
   
</head>
<body>
    <h3 class="text-center">LAPORAN PENGEMBALIAN BARANG</h3>

    @php
        $user = null; // Variabel untuk menyimpan pengguna saat ini
    @endphp

    @foreach($pengembalians as $pengembalian)
        @if ($user !== $pengembalian->peminjaman->pegawai->nama)
            <!-- Tampilkan informasi pengguna jika berbeda -->
            <div class="user-info">
               <table class="table">
                    <thead>
                        <tr>
                            <th class="head">Surat Perintah Tugas</th>
                            <td style=""><p style="margin-left:5px;">: {{ $pengembalian->peminjaman->spt }}</p></td>
                        </tr>
                        <tr>
                            <th class="head">Tanggal Surat</th>
                            <td><p style="margin-left:5px;">: {{date('d F Y', strtotime($pengembalian->peminjaman->tanggal_surat))}}</p></td>
                        </tr>
                        <tr>
                            <th class="head">Waktu Pelaksanaan</th>
                            <td><p style="margin-left:5px;">: {{ $pengembalian->peminjaman->waktu_pelaksanaan }}</p></td>
                        </tr>
                        <tr>
                            <th class="head">Tanggal Pelaksanaan</th>
                            <td><p style="margin-left:5px;">: {{date('d F Y', strtotime($pengembalian->peminjaman->tanggal_pelaksanaan))}}</p></td>
                        </tr>
                    </thead>
               </table>
               <div class="kegiatan">
                <strong>Kegiatan:</strong><br>
                <textarea type="text" name="kegiatan">{{ $pengembalian->peminjaman->kegiatan }}</textarea>
                </div>
            </div>
        @php
            $user = $pengembalian->peminjaman->pegawai->nama; // Perbarui nama pengguna saat ini
        @endphp
        @endif
    @endforeach

    <table class="table table-striped" style="margin-top: 10px;">
        <thead>
            <tr style="text-align:center;">
                <th style="width: 33.3%;">Kode Barang</th>
                {{-- <th>No</th> --}}
                <th style="width: 33.3%;">Nama Peralatan</th>
                <th style="width: 33.3%;">Merk/Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengembalians as $pengembalian)
                <tr style="text-align:center;">
                    {{-- <td>{{ $loop->iteration }}</td> --}}
                    <td>{{ $pengembalian->peminjaman->barang->kode_barang }}</td>
                    <td>{{ $pengembalian->peminjaman->barang->nama }}</td>
                    <td>{{ $pengembalian->peminjaman->barang->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

<table style="margin-top: 60px;" class="table2">
    <thead>
        <tr>
            <td style="width:50%;">
                <div class="container">
                <div class="signature" style="text-align: center;">
                    <p>Penanggung Jawab</p>
                </div>
            </td>
            <td style="width:50%;">
            <div class="signature" style="text-align: center;">
                <p>Batam, {{ date('d F Y', strtotime($pengembalians[0]->peminjaman->tanggal_peminjaman)) }}</p>
                <p>Ketua Tim Kerja Pemeliharaan Infrastruktur SMFR <br> dan Konsultasi Publik</p>
            </div>
            </div>
            </td>
    </tr>
    </thead>

    <tbody>
        <tr>
            <td>
                <div class="signature" style="text-align: center; center; margin-top: 100px;">
                    @php
                    $idPenanggungJawab = $pengembalian->peminjaman->penanggung_jawab; // ID penanggung jawab
                    $penanggungJawab = $pengembalian->peminjaman->pegawai->firstWhere('id', $idPenanggungJawab); // Cari pegawai berdasarkan ID
                
                    // Tampilkan nama dan NIP jika ditemukan, jika tidak, tampilkan "N/A"
                    if ($penanggungJawab) {
                        echo '<u>' . $penanggungJawab->nama . '</u>' . '<br>';
                        echo 'NIP. ' . $penanggungJawab->nip;
                    } else {
                        echo 'N/A';
                    }
                @endphp
                </div>
                </div>
            </td>
            <td>
                <div class="signature" style="text-align: center; margin-top: 100px;">
                    <p><u>{{$pengembalians[0]->peminjaman->pegawai->nama}}</u></p>
                    <p>NIP. {{$pengembalians[0]->peminjaman->pegawai->nip}}</p>
                </div>
                </div>
            </td>
        </tr>
        </tr>
    </tbody>

</table>
 
</body>
</html>
