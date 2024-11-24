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
                        <td>
                            @if ($store->status == 2)
                                {{ $store->metode_pembayaran }}
                            @elseif ($store->status == 3)
                                {{ $store->metode_pembayaran }}
                            @else
                                -
                            @endif
                        </td>    
                        <td>
                            @if ($store->status == 2)
                                <button type="button" class="btn btn-primary lihat-bukti-btn" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#buktiPembayaranModal" 
                                    id-transaksi="{{ $store->id }}"
                                    data-pembeli="{{ $store->user_id }}"
                                    data-produk="{{ $store->produk_id }}"
                                    data-jumlah="{{ $store->jumlah }}"
                                    data-varian="{{ $store->varian }}"
                                    data-status="{{ $store->status }}"
                                    data-pesan="{{ $store->pesan }}"
                                    data-gambar="{{ asset('storage/assets/bukti_pembayaran/' . $store->bukti_pembayaran) }}">
                                    Lihat
                                </button>
                            @elseif ($store->status == 3)
                                <button type="button" class="btn btn-primary lihat-bukti-btn" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#buktiPembayaranModal" 
                                    id-transaksi="{{ $store->id }}"
                                    data-pembeli="{{ $store->user_id }}"
                                    data-produk="{{ $store->produk_id }}"
                                    data-jumlah="{{ $store->jumlah }}"
                                    data-varian="{{ $store->varian }}"
                                    data-status="{{ $store->status }}"
                                    data-pesan="{{ $store->pesan }}"
                                    data-gambar="{{ asset('storage/assets/bukti_pembayaran/' . $store->bukti_pembayaran) }}"
                                    >
                                    Lihat
                                </button>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($store->pesan == 1)
                                <span class="badge bg-warning text-dark">Pembayaran Belum Dilakukan</span>
                            @elseif ($store->pesan == 2)
                                <span class="badge bg-success">Pembayaran Sudah Dilakukan</span>
                            @elseif ($store->pesan == 3)
                                <span class="badge bg-success">Pesanan Dikirim</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="buktiPembayaranModal" tabindex="-1" aria-labelledby="buktiPembayaranModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiPembayaranModalLabel">Bukti Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" id="buktiPembayaranImg" alt="Bukti Pembayaran" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <form id="transaksiForm" action="" method="POST" data-route="{{ route('admin.transaksi-sukses', ['id' => 'transaksi_id']) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id"  id="idTransaksi">
                        <input type="hidden" name="user_id" id="pembeli">
                        <input type="hidden" name="produk_id" id="produk">
                        <input type="hidden" name="jumlah" id="jumlah">
                        <input type="hidden" name="varian" id="varian">
                        <input type="hidden" name="status" id="status">
                        <input type="hidden" name="pesan"  id="pesan">
                        <button type="submit" class="btn btn-primary" id="terimaPembayaran">Terima Pembayaran</button>
                    </form>
                    <button type="button" class="btn btn-danger">Tolak Pembayaran</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.lihat-bukti-btn').forEach(button => {
            button.addEventListener('click', function () {
                const idTransaksi = this.getAttribute('id-transaksi');
                const pembeli = this.getAttribute('data-pembeli');
                const produk = this.getAttribute('data-produk');
                const jumlah = this.getAttribute('data-jumlah');
                const varian = this.getAttribute('data-varian');
                const status = this.getAttribute('data-status');
                const pesan = this.getAttribute('data-pesan');
                const gambar = this.getAttribute('data-gambar');

                const transaksiID = document.getElementById('idTransaksi');
                document.getElementById('idTransaksi').value = idTransaksi;
                document.getElementById('pembeli').value = pembeli;
                document.getElementById('produk').value = produk;
                document.getElementById('jumlah').value = jumlah;
                document.getElementById('varian').value = varian;
                document.getElementById('status').value = status;
                document.getElementById('pesan').value = pesan;
                document.getElementById('buktiPembayaranImg').setAttribute('src', gambar);

                const form = document.getElementById('transaksiForm');
                const routeTemplate = form.getAttribute('data-route');
                const updatedRoute = routeTemplate.replace('transaksi_id', idTransaksi);
                form.setAttribute('action', updatedRoute);
            });
        });
    </script>
</body>
</html>