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

<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
  style="background: linear-gradient(180deg, #667eea 0%, #764ba2 100%); box-shadow: 2px 0 10px rgba(0,0,0,0.1);">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard"
    style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 1.5rem 1rem; margin-bottom: 1rem;">
    <div class="sidebar-brand-icon"
      style="background: rgba(255,255,255,0.2); width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
      <i class="fas fa-home" style="font-size: 1.3rem;"></i>
    </div>
    <div class="sidebar-brand-text mx-3" style="font-weight: 700; font-size: 1.3rem; letter-spacing: 1px;">DesaKu</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0" style="border-color: rgba(255,255,255,0.2);">

  <!-- Nav Items -->
  @auth
    <div style="padding: 1rem 0;">
      @foreach ($menus[auth()->user()->role_id] as $menu)
        <li class="nav-item {{ request()->is($menu->path . '*') ? 'active' : '' }}"
          style="margin: 0.3rem 0.8rem; list-style: none;">
          <a class="nav-link menu-link" href="/{{ $menu->path }}"
            style="border-radius: 12px; padding: 0.9rem 1rem; transition: all 0.3s ease;
                    {{ request()->is($menu->path . '*') ? 'background: rgba(255,255,255,0.25); box-shadow: 0 4px 10px rgba(0,0,0,0.15);' : '' }}">
            <div style="display: flex; align-items: center;">
              <div
                style="width: 35px; height: 35px; background: rgba(255,255,255,0.15); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 0.8rem;">
                <i class="{{ $menu->icon }}" style="font-size: 1rem;"></i>
              </div>
              <span style="font-weight: 500; font-size: 0.95rem;">{{ $menu->title }}</span>
            </div>
          </a>
        </li>
      @endforeach
    </div>
  @endauth

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block" style="border-color: rgba(255,255,255,0.2); margin-top: auto;">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline" style="padding: 1rem;">
    <button class="rounded-circle border-0" id="sidebarToggle"
      style="background: rgba(255,255,255,0.2); width: 40px; height: 40px; transition: all 0.3s ease;">
      <i class="fas fa-angle-left" style="color: white;"></i>
    </button>
  </div>

</ul>

<style>
  /* Hover effect untuk menu items */
  .menu-link:hover {
    background: rgba(255, 255, 255, 0.2) !important;
    transform: translateX(5px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2) !important;
  }

  /* Active state enhancement */
  .nav-item.active .menu-link {
    font-weight: 600;
  }

  /* Sidebar brand hover */
  .sidebar-brand:hover {
    background: rgba(255, 255, 255, 0.15) !important;
    transform: scale(1.02);
    transition: all 0.3s ease;
  }

  /* Toggle button hover */
  #sidebarToggle:hover {
    background: rgba(255, 255, 255, 0.3) !important;
    transform: rotate(180deg);
  }

  /* Smooth transitions */
  .sidebar {
    transition: all 0.3s ease;
  }

  /* Icon container hover effect */
  .menu-link:hover div div {
    background: rgba(255, 255, 255, 0.25) !important;
    transform: scale(1.1);
    transition: all 0.3s ease;
  }

  /* Custom scrollbar for sidebar */
  .sidebar {
    scrollbar-width: thin;
    scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
  }

  .sidebar::-webkit-scrollbar {
    width: 6px;
  }

  .sidebar::-webkit-scrollbar-track {
    background: transparent;
  }

  .sidebar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
  }

  .sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
  }
</style>
