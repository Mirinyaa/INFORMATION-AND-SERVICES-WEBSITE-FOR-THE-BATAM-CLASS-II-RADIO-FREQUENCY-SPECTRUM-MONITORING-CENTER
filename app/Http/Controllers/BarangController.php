<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \PDF;


class BarangController extends Controller
{
    public function index()
    {
      
        $query = Barang::orderBy('created_at', 'desc');
        $barang = $query->paginate(5);
        return view('backend.barang', [
            'barang' => $barang,
         
        ]);
    }

    public function searchBarang(Request $request)
    {   
        $keyword = $request->input('search');
        $keyword = preg_replace('/\s+/', '', $keyword); // Menghapus semua spasi
        
        $query = Barang::orderBy('created_at', 'desc')
            ->whereRaw("REPLACE(nama, ' ', '') LIKE ?", ["%$keyword%"]);
        
        $barang = $query->paginate(5);
        
        return view('backend.barang', compact('barang'));
    }

    public function store(Request $request)
    {

        $randomName = null; // Default value untuk nama file foto

        if ($request->hasFile('photo')) {
            $originalName = $request->file('photo')->getClientOriginalName();
            $randomString = Str::random(10);
            $randomName = $randomString . '_' . pathinfo($originalName, PATHINFO_FILENAME);
        
            // Simpan file ke folder public dengan nama yang dihasilkan
            $request->file('photo')->storeAs('public/photos', $randomName . '.' . $request->file('photo')->getClientOriginalExtension());
        }
        
        // Kemudian, Anda dapat menyimpan data barang dengan atau tanpa foto
        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $randomName ? $randomName . '.' . $request->file('photo')->getClientOriginalExtension() : null,
            'jumlah_awal' => $request->jumlah_awal,
            'jumlah_tersedia' => $request->jumlah_tersedia
        ]);
        
        return redirect('/list-barang')->with('success', 'Data Barang Berhasil Ditambahkan');

    }

    public function barang_kembali()
    {
      
        $query = Pengembalian::with('pegawai')->orderBy('created_at', 'desc');
    
        $pengembalians = $query->paginate(10);
       
        return view('backend.barang_return', compact('pengembalians'));
    
    }

    public function barangSearch(Request $request)
    {
        $query = Pengembalian::with(['peminjaman.pegawai', 'peminjaman.barang'])
    ->orderBy('created_at', 'desc')
    ->whereHas('peminjaman', function ($q) use ($request) {
        $q->where(function ($query) use ($request) {
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where('spt', 'LIKE', '%' . $search . '%');
            }
        });
        if ($request->has('tanggal_pengembalian')) {
            $tanggal_pengembalian = $request->input('tanggal_pengembalian');
            $q->whereDate('tanggal_pengembalian', '=', $tanggal_pengembalian);
        }
    });


    
        $pengembalians = $query->paginate(5);
    
        return view('backend.barang_return', compact('pengembalians'));
    }

    public function update(Request $request, $id)
    {
       
        $barang = Barang::findOrFail($id);
        $oldPhotoName = $barang->photo;
        $barang->nama = $request->nama;
        $barang->deskripsi = $request->deskripsi;
        $barang->jumlah_awal = $request->jumlah_awal;
        $barang->jumlah_tersedia = $request->jumlah_tersedia;
        $barang->kode_barang = $request->kode_barang;


            // Cek apakah ada foto baru yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto lama (jika ada)
            if ($oldPhotoName) {
                Storage::delete('public/photos/' . $oldPhotoName);
            }

            // Simpan foto baru dengan nama yang unik
            $photoPath = $request->file('photo')->store('public/photos');
            $barang->gambar = basename($photoPath);
        }

        $barang->save();

        return redirect('/list-barang')->with('success', 'Data barang berhasil diperbarui.');
        }


        public function cetakPDF(Request $request)
        {
               // Ambil tanggal_pengembalian dari parameter request
            $tanggalPengembalian = $request->input('tanggal_pengembalian');
            $searchValue = $request->input('search');

            // Buat query berdasarkan tanggal_pengembalian jika tersedia
            $query = Pengembalian::with(['peminjaman.pegawai', 'peminjaman.barang'])
                ->orderBy('tanggal_pengembalian', 'asc');

            if ($tanggalPengembalian) {
                $query->whereDate('tanggal_pengembalian', '=', $tanggalPengembalian);
            }

            // Tambahkan kondisi pencarian berdasarkan nama ('search')
            if ($searchValue) {
                $query->where(function ($query) use ($searchValue) {
                    $query->whereHas('peminjaman.pegawai', function ($query) use ($searchValue) {
                        $query->where('nama', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhereHas('peminjaman', function ($query) use ($searchValue) {
                        $query->where('spt', 'like', '%' . $searchValue . '%');
                    });
                });
            }

            // Ambil hasil query
            $pengembalians = $query->get();

            // Buat PDF dengan menggunakan pustaka DomPDF
            $pdf = PDF::loadView('backend.pdf', compact('pengembalians'));

            // Optional: Atur opsi PDF, seperti ukuran, orientasi, dll.
            $pdf->setPaper('A4', 'portrait');

            // Return tampilan PDF
            return $pdf->stream('laporan_pengembalian.pdf');
                    }

                    public function destroy($id)
                    {
                        // Hapus terlebih dahulu entri terkait di tabel pengembalian
                        Peminjaman::where('id_barang', $id)->delete();
                    
                        // Hapus barang itu sendiri
                        $destroy = Barang::findOrFail($id);
                        $destroy->delete();
                    
                        return redirect('/list-barang')->with('success-hapus-barang', 'Data barang berhasil dihapus!');
                    }
}
