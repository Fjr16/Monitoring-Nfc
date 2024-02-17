<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mb-3 mt-4">
      <a href="index.html" class="app-brand-link text-center mx-auto">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" width="60" alt="">
          </span>
        <span class="demo fs-5 menu-text fw-bolder ms-2">MONITORING <br> NFC</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow mt-3"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ ($title === "Dashboard") ? 'active' : '' }}">
        <a href="/" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      @canany(['admin', 'manager'])
        <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Report</span>
        </li>

        <li class="menu-item {{ ($title === "Monitoring Akses NFC") ? 'active' : '' }}">
          <a href="{{ route('monitoring/access/nfc.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-analyse"></i>
            <div data-i18n="Analytics">Monitoring Akses NFC</div>
          </a>
        </li>
      @endcanany

      @can('admin')  
        <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Management</span>
        </li>

        <li class="menu-item {{ ($title === "User") ? 'active' : '' }}">
          <a href="{{ route('user.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user-voice"></i>
            <div data-i18n="Analytics">User</div>
          </a>
        </li>
      @endcan

    </ul>
    <div class="divider"></div>
    <div class="text-center">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning w-100">
            <i class='bx bx-log-out' ></i>
            Logout
        </button>
      </form>
    </div>

</aside>
