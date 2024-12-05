<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('super-admin.dashboard') }}" class="brand-link">
    <img src="{{ asset('assetsBackend') }}/images/logo.jpg" alt="Admin Logo" class="brand-image elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" id="admin-full-name-header"><b>&emsp; {{ Auth::user()->full_name }}</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">   

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('super-admin.dashboard') }}" class="nav-link {{(Request::is('super-admin/dashboard'))?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        @role('SUPER-ADMIN')
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Office Managers
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/charts/chartjs.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Managers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Orders</p>
              </a>
            </li>
            
          </ul>
        </li>
      

        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Customer Management</p>
          </a>
        </li>

        {{-- <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-pen"></i>
            <p>Subscription Management</p>
          </a>
        </li> --}}

        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-pen"></i>
            <p>Role Management</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Reports</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-tasks"></i>
            <p>Content Management</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('super-admin.logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Log out</p>
          </a>
        </li>

        @endrole

        @role('OFFICE-MANAGERS')
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Manage Technicians</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Log out</p>
          </a>
        </li>

        @endrole

       

        

       

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>