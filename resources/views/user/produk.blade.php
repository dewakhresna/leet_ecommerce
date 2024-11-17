@extends ('layouts.app')

@section('content')

<h3 class="mt-4">Produk</h3>
<div class="row row-cols-1 row-cols-md-3 g-4 mt-3 mb-2">
    @foreach ($produks as $index => $produk)    
      <div class="col">
        <div class="card h-100">
          <img src="{{ asset('storage/assets/produk/' . $produk->gambar0) }}" alt="{{ $produk->nama_produk }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
            <p class="card-text">Rp. {{ $produk->harga }}</p>
            <p class="card-text">{{ $produk->deskripsi }}</p>
            @if(Auth::check())
              <a href="{{ route('user.detail-produk', ['user_id' => $user->id, 'produk_id' => $produk->id]) }}" class="btn btn-primary">Lihat Produk</a>
            @else
              <a href="#" data-bs-toggle="modal" data-bs-target="#signIn" class="btn btn-primary">Lihat Produk</a>
            @endif
          </div>
        </div>
      </div>
    @endforeach
</div>

@endsection