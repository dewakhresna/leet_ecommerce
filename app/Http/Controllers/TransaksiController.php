<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class TransaksiController extends Controller
{
    public function detail($id)
    {
        $produk = Produk::findorFail($id);
        
        $varian = [
            'S' => $produk->stokS,
            'M' => $produk->stokM,
            'L' => $produk->stokL,
            'XL' => $produk->stokXL,
            '2XL' => $produk->stok2XL,
        ];
        return view('user.detail-produk', compact('produk', 'varian'));
    }

    public function pembayaran(Request $request)
    {
        dd($request->all());

        // $produk = Produk::findorFail($request->id_produk);

        // $data = [
        //     'id' => $request->id_user,
        //     'name' => $request->nama_user,
        //     'alamat' => $request->alamat,
        //     'no_hp' => $request->no_hp,
        //     'nama_produk' => $produk->nama_produk,
        //     'kategori' => $produk->kategori,
        //     'gambar0' => $produk->gambar0,
        //     'jumlah' => $request->jumlah,
        //     'varian' => $request->varian,
        // ];

        // return view('user.pembayaran', compact('data', 'produk'));
    }

    public function prosesPembayaran(Request $request)
    {
        $validated = $request->validate([
            'metode_bayar' => 'required',
            'bukti_bayar' => 'required',
        ]);

        return redirect()->route('user.pembayaran')->with('success', 'Pembayaran berhasil!');
    }

    public function storeTransaksi(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:produks,id',
            'product_name' => 'required|string',
            'category' => 'required|string',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'payment_proof' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ]);

        // Upload bukti pembayaran
        if ($request->hasFile('payment_proof')) {
            $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public/assets/payment_proofs');
            $validatedData['payment_proof'] = $paymentProofPath;
        }

        // Simpan transaksi ke database
        Transaction::create([
            'user_id' => $validatedData['user_id'],
            'product_id' => $validatedData['product_id'],
            'product_name' => $validatedData['product_name'],
            'category' => $validatedData['category'],
            'size' => $validatedData['size'],
            'quantity' => $validatedData['quantity'],
            'payment_method' => $validatedData['payment_method'],
            'payment_proof' => $validatedData['payment_proof'],
            'status' => 'Pending', // Status awal transaksi
        ]);

        return redirect()->route('user.transactions')->with('success', 'Transaksi berhasil disimpan!');
    }   



}
