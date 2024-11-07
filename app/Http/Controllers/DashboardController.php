<?php


namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        return view('admin.dashboard');
    }

    public function create(){
        return view('admin.tambah-produk');
    }

    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'namaProduk' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data_produk['nama_produk'] = $request->namaProduk;
        $data_produk['kategori'] = $request->kategori;
        $data_produk['deskripsi'] = $request->deskripsi;
        $data_produk['harga'] = $request->harga;


        Produk::create($data_produk);

        return redirect()->route('admin')->with('success', 'Produk Berhasil');

    }
}
