<?php


namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Store;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function transaksi()
    {
        $stores = Store::all();
        return view('admin.admin-transaksi', compact('stores'));
    }
    
    public function index() 
    {
        $produks = Produk::all();

        return view('admin.dashboard', compact('produks'));
    }

    public function create()
    {
        return view('admin.tambah-produk');
    }

    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'namaProduk' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'varian' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        $data_produk['nama_produk'] = $request->namaProduk;
        $data_produk['kategori'] = $request->kategori;
        $data_produk['deskripsi'] = $request->deskripsi;
        
        foreach ($request->file('gambar') as $index => $file) {
            $filename = date('Y-m-d_H-i-s') . '-' . $file->getClientOriginalName();
            $file->storeAs('assets/produk', $filename, 'public');
            $data_produk['gambar' . $index] = $filename;
        }

        foreach ($request->varian as $key => $sizes) {
            $size[$sizes] = $request->stok[$key];
            $data_produk['stok' . $sizes] = $request->stok[$key];
        }

        $data_produk['harga'] = $request->harga;

        Produk::create($data_produk);

        return redirect()->route('admin')->with('success', 'Produk Berhasil');

    }

    public function edit($id) 
    {
        $produk = Produk::findorFail($id);

        $varian = [
            'S' => $produk->stokS,
            'M' => $produk->stokM,
            'L' => $produk->stokL,
            'XL' => $produk->stokXL,
            '2XL' => $produk->stok2XL,
        ];

        return view('admin.edit-produk', compact('produk', 'varian'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'varian' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $produk = Produk::findOrFail($id);
        
        // Update data produk
        $produk->nama_produk = $request->namaProduk;
        $produk->kategori = $request->kategori;
        $produk->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $index => $file) {
                $filename = date('Y-m-d_H-i-s') . '-' . $file->getClientOriginalName();
                $file->storeAs('assets/produk', $filename, 'public');
                $produk['gambar' . $index] = $filename;
            }
        }

        foreach ($request->varian as $key => $sizes) {
            $produk['stok' . $sizes] = $request->stok[$key];
        }

        $produk->harga = $request->harga;
        $produk->save();

        return redirect()->route('admin')->with('success', 'Produk Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('admin')->with('success', 'Produk Berhasil Dihapus');
    }

    public function login(Request $request)
    {
        if ($request->email === 'admin@gmail.com' && $request->password === '123') {
            return redirect()->route('admin');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }
}
