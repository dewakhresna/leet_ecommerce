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
          <a href="" class="text-dark text-decoration-none me-2" data-bs-toggle="modal" data-bs-target="#signIn">sign in</a>
          <span class="text-dark">/</span>
          <a href="#" class="text-dark text-decoration-none ms-2" data-bs-toggle="modal" data-bs-target="#signUp">sign up</a>
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
              <form>
                  <div class="mb-3">
                      <label for="signInEmail" class="form-label">Email</label>
                      <input type="email" class="form-control" id="signInEmail" placeholder="name@example.com">
                  </div>
                  <div class="mb-3">
                      <label for="signInPassword" class="form-label">Password</label>
                      <input type="password" class="form-control" id="signInPassword" placeholder="Password">
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
              <form>
                  <div class="mb-3">
                      <label for="signUpUsername" class="form-label">Email</label>
                      <input type="email" class="form-control" id="signUpUsername" placeholder="name@example.com">
                  </div>
                  <div class="mb-3">
                      <label for="signUpEmail" class="form-label">Email</label>
                      <input type="email" class="form-control" id="signUpEmail" placeholder="name@example.com">
                  </div>
                  <div class="mb-3">
                      <label for="signUpPassword" class="form-label">Password</label>
                      <input type="password" class="form-control" id="signUpPassword" placeholder="Password">
                  </div>
                  <div class="mb-3">
                      <label for="confirmPassword" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                  <p class="d-flex justify-content-center mt-3">Sudah memiliki akun? <a href="#" data-bs-toggle="modal" data-bs-target="#signIn" class="ms-1">Sign In</a></p>
              </form>
          </div>
      </div>
  </div>
</div>