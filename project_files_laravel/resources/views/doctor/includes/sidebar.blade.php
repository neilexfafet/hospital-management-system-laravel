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
        <a class="nav-link" href={{ url('doctor/dashboard')}}>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">  

       <li class="nav-item">
        <a class="nav-link" href={{ url('doctor/personal-information') }}>
          <i class="fas fa-fw fa-user"></i>
          <span>Personal Information</span></a>
      </li>

       <!--<li class="nav-item">
        <a class="nav-link" href={{ url('doctor/schedules') }}>
          <i class="fas fa-fw fa-calendar"></i>
          <span>Schedules</span></a>
      </li>-->

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
          <i class="fas fa-fw fa-list"></i>
          <span>Appointments</span>
        </a>
          <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href={{ url('doctor/approved-appointments') }}>Approved Appointments</a>
              <a class="collapse-item" href={{ url('doctor/pending-appointments') }}>Pending Appointments</a>
              <a class="collapse-item" href={{ url('doctor/appointment-history') }}>Appointment History</a>
            </div>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href={{ url('doctor/manage-patients')}}>
          <i class="fas fa-fw fa-wheelchair"></i>
          <span>Patients</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href={{ url('doctor/laboratory-test-results')}}>
          <i class="fas fa-fw fa-flask"></i>
          <span>Laboratory Test Results</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->