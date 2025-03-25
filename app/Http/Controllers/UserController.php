<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;



class UserController extends Controller
{
    public function index()
    {
        return view('backend.user.index');
    }

    public function barang()
    {

        return view('backend.user.barang', [
            'barang' => Barang::All()
        ]);
    }


    public function pinjam(Request $request)
{

      // Validasi input form jika diperlukan
      $request->validate([
        'id_barang' => 'required',
        'jumlah_pinjam' => 'required|numeric|min:1',
        'tanggal_peminjaman' => 'required|date',
    ]);

    $id_barang = $request->input('id_barang');
    $jumlah_pinjam = $request->input('jumlah_pinjam');

    // Cek apakah stok barang tersedia cukup
    $barang = Barang::findOrFail($id_barang);
    if ($barang->jumlah_tersedia >= $jumlah_pinjam) {
        // Buat entri peminjaman dengan status "Menunggu Persetujuan"
        $peminjaman = new Peminjaman([
            'spt' => $request->spt,
            'tanggal_surat' => $request->tanggal_surat,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'kegiatan' => $request->kegiatan,
            'id_barang' => $id_barang,
            'id_pegawai' => Auth::id(),
            'status' => 'Menunggu Persetujuan',
            'jumlah_pinjam' => $jumlah_pinjam,
            'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
        ]);
        
        $peminjaman->save();
        
        $barang->save();
        
        
        return redirect('/barang')->with('success', 'Pengajuan Peminjaman Berhasil, Sedang Menunggu Persetujuan Dari Admin!');
    } else {
        return redirect('/barang')->with('error', 'Stok barang tidak cukup.');
    }

}

    public function historyPeminjaman()
    {
        $user = Auth::user();

        // Mengambil peminjaman yang berhubungan dengan pengguna yang login
        $peminjamans = Peminjaman::with('barang', 'pengembalian')
            ->where('id_pegawai', $user->id)
            ->orderBy('status', 'asc')
            ->paginate(10);

    return view('backend.user.history_peminjaman_barang', compact('peminjamans'));

    }

    public function barangReturn(Request $request)
    {
      
        $query = Peminjaman::with('barang','pengembalian');
        
         // Check if search query exists
         if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->whereHas('pegawai', function ($q) use ($search) {
                    $q->where('nama', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('barang', function ($q) use ($search) {
                    $q->where('nama', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('barang', function ($q) use ($search) {
                    $q->where('status', 'LIKE', '%' . $search . '%');
                })
                ->orWhere('tanggal_peminjaman', 'LIKE', '%' . $search . '%');
            });
        }
        $peminjamans = $query->paginate(30);

        return view('backend.user.history_peminjaman_barang', compact('peminjamans'));

            
    }



    
        // // Check if search query exists
        // if ($request->has('search')) {
        //     $search = $request->input('search');
        //     $query->where(function ($q) use ($search) {
        //         $q->whereHas('pegawai', function ($q) use ($search) {
        //             $q->where('nama', 'LIKE', '%' . $search . '%');
        //         })
        //         ->orWhereHas('barang', function ($q) use ($search) {
        //             $q->where('nama', 'LIKE', '%' . $search . '%');
        //         })
        //         ->orWhereHas('barang', function ($q) use ($search) {
        //             $q->where('status', 'LIKE', '%' . $search . '%');
        //         })
        //         ->orWhere('tanggal_peminjaman', 'LIKE', '%' . $search . '%');
        //     });

    

}