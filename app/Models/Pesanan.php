<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = ['no_nota','pelanggan','paket_id','berat','harga','total_harga','status'];

    public function paket()
    {
       return $this->belongsTo(Paket::class, 'paket_id');
    }
}