<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="javascript:void(0);">
        <div class="sidebar-brand-icon">
          <img src={{ asset('assets/img/logo.png') }} width="50" height="50" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Hospital</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href={{ url('laboratory/dashboard')}}>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href={{ url('laboratory/pending-requests') }}>
          <i class="fas fa-fw fa-list"></i>
          <span>Laboratory Requests</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href={{ url('laboratory/test-results') }}>
          <i class="fas fa-fw fa-list"></i>
          <span>Laboratory Test Results</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href={{ url('laboratory/facilities') }}>
          <i class="fas fa-fw fa-flask"></i>
          <span>Facilities</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->