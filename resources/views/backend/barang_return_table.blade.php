<?php $i = 1; ?>
@foreach($pengembalians as $pengembalian)
<tr class="text-center">
    <td>{{$i++}}</td>
    <td>{{ $pengembalian->peminjaman->pegawai->nama ?? 'N/A' }}</td>
    <td>{{ $pengembalian->peminjaman->barang->nama ?? 'N/A' }}</td>
    <td>{{ $pengembalian->peminjaman->jumlah_pinjam ?? 'N/A' }}</td>
    <td>{{$pengembalian->tanggal_pengembalian}}</td>
    <td>{{$pengembalian->catatan}}</td>
</tr>
@endforeach