<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class Pengembalian extends Model
{
    protected $table = 'pengembalian'; 

    protected $fillable = ['id_peminjaman', 'tanggal_pengembalian', 'catatan'];

    // Relasi dengan Peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

}