<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Komentar</title>
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
              <h1 class="m-0">Master Komentar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master Komentar</li>
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
            <?php $query = $mysqli->query("SELECT * FROM tb_komentar as tbk JOIN tb_user as tbu ON tbu.id_user=tbk.id_user JOIN tb_produk as tbp ON tbp.id_produk=tbk.id_produk ORDER BY tbk.id_komentar DESC"); ?>
            <?php while ($value = $query->fetch_object()) { ?>
              <div class="col-12 col-sm-6 col-md-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><a href="#.php?id=<?= $value->id_produk; ?>"><i class="fas fa-comment"></i></a></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><a style="color:#000000;" href="#.php?id=<?= $value->id_produk; ?>"><b><?= $value->fname; ?> <?= $value->lname; ?></b> : <?= $value->komentar; ?></a></span>
                    <span class="info-box-text">
                      Komentar pada produk <a href="#.php?id=<?= $value->id_produk; ?>"><?= $value->nama_produk; ?></a>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            <?php } ?>
            <div class="clearfix hidden-md-up"></div>
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
