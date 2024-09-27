<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    
    protected $table = "daftar_paket";

    protected $fillable = ['no_paket','nama_paket','harga_paket'];
    
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}