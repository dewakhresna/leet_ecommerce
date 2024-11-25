<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image-main {
            width: 100%;
            max-width: 400px;
            border: 1px solid #ddd;
        }
        .product-thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 1px solid #ddd;
            margin-right: 5px;
            cursor: pointer;
        }
        .size-btn.active {
            background-color: #5cfd06;
            font-weight: bold;
        }
        .size-btn {
            width: 45px;
            height: 45px;
            margin-right: 5px;
            text-align: center;
        }
        .add-to-cart-btn {
            background-color: black;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <!-- Product Images Section -->
        <div class="col-md-6 text-center">
            <!-- Main Product Image -->
            <img id="mainImage" src="{{ asset('storage/assets/produk/' . $produk->gambar0) }}" alt="{{ $produk->nama_produk }}" class="product-image-main mb-3">

            <!-- Thumbnail Images -->
            <div>
                <img src="{{ asset('storage/assets/produk/' . $produk->gambar1) }}" alt="{{ $produk->nama_produk }}" class="product-thumbnail" onclick="changeImage('{{ asset('storage/assets/produk/' . $produk->gambar1) }}')">
                <img src="{{ asset('storage/assets/produk/' . $produk->gambar2) }}" alt="{{ $produk->nama_produk }}" class="product-thumbnail" onclick="changeImage('{{ asset('storage/assets/produk/' . $produk->gambar2) }}')">
                <img src="{{ asset('storage/assets/produk/' . $produk->gambar3) }}" alt="{{ $produk->nama_produk }}" class="product-thumbnail" onclick="changeImage('{{ asset('storage/assets/produk/' . $produk->gambar3) }}')">
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="col-md-6">
            <h6 class="text-uppercase text-muted">Product {{$produk->kategori}}</h6>
            <h2>{{$produk->nama_produk}}</h2>
            <h4>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</h4>
            
            <div class="mt-3">
                <label for="quantity" class="form-label">Jumlah item</label>
                <div class="input-group mb-3" style="width: 150px;">
                    <button class="btn btn-outline-secondary" type="button" id="btn-minus">-</button>
                    <input type="number" id="quantity" class="form-control text-center" value="1" min="1">
                    <button class="btn btn-outline-secondary" type="button" id="btn-plus">+</button>
                </div>
            </div>
            
            <div class="mt-3">
                <button class="btn btn-outline-dark size-btn">S</button>
                <button class="btn btn-outline-dark size-btn">M</button>
                <button class="btn btn-outline-dark size-btn active">L</button>
                <button class="btn btn-outline-dark size-btn">XL</button>
                <button class="btn btn-outline-dark size-btn">2XL</button>
            </div>
            <form action="{{ route('user.detail-produk.keranjang', ['user_id' => $user_id, 'produk_id' => $produk_id]) }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <input type="hidden" name="produk_id" value="{{ $produk_id }}">
                <input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}">
                <input type="hidden" name="kategori" value="{{ $produk->kategori }}">
                <input type="hidden" name="gambar0" value="{{ $produk->gambar0 }}">
                <input type="hidden" name="jumlah" id="form-quantity" value="1">
                <input type="hidden" name="varian" id="form-varian" value="L"> <!-- Default variant -->
                <input type="hidden" name="total_harga" id="form-total-harga" value="{{ $produk->harga }}" >
                <input type="hidden" name="status" value="0">
                <button type="submit" class="btn add-to-cart-btn mt-3 w-100">Tambahkan Ke Keranjang</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Function to change main image on thumbnail click
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
    }

    const quantityInput = document.getElementById('quantity');
    const formQuantityInput = document.getElementById('form-quantity');

    // Quantity increment and decrement
    document.getElementById('btn-minus').addEventListener('click', function() {
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            formQuantityInput.value = quantityInput.value; // Update hidden input
        }
    });

    document.getElementById('btn-plus').addEventListener('click', function() {
        quantityInput.value = parseInt(quantityInput.value) + 1;
        formQuantityInput.value = quantityInput.value; // Update hidden input
    });

    quantityInput.addEventListener('input', function() {
        formQuantityInput.value = quantityInput.value;
    });

    // Size selection
    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            document.getElementById('form-varian').value = this.textContent; // Update hidden input
        });
    });

    const hargaProduk = {{ $produk->harga }};
    const totalHargaInput = document.getElementById('form-total-harga');

    // Fungsi untuk memperbarui total harga
    function updateTotalHarga() {
        const jumlahItem = parseInt(quantityInput.value);
        const totalHarga = hargaProduk * jumlahItem;
        totalHargaInput.value = totalHarga; // Perbarui hidden input
    }

    // Memanggil fungsi setiap kali jumlah berubah
    quantityInput.addEventListener('input', updateTotalHarga);
    document.getElementById('btn-minus').addEventListener('click', updateTotalHarga);
    document.getElementById('btn-plus').addEventListener('click', updateTotalHarga);

    // Inisialisasi awal
    updateTotalHarga();
</script>
</body>
</html>
