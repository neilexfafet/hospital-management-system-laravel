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
        <a class="nav-link" href={{ url('management/dashboard')}}>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">  

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
          <i class="fas fa-fw fa-wheelchair"></i>
          <span>Patients</span>
        </a>
          <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href={{ url('management/manage-patients') }}>View Patients</a>
              <a class="collapse-item" href={{ url('management/pending-patients') }}>Pending for Check-IN</a>
              <a class="collapse-item" href={{ url('management/checkin-patients') }}>Check-In Patients</a>
            </div>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
          <i class="fas fa-fw fa-stethoscope"></i>
          <span>Doctors</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href={{ url('management/add-specialization') }}>Add Specialization</a>
            <a class="collapse-item" href={{ url('management/manage-doctors') }}>View Doctors</a>
            <a class="collapse-item" href={{ url('management/pending-doctors') }}>Pending Doctors</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href={{ url('management/laboratory') }}>
          <i class="fas fa-fw fa-flask"></i>
          <span>Laboratory</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href={{ url('management/add-billing') }}>
          <i class="fas fa-fw fa-book"></i>
          <span>Billing Department</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href={{ url('management/rooms') }}>
          <i class="fas fa-fw fa-bed"></i>
          <span>Rooms</span></a>
      </li>


      <!-- Nav Item - Tables 
      <li class="nav-item">
        <a class="nav-link" href={{ url('management/contact-us-queries') }}>
          <i class="fas fa-fw fa-comments"></i>
          <span>Contact Us Queries</span></a>
      </li>-->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
          <i class="fas fa-fw fa-flag"></i>
          <span>Reports</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href={{ url('management/reports') }}>Patient's Invoice</a>
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