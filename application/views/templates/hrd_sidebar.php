      <!-- Sidebar -->
      <ul class="navbar-nav bg-gray-800 sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('hrd/index'); ?>">
              <div class="sidebar-brand-icon ">
                  <i class="fas fa-house-user"></i>
              </div>
              <div class="sidebar-brand-text mx-3">HRD</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Administrator
          </div>

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('hrd/index'); ?>">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></a>
              <a class="nav-link" href="<?= base_url('hrd/kelola_kriteria'); ?>">
                  <i class="fas fa-passport"></i>
                  <span>Kelola Kriteria</span></a>
              <a class="nav-link" href="<?= base_url('hrd/kelola_sub_kriteria'); ?>">
                  <i class="fas fa-passport"></i>
                  <span>Kelola Sub Kriteria</span></a>
              <a class="nav-link" href="<?= base_url('hrd/kelola_penilaian_karyawan'); ?>">
                  <i class="fas fa-passport"></i>
                  <span>Kelola Penilaian Karyawan</span></a>
              <a class="nav-link" href="<?= base_url('hrd/kelola_karyawan'); ?>">
                  <i class="fas fa-users-cog"></i>
                  <span>Kelola Karyawan</span></a>
              <a class="nav-link" href="<?= base_url('hrd/kelola_pengguna'); ?>">
                  <i class="fas fa-fw fa-user-cog"></i>
                  <span>Kelola Pengguna</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Account
          </div>

          <!-- Nav Item - Charts -->
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('hrd/profile'); ?>">
                  <i class="fas fa-fw fa-id-card"></i>
                  <span>My Profile</span></a>
          </li>

          <!-- Nav Item - Charts -->
          <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="<?= base_url('auth/logout'); ?>">
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