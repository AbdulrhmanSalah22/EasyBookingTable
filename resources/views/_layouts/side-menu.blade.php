<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-decoration-none">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EasyBookingTable</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            @if(\Illuminate\Support\Facades\Auth::user())
          <a href="#" class="d-block h1 text-decoration-none">{{auth()->user()->name}}</a>
            @endif
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('ShowCategories')}}" class="nav-link">
                <i class="nav-icon fad fa-arrow-circle-right"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ShowMeals')}}" class="nav-link">
                <i class="nav-icon fad fa-arrow-circle-right"></i>
              <p>
                Meals
              </p>
            </a>
          </li>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fad fa-arrow-circle-right"></i>
                    <p>
                        Orders
                    </p>
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fad fa-arrow-circle-right"></i>
                    <p>
                        Tables
                    </p>
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fad fa-arrow-circle-right"></i>
                    <p>
                        Reservations
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
