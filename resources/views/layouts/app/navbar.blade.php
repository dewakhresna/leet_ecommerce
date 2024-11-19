<header class="p-3 custom-navbar">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="{{ asset('assets/logo/leet_navbar.png')}}" alt="Leet" width="110" height="110">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          
          @if(Auth::check())
            <li><a href="{{ route('user.home', Auth::user()->id)}}#beranda" class="nav-link px-2 link-dark">Beranda</a></li>
          @else
            <li><a href="#beranda" class="nav-link px-2 link-dark">Beranda</a></li>
          @endif
          
          @if(Auth::check())
            <li><a href="{{ route('user.produk', Auth::user()->id)}}" class="nav-link px-2 link-dark">Produk</a></li>
          @else
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#signIn" class="nav-link px-2 link-dark">Produk</a></li>
          @endif

          @if(Auth::check())
            <li><a href="{{ route('user.home', Auth::user()->id)}}#about" class="nav-link px-2 link-dark">Tentang</a></li>
          @else
            <li><a href="#about" class="nav-link px-2 link-dark">Tentang</a></li>
          @endif

          @if(Auth::check())
            <li><a href="{{ route('user.home', Auth::user()->id)}}#lokasi" class="nav-link px-2 link-dark">Lokasi</a></li>
          @else
            <li><a href="#lokasi" class="nav-link px-2 link-dark">Lokasi</a></li>
          @endif
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
        
        @if(Auth::check())
        <a href="/user/home/{user_id}/keranjang" class="d-flex align-items-center mr-2 mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="{{ asset('assets/icon/keranjang_icon.png')}}" alt="Leet" width="30" height="30">
        </a>
        @else
        <a href="" class="d-flex align-items-center mr-2 mb-2 mb-lg-0 text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#signIn">
          <img src="{{ asset('assets/icon/keranjang_icon.png')}}" alt="Leet" width="30" height="30">
        </a>
        @endif

        @if(Auth::check())
            <a href="{{ route('user.profile', Auth::user()->id) }}" class="d-flex align-items-center mr-2 mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="{{ asset('assets/icon/profile_icon.png')}}" alt="Leet" width="30" height="30">
            </a>
        @else
            <a href="" class="d-flex align-items-center mr-2 mb-2 mb-lg-0 text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#signIn">
                <img src="{{ asset('assets/icon/profile_icon.png')}}" alt="Leet" width="30" height="30">
            </a>
        @endif
      </div>
    </div>
</header>