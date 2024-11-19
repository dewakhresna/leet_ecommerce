@extends('layouts.app')

@section('content')

<section id="beranda">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('assets/gambar/banner_1.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/gambar/banner_2.png')}}" class="d-block w-100" alt="...">
        </div>
        {{-- <div class="carousel-item">
          <img src="{{ asset('assets/gambar/sea(26).png')}}" class="d-block w-100" alt="...">
        </div> --}}
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden ">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </div>
</section>
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

<section id="about" class="mt-5 mb-5">
  <h1 class="text-center">Hi, LEET disini</h1>
  <p>
    Leet adalah brand clothing Indonesia yang mengedepankan gaya, kenyamanan, dan kreativitas.
    Dengan desain fresh dan edgy, Leet menawarkan koleksi pakaian berkualitas tinggi untuk
    berbagai kesempatan. Leet menggunakan bahan ramah lingkungan dan proses produksi etis.
    Temukan gaya unik Anda bersama Leet!
  </p>
</section>

<section id="lokasi" class="mt-5">
  <div class="container">
    <div class="row mb-5 align-items-center">
      <h1 class="text-center mb-5">Lokasi Kami</h1>
        <div class="col-md-8">
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9457172179826!2d107.6138257!3d-6.9775158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9afc17114a3%3A0x686008ce0f77ae5d!2sJl.%20Sukabirus%20No.85%2C%20RT.2%2FRW.15%2C%20Citeureup%2C%20Kec.%20Dayeuhkolot%2C%20Kabupaten%20Bandung%2C%20Jawa%20Barat%2040257!5e0!3m2!1sen!2sid!4v1690213690179!5m2!1sen!2sid"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center text-md-start mb-4">
                <h2>Bandung</h2>
                <p>
                    Jl. Sukabirus Gang kotaku No.85, <br>
                    RT/RW.001/015, Citeureup, Dayeuhkolot, <br>
                    Kabupaten Bandung, Jawa Barat 40257
                </p>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-8">
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4589784231557!2d106.8381655!3d-6.2926556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f20c98143f8f%3A0x9fe41ed9333f6972!2sJl.%20Bambu%20Suling%20III%20Blok%20B%20No.5%2C%20RT.4%2FRW.6%2C%20Ps.%20Minggu%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012520!5e0!3m2!1sen!2sid!4v1690213690179!5m2!1sen!2sid"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center text-md-start mb-4">
                <h2>Jakarta</h2>
                <p>
                    Jl. Bambu Suling III Blok B No.5, <br>
                    RT/RW.005/006, Pasar Minggu, <br>
                    Pasar Minggu, Jakarta Selatan, 12520
                </p>
            </div>
        </div>
    </div>
  </div>
</section>

@endsection