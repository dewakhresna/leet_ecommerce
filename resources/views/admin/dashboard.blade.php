@extends('layouts.admin')


@section('content')
<div class="admin-container">
    <div class="d-flex align-items-center justify-content-between mt-5 mb-3">
        <!-- Search Form -->
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        </form>

        <!-- Center Title -->
        <h3 class="m-0">Daftar Produk</h3>

        <!-- Add Product Button -->
        <button class="btn btn-primary"><a href="{{ route('admin.tambah-produk') }}" class="text-white text-decoration-none">Tambah Produk</a></button>
    </div>

    <table class="table table-striped table-hover mb-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Info Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
            @foreach ($produks as $index => $produk)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div class="info-produk">
                            <img src="{{ asset('storage/assets/produk/' . $produk->gambar0) }}" alt="{{ $produk->nama_produk }}" style="width: 50px; height: 50px;">
                            <h5>{{ $produk->nama_produk }}</h5>
                        </div>
                    </td>
                    <td>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $produk->stokS + $produk->stokM + $produk->stokL + $produk->stokXL + $produk->stok2XL }}</td>
                    <td>{{ $produk->kategori }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('admin.edit-produk', $produk->id) }}">Edit</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.delete-produk', $produk->id) }}">Hapus</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
        </thead>
  </table>
</div>
@endsection
