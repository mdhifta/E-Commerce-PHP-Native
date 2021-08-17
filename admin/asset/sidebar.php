<?php
$query = $mysqli->query("SELECT * FROM tb_user WHERE id_user='$_SESSION[id_user]'");
$user = $query->fetch_object();
 ?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="../vendor/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Lechy Boutique</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../vendor/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $user->fname; ?> <?= $user->lname; ?></a>
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
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <!-- start dashboard -->
        <li class="nav-item menu-open">
          <a href="dashboard.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <!-- end dashboard -->
        <!-- produk -->
        <li class="nav-item">
          <a href="addProduk.php" class="nav-link">
            <i class="nav-icon fas fa-cubes"></i>
            <p>
              Master Produk
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="addProduk.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Produk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="masterProduk.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Produk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="masterKategori.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- end produk -->

        <!-- start gift -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-gift"></i>
            <p>
              Diskon & Voucher
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="masterVoucher.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Voucher</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Diskon</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/inline.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelola Voucher & Diskon</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- end gift -->

        <!-- chat start -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-comment"></i>
            <p>
              Chat Costumer
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/UI/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Chat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/icons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Komentar</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- end chat -->

        <!-- transaksi start -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Master Transaksi
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/forms/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Up Saldo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/advanced.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pembelian</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- transaksi end -->

        <!-- user starts -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Master User
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="master_user.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- end user -->

        <!-- start logout -->
        <li class="nav-item">
          <a href="backend/logout.php" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>
              Logout
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>
        <!-- end logout -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
