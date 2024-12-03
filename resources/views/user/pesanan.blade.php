<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LEET</title>
    <link rel="icon" href="{{ asset('assets/logo/logo_leet.png') }}" type="image/png">
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
            color: #343a40;
        }
        .container {
            margin-top: 20px;
        }
        .info-produk {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .info-produk h5 {
            margin: 0;
            font-size: 1rem;
            font-weight: bold;
        }
        table {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        table img {
            border-radius: 5px;
            object-fit: cover;
            width: 60px;
            height: 60px;
        }
        table thead th {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            font-size: 0.9rem;
            text-transform: uppercase;
        }
        table tbody td {
            text-align: center;
            vertical-align: middle;
            font-size: 0.9rem;
        }
        .badge {
            font-size: 0.85rem;
            text-transform: uppercase;
        }
        .btn-primary a {
            color: #fff;
            text-decoration: none;
        }
        .btn-primary a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <h3>Status Pesanan</h3>
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
                    <th>Status Pembayaran</th>
                    <th>Status Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $index => $store)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="info-produk">
                                <img src="{{ asset('storage/assets/produk/' . $store->gambar0) }}" alt="{{ $store->nama_produk }}">
                                <h5>{{ $store->nama_produk }}</h5>
                            </div>
                        </td>
                        <td>Rp. {{ number_format($store->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $store->jumlah }}</td>
                        <td>{{ $store->varian }}</td>
                        <td>{{ $store->kategori }}</td>
                        <td>
                            @if($store->status == 1 && $store->pesan == 0)
                                {{ $store->metode_pembayaran }}
                            @elseif ($store->status == 2)
                                {{ $store->metode_pembayaran }}
                            @elseif ($store->status == 3)
                                {{ $store->metode_pembayaran }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($store->status == 1 && $store->pesan == 0)
                                <span class="badge bg-danger">Pembayaran Ditolak</span>
                            @elseif ($store->status == 1)
                                <span class="badge bg-warning">Menunggu Pembayaran</span>
                            @elseif ($store->status == 2)
                                <span class="badge bg-info">Pembayaran Sedang Diproses</span>
                            @elseif ($store->status == 3)
                                <span class="badge bg-success">Pembayaran Berhasil</span>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($store->status == 1 && $store->pesan == 0)
                                <a href="{{ route('user.pembayaran', $store->user_id) }}" class="btn btn-primary btn-sm">Lakukan Pembayaran Ulang</a>
                                <a href="{{ route('user.pesanan-delete', ['user_id' => $store->user_id, 'id' => $store->id]) }}" class="btn btn-danger btn-sm">Hapus Pesanan</a>
                            @elseif ($store->pesan == 1)
                                <a href="{{ route('user.pembayaran', $store->user_id) }}" class="btn btn-primary btn-sm">Lakukan Pembayaran</a>
                                <a href="{{ route('user.pesanan-delete', ['user_id' => $store->user_id, 'id' => $store->id]) }}" class="btn btn-danger btn-sm">Hapus Pesanan</a>
                            @elseif ($store->pesan == 3)
                                <span class="badge bg-success">Pesanan Sedang Disiapkan</span>
                            @elseif ($store->pesan == 4)
                                <span class="badge bg-success">Pesanan Dikirim</span>
                            @elseif ($store->pesan == 5)
                                <span class="badge bg-success">Pesanan Sudah Sampai Tujuan</span>
                            @else
                                -
                            @endif
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