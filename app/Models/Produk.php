<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'kategori',
        'deskripsi',
        'gambar0',
        'gambar1',
        'gambar2',
        'gambar3',
        'stokS',
        'stokM',
        'stokL',
        'stokXL',
        'stok2XL',
        'harga',
    ];
}
