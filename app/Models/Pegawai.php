<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = ['nama', 'nip',  'password', 'role', 'photo', 'email', 'posisi'];
    protected $table = 'pegawai';

    
    public function pegawai()
{
    return $this->belongsTo(Pegawai::class, 'pegawai_id');
}
    
}
