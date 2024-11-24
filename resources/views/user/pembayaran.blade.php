<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pembayaran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="text-center text-primary mb-4">Form Pembayaran</h2>
                <form action="{{ route('user.pembayaran-proses', ['user_id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_user" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="nama_user" value="{{ $user['name'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="{{ $user['alamat'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" value="{{ $user['no_hp'] }}" readonly>
                    </div>
                    <section>
                        <h4 class="mt-4 mb-3">Produk yang Dibeli</h4>
                        <div class="row g-3">
                            @foreach ($store as $item)
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <img src="{{ $item->gambar0 }}" alt="Produk {{ $item->nama_produk }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->nama_produk }}</h5>
                                        <p class="card-text">Kategori: {{ $item->kategori }}</p>
                                        <p class="card-text">Jumlah: {{ $item->jumlah }}</p>
                                        <p class="card-text">Varian: {{ $item->varian }}</p>
                                        <p class="card-text">Harga: Rp {{ number_format($item->total_harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    <div class="mb-3 mt-4">
                        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" name="metode_pembayaran" id="metode_pembayaran" required>
                            <option value="" disabled selected>Pilih Metode Pembayaran</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="E-Wallet">E-Wallet</option>
                            <option value="Kartu Kredit">Kartu Kredit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Bayar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('form');
            form.addEventListener('submit', (e) => {
                const metodeBayar = document.getElementById('metode_pembayaran');
                const buktiBayar = document.getElementById('bukti_pembayaran');

                if (!metodeBayar.value) {
                    alert('Pilih metode pembayaran!');
                    e.preventDefault();
                    return;
                }
                if (!buktiBayar.files.length) {
                    alert('Upload bukti pembayaran!');
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>