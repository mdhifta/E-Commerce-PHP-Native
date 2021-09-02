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

            <!-- BAR CHART -->
            <div class="card card-success col-12 lg-12">
              <div class="card-header">
                <h3 class="card-title">Grafik Barang Terlaris</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <!-- chart -->
                <div class="chart">
                  <canvas id="myChart"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- BAR CHART -->
            <div class="card card-success col-12 lg-12">
              <div class="card-header">
                <h3 class="card-title">Grafik Costumer Aktif</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <!-- chart -->
                <div class="chart">
                  <canvas id="myCostumer"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- logic penjualan cart -->
            <?php
            $produk_cart = $mysqli->query("SELECT * FROM tb_produk");
            while ($myproduct = $produk_cart->fetch_object()) {
              $getName[] = $myproduct->nama_produk;

              $myJumlah = $mysqli->query("SELECT SUM(banyak) AS jumlah FROM tb_dt_transaksi WHERE id_produk='$myproduct->id_produk'");
              $setJumlah = $myJumlah->fetch_object();
              $getJumlah[] = $setJumlah->jumlah;
            }
            ?>
            <!-- end logic -->

            <!-- logic user beli -->
            <?php
            $mycostumer = $mysqli->query("SELECT * FROM tb_user WHERE roles='1'");
            while ($auser = $mycostumer->fetch_object()) {
              $getUser[] = $auser->fname;

              $myTransaksi = $mysqli->query("SELECT SUM(banyak) AS jumlah FROM tb_transaksi as tbt JOIN tb_dt_transaksi as tdt ON tdt.id_transaksi=tbt.id_transaksi WHERE tbt.id_user='$auser->id_user'");
              $aJumlah = $myTransaksi->fetch_object();
              $userJumlah[] = $aJumlah->jumlah;
            }
            ?>
            <!-- end logic -->
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

  <!-- interaksi chart -->
  <script type="text/javascript">
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($getName); ?>,
      datasets: [{
        label: 'Grafik Barang Terlaris',
        data: <?php echo json_encode($getJumlah); ?>,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255,99,132,1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>

<script type="text/javascript">
var ctx = document.getElementById("myCostumer").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($getUser); ?>,
    datasets: [{
      label: 'Grafik Costumer Pembelian',
      data: <?php echo json_encode($userJumlah); ?>,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgba(255,99,132,1)',
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }]
    }
  }
});
</script>
<!-- end interaksi -->
</body>
</html>
