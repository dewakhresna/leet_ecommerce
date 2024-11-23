<header class="p-3 custom-navbar mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="{{ asset('assets/logo/leet_navbar.png')}}" alt="Leet" width="110" height="110">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{ route('admin')}}" class="nav-link px-2 link-dark">Produk</a></li>
          <li><a href="{{ route('admin.transaksi')}}" class="nav-link px-2 link-dark">Transaksi</a></li>
        </ul>
      </div>
    </div>
</header>