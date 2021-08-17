<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master User</title>
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
              <h1 class="m-0">Master User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master User</li>
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
                  <h3 class="card-title">List User</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Costumer</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Saldo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $query = $mysqli->query("SELECT * FROM tb_user WHERE roles='1'"); ?>
                      <?php while ($value = $query->fetch_object()) { ?>
                      <tr>
                        <td><?= $value->fname ?> <?= $value->lname; ?></td>
                        <td><?= $value->email; ?></td>
                        <td><?= $value->telephone; ?></td>
                        <td>Rp. <?= number_format($value->saldo); ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nama Costumer</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Saldo</th>
                      </tr>
                    </tfoot>
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
