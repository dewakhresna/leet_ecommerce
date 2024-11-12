<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LEET</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Form Pembayaran</h2>
        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="product_id" value="{{ $produk->id }}">
            <input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}">
            <input type="hidden" name="kategori" value="{{ $produk->kategori }}">
    
            <div class="mb-3">
                <label>Nama User</label>
                <input type="text" class="form-control" value="{{ $data['nama_user'] }}">
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" class="form-control" value="{{ $data['alamat'] }}">
            </div>
            <div class="mb-3">
                <label>Telepon</label>
                <input type="text" class="form-control" value="{{ $data['telepon'] }}">
            </div>
            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" class="form-control" value="{{ $data['nama_produk'] }}">
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" class="form-control" value="{{ $data['kategori'] }}">
            </div>
            <div class="mb-3">
                <label>Jumlah</label>
                <input type="text" class="form-control" value="{{ $data['jumlah'] }}">
            </div>
            <div class="mb-3">
                <label>Varian</label>
                <input type="text" class="form-control" value="{{ $data['varian'] }}">
            </div>
            <div class="mb-3">
                <label for="metode_bayar">Metode Pembayaran</label>
                <select class="form-select" name="metode_bayar" id="metode_bayar" required>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                    <option value="Kartu Kredit">Kartu Kredit</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bukti_bayar">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti_bayar" id="bukti_bayar" required>
            </div>
            <button type="submit" class="btn btn-primary">Bayar</button>
        </form>
    </div>
</body>
</html>
