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
            margin-bottom: 30px;
            color: #333;
            font-weight: bold;
        }
        .info-produk {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .info-produk h5 {
            margin: 0;
            font-size: 1rem;
            color: #495057;
        }
        table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            vertical-align: middle;
        }
        .btn-primary a {
            color: #fff;
            text-decoration: none;
        }
        .btn-primary a:hover {
            text-decoration: underline;
        }
        .badge {
            font-size: 0.875rem;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <h3>Daftar Transaksi</h3>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pembeli</th>
                    <th>Id Produk</th>
                    <th>Info Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Varian</th>
                    <th>Kategori</th>
                    <th>Metode Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $index => $store)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $store->user_id }}</td>
                        <td>{{ $store->produk_id }}</td>
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
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buktiPembayaranModal">Lihat</button></td>
                        <td>
                            @if ($store->status == 1)
                                <span class="badge bg-warning text-dark">Pembayaran Belum Dilakukan</span>
                            @elseif ($store->status == 2)
                                <span class="badge bg-success">Pembayaran Sudah Dilakukan</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="buktiPembayaranModal" tabindex="-1" aria-labelledby="buktiPembayaranModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="buktiPembayaranModalLabel">Bukti Pembayaran</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img src="{{ asset('storage/assets/bukti_pembayaran/' . $store->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>