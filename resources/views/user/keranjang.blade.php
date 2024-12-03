<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Keranjang</title>
    <link rel="icon" href="{{ asset('assets/logo/logo_leet.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .keranjang-item { display: flex; align-items: center; margin-bottom: 15px; }
        .keranjang-item img { width: 80px; height: 80px; margin-right: 15px; }
        .keranjang-total { font-size: 1.5rem; font-weight: bold; }
        .bayar-btn { background-color: #ffffff; color: #000000; padding: 10px 20px; }
        .bayar-btn:hover { background-color: #000000; color: #ffffff; }
    </style>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">KERANJANG</h2>
        <div id="keranjang" class="row mt-4">
            <!-- Produk keranjang akan dimuat di sini -->
        </div>
        <div class="mt-4 text-end">
            
            <div class="keranjang-total">TOTAL: Rp <span id="totalHarga">0</span></div>
            <button id="btnBayar" class="bayar-btn mt-3">BAYAR</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const userId = 1;

        function formatNumber(num) {
            return new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0,
            }).format(num);
        }

        // Load data keranjang
        function loadKeranjang() {
            $.get(`/api/user/${userId}/keranjang`, function (data) {
                const keranjangContainer = $('#keranjang');
                keranjangContainer.empty();

                let totalHarga = 0;

                data.forEach((item) => {
                    keranjangContainer.append(`
                        <div class="col-12 keranjang-item">
                            <input type="checkbox" class="form-check-input produk-check" data-id="${item.id}" data-harga="${item.total_harga}">
                            <img src="${item.gambar0}" alt="${item.nama_produk}">
                            <div>
                                <h5>${item.nama_produk} | ${item.kategori}</h5>
                                <p>Rp ${formatNumber(item.total_harga)} x ${item.jumlah}</p>
                            </div>
                        </div>
                    `);
                });

                // Update total harga
                $('.produk-check').on('change', function () {
                    totalHarga = 0;
                    $('.produk-check:checked').each(function () {
                        totalHarga += parseInt($(this).data('harga'));
                    });
                    $('#totalHarga').text(formatNumber(totalHarga));
                });
            });
        }

        // Event klik tombol bayar
        $('#btnBayar').on('click', function () {
            const selectedProducts = [];
            $('.produk-check:checked').each(function () {
                selectedProducts.push($(this).data('id'));
            });

            if (selectedProducts.length === 0) {
                alert('Pilih setidaknya satu produk untuk checkout!');
                return;
            }

            // Ambil CSRF token
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Kirim POST request dengan CSRF token
            $.post('/checkout', { 
                _token: csrfToken, 
                produk: selectedProducts 
            })
            .done(function (response) {
                alert(response.message);
                loadKeranjang(); // Refresh data keranjang
                window.location.href = `/user/home/${userId}/pembayaran`;
            })
            .fail(function (error) {
                alert(error.responseJSON.message || 'Terjadi kesalahan saat checkout!');
            });
        });

        // Load keranjang saat halaman dimuat
        $(document).ready(function () {
            loadKeranjang();
        });
    </script>
</body>
</html>