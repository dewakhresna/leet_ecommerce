@extends('layouts.admin')


@section('content')
<div class="admin-container">
    <div class="d-flex align-items-center justify-content-between mt-5 mb-1">
        <!-- Search Form -->
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <!-- Center Title -->
        <h3 class="m-0">Daftar Produk</h3>

        <!-- Add Product Button -->
        <button class="btn btn-primary">Tambah Produk</button>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>NO</th>
                <th>Info Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    <div class="info-produk">
                        <img src="{{ asset('assets/gambar/sea(26).png') }}" alt="Leet T-Shirt">
                        <h5>Leet | T-Shirt | Kaos washed | Rock This World</h5>
                    </div>
                </td>
                <td>Rp. 100.000</td>
                <td>10</td>
                <td>Kaos</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Hapus</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        </thead>
  </table>
</div>
@endsection
