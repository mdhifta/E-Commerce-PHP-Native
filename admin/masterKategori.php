<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Kategori</title>
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
              <h1 class="m-0">Master Kategori</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master Kategori</li>
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
                  <h3 class="card-title">Kategori Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php if (isset($_GET['id'])): ?>
                  <form action="backend/kategori/editKategori.php" method="post">
                    <?php
                    $query = $mysqli->query("SELECT * FROM tb_kategori WHERE id_kategori='$_GET[id]'");
                    $value = $query->fetch_object();
                     ?>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kategori</label>
                        <input type="text" name="jenis_kategori" class="form-control" id="exampleInputEmail1" value="<?= $value->jenis_kategori; ?>" required>
                        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                  </form>
                <?php else: ?>
                  <form action="backend/kategori/addKategori.php" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <?php if (isset($_GET['alert'])): ?>
                          <div class="alert alert-danger" role="alert">
                            Gagal Menambah/Mengubah Kategori
                          </div>
                        <?php endif; ?>
                        <label for="exampleInputEmail1">Jenis Kategori</label>
                        <input type="text" name="jenis_kategori" class="form-control" id="exampleInputEmail1" placeholder="Jenis Kategori" required>
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
                  <h3 class="card-title">List Kategori</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Jenis Kategori</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 0; ?>
                      <?php $query = $mysqli->query("SELECT * FROM tb_kategori WHERE status='0'"); ?>
                      <?php while ($value = $query->fetch_object()) { ?>
                      <tr>
                        <td><b><?= $value->jenis_kategori; ?></b></td>
                        <td>
                          <a href="masterKategori.php?id=<?= $value->id_kategori; ?>" class="btn btn-info">Edit</a>
                          <a href="backend/kategori/deleteKategori.php?id=<?= $value->id_kategori; ?>" class="btn btn-danger">Hapus</a>
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
