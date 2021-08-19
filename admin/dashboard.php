<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <?php include 'asset/css.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

   <!-- navbar start -->
  <?php include 'asset/navbar.php'; ?>
  <!-- navbar end -->

  <!-- navbar start -->
  <?php include 'asset/sidebar.php'; ?>
  <!-- end navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pendapatan</span>
                <?php $query = $mysqli->query("SELECT SUM(total_bayar) as total FROM tb_pembayaran WHERE status='1'"); ?>
                <?php $totBayar = $query->fetch_object(); ?>
                <span class="info-box-number">
                  Rp. <?= number_format($totBayar->total); ?>;
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-history"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">History Transaksi</span>
                <?php $query = $mysqli->query("SELECT COUNT(id_transaksi) as total FROM tb_transaksi"); ?>
                <?php $totTransaksi = $query->fetch_object(); ?>
                <span class="info-box-number"><?= $totTransaksi->total; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cubes"></i></span>

              <div class="info-box-content">
                <?php $query = $mysqli->query("SELECT COUNT(id_produk) as total FROM tb_produk WHERE status='0'"); ?>
                <?php $totProduk = $query->fetch_object(); ?>
                <span class="info-box-text">Produk</span>
                <span class="info-box-number"><?= $totProduk->total; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <?php $query = $mysqli->query("SELECT COUNT(id_user) as total FROM tb_user WHERE roles='1'"); ?>
                <?php $totUser = $query->fetch_object(); ?>
                <span class="info-box-number"><?= $totUser->total; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'asset/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include "asset/js.php" ?>
</body>
</html>
