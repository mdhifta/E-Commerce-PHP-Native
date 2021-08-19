<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Gift</title>
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
              <h1 class="m-0">Master Gift</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master Gift</li>
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

            <?php if (isset($_GET['verify'])): ?>
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <?php if ($_GET['verify']==1): ?>
                    <div class="card-header">
                      <h3 class="card-title">Voucher Form</h3>
                    </div>

                    <form action="backend/masterGift/giftVoucher.php" method="post">
                      <div class="card-body">
                        <div class="form-group">
                          <?php if (isset($_GET['alert'])): ?>
                            <?php if ($_GET['alert']==1): ?>
                              <div class="alert alert-success" role="alert">
                                Sukses Memberikan Voucher
                              </div>
                            <?php else: ?>
                              <div class="alert alert-danger" role="alert">
                                Gagal Memberikan Voucher
                              </div>
                            <?php endif; ?>
                          <?php endif; ?>
                          <label for="exampleInputEmail1">Voucher</label>
                          <?php $query = $mysqli->query("SELECT * FROM tb_kupon WHERE status='0'"); ?>
                          <select class="form-control" name="id_kupon">
                            <?php while ($value = $query->fetch_object()) { ?>
                              <option value="<?= $value->id_kupon; ?>"><?= $value->nama_kupon; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Pilih Pengguna</label>
                          <select class="form-control select2" name="id_user">
                            <option value="all">Semua Pengguna</option>
                            <?php $query = $mysqli->query("SELECT * FROM tb_user WHERE roles='1'"); ?>
                            <?php while ($value = $query->fetch_object()) { ?>
                              <option value="<?= $value->id_user; ?>"><?= $value->fname; ?> <?= $value->lname; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Diskon Voucher</button>
                      </div>
                    </form>
                  <?php else: ?>
                    <div class="card-header">
                      <h3 class="card-title">Diskon Form</h3>
                    </div>

                    <form action="backend/masterGift/giftDiskon.php" method="post">
                      <div class="card-body">
                        <div class="form-group">
                          <?php if (isset($_GET['alert'])): ?>
                            <?php if ($_GET['alert']==1): ?>
                              <div class="alert alert-success" role="alert">
                                Sukses Memberikan Diskon
                              </div>
                            <?php else: ?>
                              <div class="alert alert-danger" role="alert">
                                Gagal Memberikan Diskon
                              </div>
                            <?php endif; ?>
                          <?php endif; ?>
                          <label for="exampleInputEmail1">Diskon</label>
                          <?php $query = $mysqli->query("SELECT * FROM tb_diskon WHERE status='0'"); ?>
                          <select class="form-control" name="id_diskon">
                            <?php while ($value = $query->fetch_object()) { ?>
                              <option value="<?= $value->id_diskon; ?>">Rp. <?= number_format($value->total_diskon); ?></option>
                            <?php } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Pilih Produk</label>
                          <select class="form-control select2" name="id_produk">
                            <option value="all">Semua Produk</option>
                            <?php $query = $mysqli->query("SELECT * FROM tb_produk WHERE status='0'"); ?>
                            <?php while ($value = $query->fetch_object()) { ?>
                              <option value="<?= $value->id_produk; ?>"><?= $value->nama_produk; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Gift Diskon</button>
                      </div>
                    </form>
                  <?php endif; ?>
                </div>
                <!-- /.card -->
              </div>
            <?php else: ?>
              <div class="col-12 col-sm-6 col-md-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tags"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Kelola Diskon</span>
                    <span class="info-box-number">
                      <a href="masterGift.php?verify=2">Kelola</a>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-12">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-receipt"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Kelola Voucher</span>
                    <span class="info-box-number"><a href="masterGift.php?verify=1">Kelola</a></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="clearfix hidden-md-up"></div>
            <?php endif; ?>
            <!-- fix for small devices only -->

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
  <?php include 'asset/js.php'; ?>
</body>
</html>
