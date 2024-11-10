@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.tambah-produk.store') }}" method="POST" enctype="multipart/form-data" class="tambah-produk mb-5 mt-5">
        @csrf
        <div class="mb-3 row">
            <label for="namaProduk" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="namaProduk" name="namaProduk">
            </div>
            @error('namaProduk')
                <small>{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kategori" name="kategori">
            </div>
            @error('kategori')
                <small>{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            @error('deskripsi')
                <small>{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10 mb-3 row gambar-wrapper">
                @for ($i = 1; $i <= 4; $i++)
                    <div>
                        <div class="mb-4 d-flex justify-content-center">
                            <img id="selectedImage{{ $i }}" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                                alt="example placeholder" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                <label class="form-label text-white m-1" for="customFile{{ $i }}">Choose file</label>
                                <input type="file" class="form-control d-none" id="customFile{{ $i }}" name="gambar[]" onchange="displaySelectedImage(event, 'selectedImage{{ $i }}')" />
                            </div>
                        </div>
                    </div>
                @endfor
                @error('gambar')
                    <small>{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="varian" class="col-sm-2 col-form-label">Varian</label>
            <div class="col-sm-10 mb-2" id="varian-container">
                <div class="d-flex gap-2">
                    <select class="form-select" name="varian[0]" aria-label="Default select example">
                        <option selected>Pilih Varian</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="2XL">2XL</option>
                    </select>
                    <input type="number" class="form-control" name="stok[0]" placeholder="Jumlah Stock">
                    <button type="button" class="btn btn-primary" id="tambah-varian">Tambah Varian</button>
                </div>
                @error('stok')
                    <small>{{ $message }}</small>
                @enderror
            </div>
        </div>
       
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="harga" name="harga">
            </div>
            @error('harga')
                <small>{{ $message }}</small>
            @enderror
        </div>
        <div class="text-end">
            <button class="btn btn-danger">Kembali</button>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
@endsection