<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesanan - LEET</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .info-produk {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-produk h5 {
            margin: 0;
            font-size: 1rem;
        }
        table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        table img {
            border-radius: 5px;
            object-fit: cover;
        }
        table thead th {
            background-color: #343a40;
            color: #fff;
            text-align: center;
        }
        table tbody td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-primary a {
            color: #fff;
            text-decoration: none;
        }
        .btn-primary a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h3>Pesanan Anda</h3>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Info Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Varian</th>
                    <th>Kategori</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $index => $store)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="info-produk">
                                <img src="{{ asset('storage/assets/produk/' . $store->gambar0) }}" alt="{{ $store->nama_produk }}" style="width: 50px; height: 50px;">
                                <h5>{{ $store->nama_produk }}</h5>
                            </div>
                        </td>
                        <td>Rp. {{ number_format($store->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $store->jumlah }}</td>
                        <td>{{ $store->varian }}</td>
                        <td>{{ $store->kategori }}</td>
                        <td>{{ $store->metode_pembayaran }}</td>
                        <td>
                            @if ($store->status == 1)
                                <span class="badge bg-warning text-dark"><a href="{{ route('user.pembayaran', $store->id) }}" class="btn btn-primary btn-sm">Lakukan Pembayaran</a></span>
                            @elseif ($store->status == 2)
                                <span class="badge bg-success">Pembayaran Berhasil</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>