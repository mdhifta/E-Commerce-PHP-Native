<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chat Costumer</title>
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
              <h1 class="m-0">Chat Costumer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Chat Costumer</li>
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
            <?php $query = $mysqli->query("SELECT * FROM tb_room ORDER BY id_room DESC"); ?>
            <?php while ($value = $query->fetch_object()) { ?>
              <div class="col-12 col-sm-6 col-md-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><a href="chatRoom.php?id=<?= $value->id_room; ?>"><i class="fas fa-comment"></i></a></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><a style="color:#000000;" href="chatRoom.php?id=<?= $value->id_room; ?>"><?= $value->nama_room; ?></a></span>
                    <span class="info-box-number">
                      <a href="chatRoom.php?id=<?= $value->id_room; ?>">Balas</a>
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
