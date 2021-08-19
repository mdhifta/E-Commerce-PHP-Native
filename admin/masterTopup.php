<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Topup</title>
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
              <h1 class="m-0">Master Topup</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master Topup</li>
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
                  <h3 class="card-title">List Topup</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Costumer</th>
                        <th>Total Topup</th>
                        <th>Tanggal Topup</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 0; ?>
                      <?php $query = $mysqli->query("SELECT tbu.fname, tbu.lname, tbt.* FROM tb_user as tbu JOIN tb_topup as tbt ON tbt.id_user=tbu.id_user"); ?>
                      <?php while ($value = $query->fetch_object()) { ?>
                      <tr>
                        <td><?= $no+=1; ?></td>
                        <td><?= $value->fname ?> <?= $value->lname; ?></td>
                        <td>Rp. <?= number_format($value->total_topup); ?>;-</td>
                        <td><?= date("d F Y", strtotime($value->tanggal_topup)); ?></td>
                        <td>
                          <?php if ($value->status==0){ ?>
                            <h3><span class="badge badge-primary">Diproses</span></h3>
                          <?php } elseif ($value->status==1) { ?>
                            <h3><span class="badge badge-success">Terbayar</span></h3>
                          <?php } else { ?>
                            <h3><span class="badge badge-danger">Expired</span></h3>
                          <?php } ?>

                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
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
