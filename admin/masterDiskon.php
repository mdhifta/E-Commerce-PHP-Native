<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Diskon</title>
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
              <h1 class="m-0">Master Diskon</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master Diskon</li>
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

            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Diskon Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php if (isset($_GET['id'])): ?>
                  <?php
                  $query = $mysqli->query("SELECT * FROM tb_diskon WHERE id_diskon='$_GET[id]'");
                  $value = $query->fetch_object();
                  ?>
                  <form action="backend/diskon/editDiskon.php" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Total Diskon</label>
                        <input type="number" name="total_diskon" class="form-control" id="exampleInputEmail1" value="<?= $value->total_diskon; ?>" placeholder="Banyak Diskon" required>
                      </div>
                      <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Batas Awal Berlaku</label>
                        <input type="date" class="form-control" name="tanggal_awal" value="<?= $value->tanggal_awal; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Batas Masa Berlaku</label>
                        <input type="date" class="form-control" name="tanggal_akhir" value="<?= $value->tanggal_akhir; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <textarea name="deskripsi" class="form-control" rows="2" cols="80" style="resize:none;" value="<?= $value->deskripsi; ?>" placeholder="Keterangan Voucher" required><?= $value->deskripsi; ?></textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                  </form>
                <?php else: ?>
                  <form action="backend/diskon/addDiskon.php" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <?php if (isset($_GET['alert'])): ?>
                          <div class="alert alert-danger" role="alert">
                            Gagal Menambah/Mengubah Voucher
                          </div>
                        <?php endif; ?>
                        <label for="exampleInputEmail1">Total Diskon</label>
                        <input type="number" name="total_diskon" class="form-control" id="exampleInputEmail1" placeholder="Banyak Diskon" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Batas Awal Berlaku</label>
                        <input type="date" class="form-control" name="tanggal_awal" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Batas Masa Berlaku</label>
                        <input type="date" class="form-control" name="tanggal_akhir" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <textarea name="deskripsi" class="form-control" rows="2" cols="80" style="resize:none;" placeholder="Keterangan Voucher" required></textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                <?php endif; ?>
              </div>
              <!-- /.card -->
            </div>

            <!-- tabel start -->
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">List Voucher</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Kupon</th>
                        <th>Total Diskon</th>
                        <th>Batas Awal</th>
                        <th>Batas Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 0; ?>
                      <?php $query = $mysqli->query("SELECT * FROM tb_diskon WHERE status='0'"); ?>
                      <?php while ($value = $query->fetch_object()) { ?>
                        <tr>
                          <td><b>DISKON</b></td>
                          <td>Rp. <?= number_format($value->total_diskon); ?>;-</td>
                          <td><?= date("d F Y", strtotime($value->tanggal_awal)); ?></td>
                          <td><?= date("d F Y", strtotime($value->tanggal_akhir)); ?></td>
                          <?php if ($value->status==1): ?>
                            <td>Hangus</td>
                          <?php else: ?>
                            <td>Berlaku</td>
                          <?php endif; ?>
                          <td>
                            <a href="masterDiskon.php?id=<?= $value->id_diskon; ?>" class="btn btn-info">Edit</a>
                            <a href="backend/diskon/deleteDiskon.php?id=<?= $value->id_diskon; ?>" class="btn btn-danger">Hapus</a>
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
            <!-- tabel end -->

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
