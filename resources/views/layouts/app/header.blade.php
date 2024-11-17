<header class="p-3 custom-header">
    <div class="container">
      <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
          <img src="{{ asset('assets/logo/logo_leet.png') }}" alt="Logo" width="30" height="30" class="logo-img">
          {{-- <a href="/" class="d-flex align-items-center text-dark text-decoration-none me-2">
            <img src="{{ asset('assets/logo/logo_leet.png') }}" alt="Logo" width="30" height="30" class="logo-img">
          </a> --}}
          <span class="header-text status"><a href="#">Status Pesanan</a></span>
        </div>

        {{-- <div class="text-end">
          <a href="#" class="text-dark text-decoration-none me-2">sign in</a>
          <span class="text-dark">/</span>
          <a href="#" class="text-dark text-decoration-none ms-2">sign up</a>
        </div> --}}
        <div class="text-end">
            @if(Auth::check())
                <a href="{{ route('user.profile', Auth::user()->id) }}" class="text-dark text-decoration-none me-2">Hi {{ Auth::user()->name }}</a>
            @else
                <a href="" class="text-dark text-decoration-none me-2" data-bs-toggle="modal" data-bs-target="#signIn">sign in</a>
                <span class="text-dark">/</span>
                <a href="#" class="text-dark text-decoration-none ms-2" data-bs-toggle="modal" data-bs-target="#signUp">sign up</a>
            @endif
        </div>
      </div>
    </div>
</header>

<!-- Modal Sign In -->
<div class="modal fade" id="signIn" tabindex="-1" aria-labelledby="signInLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <img src="{{ asset('assets/logo/leet_navbar.png') }}" alt="Logo" width="40" height="40" class="logo-img me-2">
              <h5 class="modal-title" id="signInLabel">Sign In</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('login-proses') }}">
                  @csrf
                  <div class="mb-3">
                      <label for="signInEmail" class="form-label">Email</label>
                      <input type="email" class="form-control" id="signInEmail" name="email" placeholder="name@example.com">
                      @error('email')
                          <small>{{ $message }}</small>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="signInPassword" class="form-label">Password</label>
                      <input type="password" class="form-control" id="signInPassword" name="password" placeholder="Password">
                      @error('password')
                          <small>{{ $message }}</small>
                      @enderror
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Sign In</button>
                  <p class="d-flex justify-content-center mt-3">Belum memiliki akun? <a href="#" data-bs-toggle="modal" data-bs-target="#signUp" class="ms-1">Sign Up</a></p>
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Modal Sign Up -->
<div class="modal fade" id="signUp" tabindex="-1" aria-labelledby="signUpLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <img src="{{ asset('assets/logo/leet_navbar.png') }}" alt="Logo" width="40" height="40" class="logo-img me-2">
              <h5 class="modal-title" id="signUpLabel">Sign Up</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('register-proses') }}">
                  @csrf
                    <div class="mb-3">
                      <label for="signUpName" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="signUpName" name="name" placeholder="Username">
                  </div>
                  <div class="mb-3">
                      <label for="signUpUsername" class="form-label">Username</label>
                      <input type="text" class="form-control" id="signUpUsername" name="username" placeholder="Username">
                  </div>
                  <div class="mb-3">
                      <label for="signUpEmail" class="form-label">Email</label>
                      <input type="email" class="form-control" id="signUpEmail" name="email" placeholder="name@example.com">
                  </div>
                  <div class="mb-3">
                    <label for="signUpNoHP" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="signUpNoHP" name="no_hp" placeholder="No HP">
                </div>
                  <div class="mb-3">
                    <label for="signUpAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="signUpAlamat" name="alamat" placeholder="Alamat">
                </div>
                  <div class="mb-3">
                      <label for="signUpPassword" class="form-label">Password</label>
                      <input type="password" class="form-control" id="signUpPassword" name="password" placeholder="Password">
                  </div>
                  <div class="mb-3">
                      <label for="confirmPassword" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password">
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                  <p class="d-flex justify-content-center mt-3">Sudah memiliki akun? <a href="#" data-bs-toggle="modal" data-bs-target="#signIn" class="ms-1">Sign In</a></p>
              </form>
          </div>
      </div>
  </div>
</div>

{{-- @if($message = Session::get('failed'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
@endif --}}