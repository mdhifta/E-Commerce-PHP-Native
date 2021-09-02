<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Omset</title>
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
              <h1 class="m-0">Master Omset</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master Omset</li>
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
            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">List Omset</h3>
                </div>

                <div class="card-header">
                  <table>
                    <tr>
                      <form class="" action="../vendor/laporan/laporan.php" method="post">
                        <td><input type="date" class="form-control" name="awal"></td>
                        <td>- sampai -</td>
                        <td><input type="date" class="form-control" name="akhir"></td>
                        <td><button class="btn btn-primary">Cetak</button></td>
                      </form>
                    </tr>
                  </table>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Costumer</th>
                        <th>Nama Produk</th>
                        <th>Banyak</th>
                        <th>Total</th>
                        <th>Tanggal Pesan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 0; $total = 0; ?>
                      <?php $query = $mysqli->query("SELECT tbu.fname, tbu.lname, tbt.*, tdt.banyak, tbpr.harga_produk, tbp.status, tbpr.nama_produk FROM tb_transaksi as tbt JOIN tb_user as tbu ON tbu.id_user=tbt.id_user JOIN tb_pembayaran as tbp ON tbp.id_transaksi=tbt.id_transaksi JOIN tb_dt_transaksi as tdt ON tdt.id_transaksi=tbt.id_transaksi JOIN tb_produk as tbpr ON tbpr.id_produk=tdt.id_produk WHERE tbp.status='1'"); ?>
                      <?php while ($value = $query->fetch_object()) { ?>
                        <tr>
                          <td><?= $no+=1; ?></td>
                          <td><?= $value->fname ?> <?= $value->lname; ?></td>
                          <td><?= $value->nama_produk; ?></td>
                          <td><?= $value->banyak; ?></td>
                          <td>Rp. <?= number_format($value->harga_produk*$value->banyak); ?>;-</td>
                          <td><?= date("d F Y", strtotime($value->tanggal_transaksi)); ?></td>
                        </tr>

                        <?php $total = $total+$value->harga_produk*$value->banyak; ?>
                      <?php } ?>
                    </tbody>
                    <tr>
                      <td colspan="4"><b>TOTAL</b></td>
                      <td colspan="2"><b>Rp. <?= number_format($total); ?>;-</b></td>
                    </tr>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
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
