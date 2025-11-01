<nav class="navbar navbar-expand navbar-light topbar mb-4 shadow-sm"
  style="background: linear-gradient(90deg, #4e73df 0%, #224abe 100%);">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 text-white">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Search -->
  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" class="form-control border-0 small" placeholder="Cari sesuatu..." aria-label="Search"
        aria-describedby="basic-addon2"
        style="background: rgba(255,255,255,0.2); color: white; backdrop-filter: blur(10px);">
      <div class="input-group-append">
        <button class="btn text-white" type="button" style="background: rgba(255,255,255,0.3);">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle text-white" href="#" id="searchDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari sesuatu..."
              aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    @auth
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-white small font-weight-bold">{{ auth()->user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('template/img/undraw_profile.svg') }}"
            style="width: 35px; height: 35px; border: 2px solid white;">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow-lg animated--grow-in" aria-labelledby="userDropdown"
          style="border-radius: 15px; border: none; margin-top: 10px;">
          <div class="px-3 py-2 border-bottom">
            <div class="font-weight-bold text-primary">{{ auth()->user()->name }}</div>
            <div class="small text-muted">{{ auth()->user()->email }}</div>
          </div>
          <a class="dropdown-item d-flex align-items-center py-2" href="/profile">
            <i class="fas fa-user fa-sm fa-fw mr-3 text-primary"></i>
            <span>Profil</span>
          </a>
          <a class="dropdown-item d-flex align-items-center py-2" href="/change-password">
            <i class="fas fa-key fa-sm fa-fw mr-3 text-info"></i>
            <span>Ubah Password</span>
          </a>
          <div class="dropdown-divider my-1"></div>
          <a class="dropdown-item d-flex align-items-center py-2 text-danger" href="#" data-toggle="modal"
            data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-3"></i>
            <span>Logout</span>
          </a>
        </div>
      </li>
    @endauth

  </ul>

</nav>

<style>
  /* Placeholder color untuk input search */
  .navbar-search input::placeholder {
    color: rgba(255, 255, 255, 0.7);
  }

  /* Hover effect untuk dropdown items */
  .dropdown-item:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    transform: translateX(5px);
    transition: all 0.3s ease;
  }

  .dropdown-item:hover i {
    color: white !important;
  }

  /* Animation untuk dropdown */
  .animated--grow-in {
    animation: growIn 0.2s ease-in-out;
  }

  @keyframes growIn {
    0% {
      transform: scale(0.9);
      opacity: 0;
    }

    100% {
      transform: scale(1);
      opacity: 1;
    }
  }
</style>
