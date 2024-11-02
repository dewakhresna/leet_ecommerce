<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahProdukController extends Controller
{
    public function index()
    {
        return view('admin.tambah-produk');
    }
}
