<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang'; // Nama tabel dalam Bahasa Indonesia
    protected $fillable = ['kode_barang', 'nama', 'deskripsi', 'gambar', 'jumlah_awal', 'jumlah_tersedia'];

    // Relasi dengan Peminjaman
    public function peminjamans()
    {
        return $this->belongsToMany(Peminjaman::class, 'peminjaman_barang', 'barang_id', 'peminjaman_id')
        ->withPivot('jumlah_pinjam');
    }

  
}
