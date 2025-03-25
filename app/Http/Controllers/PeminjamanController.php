<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{

    public function peminjaman_barang()
    {
        $pegawais = Pegawai::all();
        $barangs = Barang::all();
        $groupedBarangs = $barangs->groupBy(function ($item) {
            return $item->nama . ' - ' . $item->tipe;
        });
    
        $peminjamans = Peminjaman::with('pegawai', 'barang', 'pengembalian')
            ->orderBy('status', 'asc')
            ->paginate(10);
    
        return view('backend.peminjaman_barang', compact('pegawais', 'groupedBarangs', 'barangs' , 'peminjamans'));
    }

    public function store(Request $request)
{
    $id_barangs = $request->input('id_barang');
    $jumlah_pinjams = $request->input('jumlah_pinjam');
    $id_peminjam = $request->input('id_pegawai');


    
    // Loop melalui setiap pasangan barang dan jumlah pinjam
    foreach ($id_barangs as $key => $id_barang) {
        $jumlah_pinjam = $jumlah_pinjams[$key];
        $barang = Barang::find($id_barang);

        if ($barang && $barang->jumlah_tersedia >= $jumlah_pinjam) {
            // Buat entri peminjaman dengan status "Menunggu Persetujuan" untuk setiap pasangan
            $peminjaman = new Peminjaman([
                'id_barang' => $id_barang,
                'penanggung_jawab' => $request->input('penanggung_jawab'),
                'id_pegawai' => $id_peminjam,
                'spt' => $request->input('spt'),
                'tanggal_surat' => $request->input('tanggal_surat'),
                'waktu_pelaksanaan' => $request->input('waktu_pelaksanaan'),
                'tanggal_pelaksanaan' => $request->input('tanggal_pelaksanaan'),
                'kegiatan' => $request->input('kegiatan'),
                'jumlah_pinjam' => $jumlah_pinjam,
                'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
                'status' => 'Borrowed',
            ]);

            // Simpan peminjaman
            $peminjaman->save();

            // Mengurangi jumlah barang yang tersedia
            $barang->update([
                'jumlah_tersedia' => $barang->jumlah_tersedia - $jumlah_pinjam
            ]);
        } else {
            return redirect('/peminjaman_barang')->with('error', 'Stok barang tidak cukup.');
        }
    }

    return back()->with('success', 'Peminjaman berhasil ditambahkan.');
}

    


    public function completePengembalian($id)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();
    
            // Cari peminjaman berdasarkan ID
            $peminjaman = Peminjaman::findOrFail($id);
    
            // Update status peminjaman
            $peminjaman->update(['status' => 'Returned']);
    
            // Update jumlah barang yang tersedia
            $barang = Barang::findOrFail($peminjaman->id_barang);
            $barang->update([
                'jumlah_tersedia' => $barang->jumlah_tersedia + $peminjaman->jumlah_pinjam
            ]);
    
            // Insert record ke tabel pengembalian
            Pengembalian::create([
                'id_peminjaman' => $peminjaman->id,
                'tanggal_pengembalian' => now(),
                'catatan' => 'Peminjaman selesai'
            ]);
    
            // Commit the transaction
            DB::commit();
    
            return redirect('/peminjaman_barang')->with('success-pengembalian-barang', 'Pengembalian Barang Sukses');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat mengembalikan barang.');
        }
    }


    public function searchPeminjaman(Request $request)
    {
        $pegawais = Pegawai::all();
        $barangs = Barang::all();
        $groupedBarangs = $barangs->groupBy(function ($item) {
            return $item->nama . ' - ' . $item->tipe;
        });
        $query = Peminjaman::with('pegawai', 'barang', 'pengembalian')
            ->orderBy('status', 'asc');

        // Check if search query exists
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->whereHas('pegawai', function ($q) use ($search) {
                    $q->where('nama', 'LIKE', '%' . $search . '%')
                    ->orWhere('id', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('barang', function ($q) use ($search) {
                    $q->where('nama', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('barang', function ($q) use ($search) {
                    $q->where('status', 'LIKE', '%' . $search . '%');
                })
                ->OrWhere('tanggal_peminjaman', 'LIKE' , '%' . $search . '%')
                ->orWhereHas('barang', function ($q) use ($search) {
                    $q->where('deskripsi', 'LIKE', '%' . $search . '%');
                });
              
            });
        }

        $peminjamans = $query->paginate(10);

        if ($request->ajax()) {
            return view('backend.peminjaman_barang_table', compact('peminjamans'));
    }

        return view('backend.peminjaman_barang', compact('pegawais', 'barangs', 'peminjamans', 'groupedBarangs'));
    }
    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Pastikan status saat ini adalah "Menunggu Persetujuan"
        if ($peminjaman->status === 'Menunggu Persetujuan') {
            // Set status peminjaman menjadi "Borrowed"
            $peminjaman->update([
                'status' => 'Borrowed',
            ]);

            // Mengurangi jumlah barang yang tersedia
            $barang = Barang::findOrFail($peminjaman->id_barang);
            $barang->update([
                'jumlah_tersedia' => $barang->jumlah_tersedia - $peminjaman->jumlah_pinjam,
            ]);

            return redirect()->back()->with('success', 'Peminjaman telah disetujui.');
        } else {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat disetujui.');
        }
    }

    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Set status peminjaman menjadi "Ditolak"
        $peminjaman->update([
            'status' => 'Ditolak',
        ]);

        return redirect()->back()->with('error', 'Peminjaman telah ditolak.');
    }


    public function destroy($id)
    {
        $delete = Pengembalian::findOrFail($id);
        $delete->delete();
        return redirect('/returned')->with('success-deleted', 'History barang berhasil dihapus');
    }

}
