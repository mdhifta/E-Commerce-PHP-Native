<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<?php $query = $mysqli->query("SELECT * FROM tb_produk as tbp JOIN tb_kategori as tbk ON tbk.id_kategori=tbp.id_kategori WHERE tbp.id_produk='$_GET[id]'"); ?>
<?php $value = $query->fetch_object(); ?>

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
              <h1 class="m-0"><?= $value->nama_produk; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $value->nama_produk; ?></li>
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
                  <h3 class="card-title"><?= $value->nama_produk; ?> Detail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga Produk</th>
                        <th>Berat</th>
                        <th>Kategori</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?= $value->nama_produk; ?></td>
                        <td><?= $value->stok; ?></td>
                        <td>Rp. <?= number_format($value->harga_produk); ?>;-</td>
                        <td><?= $value->berat_produk; ?> (gram)</td>
                        <td><?= $value->jenis_kategori; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Keterangan </th>
                        <td colspan="4">
                          <?= $value->deskripsi_produk; ?>
                        </td>
                      </tr>

                      <?php $colors = $mysqli->query("SELECT * FROM tb_warna WHERE id_produk='$_GET[id]'"); ?>
                      <tr>
                        <th scope="row">Warna </th>
                        <td colspan="4">
                          <?php while ($value = $colors->fetch_object()) {
                            echo "(".$value->jenis_warna.")";
                          } ?>
                        </td>
                      </tr>

                    <?php $size = $mysqli->query("SELECT * FROM tb_ukuran WHERE id_produk='$_GET[id]'"); ?>
                      <tr>
                        <th scope="row">Ukuran </th>
                        <td colspan="4">
                          <?php while ($value = $size->fetch_object()) {
                            echo "(".$value->jenis_ukuran.")";
                          } ?>
                        </td>
                      </tr>


                      <?php $size = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk='$_GET[id]'"); ?>
                        <tr>
                          <th scope="row">Gambar </th>
                          <td colspan="4">
                            <?php while ($value = $size->fetch_object()) {
                              echo '<img src="../vendor/product_img/'.$value->filename.'" alt="" width="100"> ';
                            } ?>
                          </td>
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
