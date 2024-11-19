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

    public function tambahKeranjang(Request $request, $user_id, $produk_id)
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


    public function keranjang($user_id) 
    {
        $keranjang = Store::where('user_id', $user_id)
                          ->where('status', '0')
                          ->get();

        return view('user.keranjang', compact('keranjang', 'user_id'));
    }

    public function isiKeranjang($user_id) 
    {
        $keranjang = Store::where('user_id', $user_id)
                          ->where('status', '0')
                          ->get()
                          ->map(function ($item) {
                            $item->gambar0 = asset('storage/assets/produk/' . $item->gambar0);
                            return $item;
                        });

        return response()->json($keranjang);
    }

    public function checkout(Request $request) 
    {
        $request->validate([
            'produk' => 'required|array',
            'produk.*' => 'integer|exists:stores,id',
        ]);
    
        Store::whereIn('id', $request->produk)
             ->update(['status' => '1']);
    
        return response()->json(['message' => 'Checkout berhasil']);
    }

    public function pembayaran($user_id)
    {
        $store = Store::where('user_id', $user_id)
                      ->where('status', '1')
                      ->get()
                      ->map(function ($item) {
                        $item->gambar0 = asset('storage/assets/produk/' . $item->gambar0);
                        return $item;
                    });

        $user = User::where('id', $user_id)->first();
        
        return view('user.pembayaran', compact('user_id', 'store', 'user'));
    }

    public function pembayaranProses(Request $request, $user_id)
    {
        // dd($request->all());
        $request->validate([
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg',
        ]);

        $filename = null; 
    
        // Upload bukti pembayaran
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filename = date('Y-m-d_H-i-s') . '_' . $file->getClientOriginalName(); // Generate nama unik
            $file->storeAs('public/bukti_bayar', $filename); // Simpan ke folder 'storage/app/public/bukti_bayar'
        }

        Store::where('user_id', $user_id)
             ->where('status', '1')
             ->update(['status' => '2', 'metode_pembayaran' => $request->metode_pembayaran, 'bukti_pembayaran' => $filename]);
    
        return redirect()->route('user.home', ['id' => $user_id])
                         ->with('success', 'Pembayaran berhasil diproses!');
    }

    public function pesanan($user_id)
    {
        $stores = Store::all();
        return view('user.pesanan', compact('user_id', 'stores'));
    }
}
