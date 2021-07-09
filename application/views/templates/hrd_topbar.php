     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

             <!-- Topbar -->
             <nav class="navbar navbar-expand navbar-light bg-gradient-info topbar mb-4 static-top shadow">
                 <img src="<?= base_url('assets/img/ic_malakasari.png') ?>" width="100" height="70" class="d-inline-block align-top text " alt="">
                 <a class="navbar-brand text-gray-100 font-weight-bolder" href="#">PT. Malakasari</a>
                 <!-- Sidebar Toggle (Topbar) -->
                 <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                 </button>



                 <!-- Topbar Navbar -->
                 <ul class="navbar-nav ml-auto">

                     <div class="topbar-divider d-none d-sm-block"></div>

                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
                         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="mr-2 d-none d-lg-inline text-white small"><?= $user['name']; ?></span>
                             <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                         </a>
                         <!-- Dropdown - User Information -->
                         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                             <a class="dropdown-item" href="<?= base_url('hrd/profile'); ?>">
                                 <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                 My Profile
                             </a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Logout
                             </a>
                         </div>
                     </li>

                 </ul>

             </nav>
             <!-- End of Topbar -->