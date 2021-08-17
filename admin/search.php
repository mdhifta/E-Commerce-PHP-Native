<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Produk</title>
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
              <h1 class="m-0">Master Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master Produk</li>
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
                  <h3 class="card-title">List Produk</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga Produk</th>
                        <th>Berat</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 0; ?>
                      <?php $query = $mysqli->query("SELECT * FROM tb_produk as tbp JOIN tb_kategori as tbk ON tbk.id_kategori=tbp.id_kategori WHERE tbp.status='0' AND tbp.nama_produk LIKE '%$_POST[search]%'"); ?>
                      <?php while ($value = $query->fetch_object()) { ?>
                      <tr>
                        <td><?= $no+=1; ?></td>
                        <td><?= $value->nama_produk; ?></td>
                        <td><?= $value->stok; ?></td>
                        <td>Rp. <?= number_format($value->harga_produk); ?>;-</td>
                        <td><?= $value->berat_produk; ?> (gram)</td>
                        <td><?= $value->jenis_kategori; ?></td>
                        <td>
                          <a href="detailProduk.php?id=<?= $value->id_produk; ?>" class="btn btn-info">Detail</a>
                          <a href="addProduk.php?id=<?= $value->id_produk; ?>" class="btn btn-primary">Edit</a>
                          <a href="backend/produk/deleteProduk.php?id=<?= $value->id_produk; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
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
