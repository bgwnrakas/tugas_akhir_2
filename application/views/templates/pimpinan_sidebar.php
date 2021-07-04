      <!-- Sidebar -->
      <ul class="navbar-nav bg-gray-800 sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('pimpinan/index'); ?>">
              <div class="sidebar-brand-icon ">
                  <i class="fas fa-user-tie"></i>
              </div>
              <div class="sidebar-brand-text mx-3">Pimpinan<sup></sup></div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Menu
          </div>
          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pimpinan/index'); ?>">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pimpinan/kelola_bonus'); ?>">
                  <i class="fas fa-money-check-alt"></i>
                  <span>Kelola Bonus</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Account
          </div>

          <!-- Nav Item - Charts -->
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pimpinan/profile'); ?>">
                  <i class="fas fa-fw fa-id-card"></i>
                  <span>My Profile</span></a>
          </li>
          <!-- Nav Item - Charts -->
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                  <i class="fas fa-fw fa-sign-out-alt"></i>
                  <span>Logout</span></a>
          </li>




          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

      </ul>
      <!-- End of Sidebar -->