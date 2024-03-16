<?php

$segment = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);

$data_user = getProfile();


?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard" class="brand-link">
    <img src="https://i.ibb.co/mhd1LGd/school.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Rumah Pintar Alfarizqi</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url(); ?>assets/uploads/users/<?= $data_user['image']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="profile" class="d-block text-capitalize"><?= $data_user['username']; ?></a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
          <a href="<?= base_url(); ?>dashboard" class="nav-link <?= ($segment == 'dashboard') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($this->session->userdata('id_role') == 1) : ?>

          <li class="nav-item">
            <a href="<?= base_url('user'); ?>" class="nav-link <?= ($segment == 'user') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('bimbel'); ?>" class="nav-link <?= ($segment == 'bimbel') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Data Bimbel
              </p>
            </a>
          </li>
          
        <?php endif; ?>

        <li class="nav-item">
          <a href="<?= base_url('siswa'); ?>" class="nav-link <?= ($segment == 'siswa') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-graduation-cap"></i>
            <p>
                Siswa
            </p>
          </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('spp'); ?>" class="nav-link <?= ($segment == 'spp') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Pembayaran SPP
              </p>
            </a>
          </li>
        <li class="nav-item  <?= ($segment == 'profile' || $segment == 'gantipass') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profile
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('profile'); ?>" class="nav-link <?= ($segment == 'profile') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  My Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('gantipass'); ?>" class="nav-link <?= ($segment == 'gantipass') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Ganti Password
                </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url(); ?>auth/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>