 <!-- Form untuk pengembalian barang -->
 <form action="{{ route('peminjamans.completePengembalian') }}" method="post">
    @csrf
    <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->id }}">
    <!-- Form fields lainnya seperti catatan atau tanggal pengembalian -->
    <button type="submit">Kembalikan Barang</button>
</form>