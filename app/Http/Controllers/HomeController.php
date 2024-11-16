<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('user.home', compact('user', 'produks'));
    }

    public function login($id)
    {
        $user = User::findorFail($id);
        $produks = Produk::all();
        return view('user.home', compact('user', 'produks'));
    }
}
