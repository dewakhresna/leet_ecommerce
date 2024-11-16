<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class TransaksiController extends Controller
{
    public function detail($user_id, $produk_id)
    {
        $produk = Produk::where('id', $produk_id)->first();
        
        $varian = [
            'S' => $produk->stokS,
            'M' => $produk->stokM,
            'L' => $produk->stokL,
            'XL' => $produk->stokXL,
            '2XL' => $produk->stok2XL,
        ];
        return view('user.detail-produk', compact('produk', 'varian', 'user_id', 'produk_id'));
    }

    public function keranjang(Request $request, $user_id, $produk_id)
    {
        // dd($request->all());
        $check = Validator::make($request->all(), [
            'user_id' => 'required',
            'produk_id' => 'required',
            'nama_produk' => 'required',
            'kategori' => 'required',
            'gambar0' => 'required',
            'jumlah' => 'required',
            'varian' => 'required',
            'total_harga' => 'required',
            'status' => 'required',
        ]);

        if($check->fails()) {
            return redirect()->back()->withInput()->withErrors($check);
        }

        $data_store['user_id'] = $request->user_id;
        $data_store['produk_id'] = $request->produk_id;
        $data_store['nama_produk'] = $request->nama_produk;
        $data_store['kategori'] = $request->kategori;
        $data_store['gambar0'] = $request->gambar0;
        $data_store['jumlah'] = $request->jumlah;
        $data_store['varian'] = $request->varian;
        $data_store['total_harga'] = $request->total_harga;
        $data_store['status'] = $request->status;

        Store::create($data_store);

        return redirect()->route('user.home', ['id' => $user_id]);
    }
}
