@foreach($peminjamans as $peminjaman)
<tr class="text-center">
    <td>{{ $peminajamn->barang->kode_barang }}</td>
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
    <td>{{ $peminjaman->barang->nama }}</td>
    <td>{{ $peminjaman->barang->deskripsi ?? 'N/A' }}
    <td>{{ $peminjaman->jumlah_pinjam }}</td>
    <td>{{ $peminjaman->tanggal_peminjaman }}</td>
    <td>{{ $peminjaman->status }}</td>
    <td>
        @if ($peminjaman->status === 'Menunggu Persetujuan')
        <a href="{{ route('peminjamans.approve', $peminjaman->id) }}" class="btn btn-primary">Setujui</a>
        <a href="{{ route('peminjamans.reject', $peminjaman->id) }}" class="btn btn-danger">Tolak</a>
    @elseif ($peminjaman->status === 'Borrowed')
        <a href="{{ route('peminjamans.completePengembalian', $peminjaman->id) }}" class="btn btn-success">Pengembalian Barang</a>
    @endif
    </td>
</tr>
@endforeach