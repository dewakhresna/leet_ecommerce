<footer class="container py-5">
    <div class="row">
      <div class="col-6 col-md">
        <h5>LEET</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#lokasi">Lokasi Toko</a></li>
          <li><a class="link-secondary" href="#about">Tentang Kami</a></li>
          <li><a class="link-secondary" href="https://web.whatsapp.com/">Hubungi Kami</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Product</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#beranda">Sale</a></li>
          @if(Auth::check())
            <li><a class="link-secondary" href="{{ route('user.produk', Auth::user()->id)}}">Koleksi Terbaru</a></li>
            <li><a class="link-secondary" href="{{ route('user.produk', Auth::user()->id)}}">Kaos</a></li>
            <li><a class="link-secondary" href="{{ route('user.produk', Auth::user()->id)}}">Celana</a></li>
          @else
            <li><a class="link-secondary" href="#" data-bs-toggle="modal" data-bs-target="#signIn">Koleksi Terbaru</a></li>
            <li><a class="link-secondary" href="#" data-bs-toggle="modal" data-bs-target="#signIn">Kaos</a></li>
            <li><a class="link-secondary" href="#" data-bs-toggle="modal" data-bs-target="#signIn">Celana</a></li>
          @endif
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Bantuan</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="https://web.whatsapp.com">FAQ</a></li>
          @if(Auth::check())
            <li><a class="link-secondary" href="{{ route('user.pesanan', Auth::user()->id)}}">Pembayaran</a></li>
            <li><a class="link-secondary" href="{{ route('user.pesanan', Auth::user()->id)}}">Penukaran & Pengembalian</a></li>
            <li><a class="link-secondary" href="{{ route('user.produk', Auth::user()->id)}}">Kebijakan Privasi</a></li>
          @else
            <li><a class="link-secondary" href="#" data-bs-toggle="modal" data-bs-target="#signIn">Pembayaran</a></li>
            <li><a class="link-secondary" href="#" data-bs-toggle="modal" data-bs-target="#signIn">Penukaran & Pengembalian</a></li>
            <li><a class="link-secondary" href="#" data-bs-toggle="modal" data-bs-target="#signIn">Kebijakan Privasi</a></li>
          @endif
        </ul>
      </div>
      <div class="col-6 col-md">
        <img src="{{ asset('assets/logo/leet_navbar.png')}}" alt="Leet" width="50" height="50">
        <h5>Hubungi Kami</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="https://web.whatsapp.com">0812-9599-9153</a></li>
          <li><a class="link-secondary" href="#">leetofficialstore@gmail.com</a></li>
        </ul>
      </div>
    </div>
</footer>