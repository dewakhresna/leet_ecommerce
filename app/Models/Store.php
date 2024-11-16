<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produk_id',
        'nama_produk',
        'kategori',
        'gambar0',
        'jumlah',
        'varian',
        'total_harga',
        'status',
    ];
}
