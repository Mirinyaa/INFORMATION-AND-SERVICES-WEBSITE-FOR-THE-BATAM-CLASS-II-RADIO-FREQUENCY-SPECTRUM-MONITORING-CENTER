<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman'; // Nama tabel dalam Bahasa Indonesia

    protected $fillable = ['spt', 'penanggung_jawab' , 'tanggal_surat', 'waktu_pelaksanaan', 'tanggal_pelaksanaan' , 'kegiatan' , 'id_pegawai', 'id_barang', 'jumlah_pinjam', 'tanggal_peminjaman',  'status'];

    // Relasi dengan Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    // Relasi dengan Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    // Relasi dengan Pengembalian
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_peminjaman');
    }

    
}
