@php
  $menus = [
      1 => [
          (object) [
              'title' => 'Dashboard',
              'path' => 'dashboard',
              'icon' => 'fas fa-fw fa-tachometer-alt',
          ],
          (object) [
              'title' => 'Penduduk',
              'path' => 'resident',
              'icon' => 'fas fa-fw fa-users',
          ],
          (object) [
              'title' => 'Daftar Akun',
              'path' => 'account-list',
              'icon' => 'fas fa-fw fa-user-circle',
          ],
          (object) [
              'title' => 'Permintaan Akun',
              'path' => 'account-request',
              'icon' => 'fas fa-fw fa-user-clock',
          ],
          (object) [
              'title' => 'Aduan Warga',
              'path' => 'complaint',
              'icon' => 'fas fa-fw fa-bullhorn',
          ],
      ],
      2 => [
          (object) [
              'title' => 'Dashboard',
              'path' => 'dashboard',
              'icon' => 'fas fa-fw fa-tachometer-alt',
          ],
          (object) [
              'title' => 'Pengaduan',
              'path' => 'complaint',
              'icon' => 'fas fa-fw fa-bullhorn',
          ],
      ],
  ];
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
    <div class="sidebar-brand-icon">
      <i class="fas fa-home"></i>
    </div>
    <div class="sidebar-brand-text mx-3">DesaKu</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Items -->
  @auth
    @foreach ($menus[auth()->user()->role_id] as $menu)
      <li class="nav-item {{ request()->is($menu->path . '*') ? 'active' : '' }}">
        <a class="nav-link" href="/{{ $menu->path }}">
          <i class="{{ $menu->icon }}"></i>
          <span>{{ $menu->title }}</span>
        </a>
      </li>
    @endforeach
  @endauth

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>

<style>
  /* Sidebar styling */
  .sidebar {
    background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
  }

  /* Brand area */
  .sidebar-brand {
    height: 4.375rem;
    text-decoration: none;
    font-size: 1rem;
    font-weight: 800;
    padding: 1.5rem 1rem;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.05rem;
    z-index: 1;
  }

  .sidebar-brand-icon i {
    font-size: 2rem;
  }

  .sidebar-brand-text {
    font-size: 1.2rem;
  }

  /* Nav items */
  .sidebar .nav-item {
    position: relative;
  }

  .sidebar .nav-item .nav-link {
    text-align: left;
    padding: 1rem;
    width: 100%;
  }

  .sidebar .nav-item .nav-link span {
    font-size: 0.85rem;
    display: inline;
  }

  .sidebar .nav-item .nav-link i {
    font-size: 0.85rem;
    margin-right: 0.25rem;
  }

  /* Active state */
  .sidebar .nav-item.active .nav-link {
    font-weight: 700;
  }

  /* Hover effect - simple */
  .sidebar .nav-item .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }

  .sidebar .nav-item.active .nav-link {
    background-color: rgba(255, 255, 255, 0.15);
  }

  /* Divider */
  .sidebar .sidebar-divider {
    border-top: 1px solid rgba(255, 255, 255, 0.15);
    margin: 0 1rem;
  }

  /* Toggle button */
  #sidebarToggle {
    width: 2.5rem;
    height: 2.5rem;
    text-align: center;
    margin-bottom: 1rem;
    cursor: pointer;
    background-color: rgba(255, 255, 255, 0.2);
  }

  #sidebarToggle:hover {
    background-color: rgba(255, 255, 255, 0.25);
  }

  #sidebarToggle::after {
    font-weight: 900;
    content: '\f104';
    font-family: 'Font Awesome 5 Free';
    margin-right: 0.1rem;
  }

  .sidebar.toggled #sidebarToggle::after {
    content: '\f105';
    font-family: 'Font Awesome 5 Free';
    margin-left: 0.25rem;
  }
</style>
