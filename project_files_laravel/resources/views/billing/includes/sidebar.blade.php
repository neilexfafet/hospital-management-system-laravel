<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="javascript:void(0);">
        <div class="sidebar-brand-icon">
          <img src='{{ asset('assets/img/logo.png') }}' width="50" height="50" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Hospital</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href={{ url('billing/dashboard')}}>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">  

      <li class="nav-item">
        <a class="nav-link " href="{{ url('billing/invoice') }}">
          <i class="fa fa-check"></i>
          <span>Payments</span>
        </a>
        
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href={{ url('billing/consultation-fees') }}>
          <i class="fas fa-stethoscope"></i>
          <span>Consultation Fees</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href={{ url('billing/laboratory-fees') }}>
          <i class="fas fa-fw fa-flask"></i>
          <span>Laboratory Fees</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
          <i class="fas fa-fw fa-flag"></i>
          <span>Reports</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href={{ url('billing/reports') }}>Patient's Invoice</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->