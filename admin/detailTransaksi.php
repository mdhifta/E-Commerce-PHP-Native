<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<?php $query = $mysqli->query("SELECT tbr.*, tbp.status, tbu.fname, tbu.lname, tbu.telephone, tbu.email FROM tb_transaksi as tbr JOIN tb_pembayaran as tbp ON tbp.id_transaksi=tbr.id_transaksi JOIN tb_user as tbu ON tbu.id_user=tbr.id_user WHERE tbr.id_transaksi='$_GET[id]'"); ?>
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
              <h1 class="m-0">Detail Transaksi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Detail Transaksi</li>
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
                  <h3 class="card-title">Detail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Costumer</th>
                        <th>Total Transaksi</th>
                        <th>Jasa Kirim</th>
                        <th>No Hp/Email</th>
                        <th>Tanggal Pesan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?= $value->fname ?> <?= $value->lname; ?></td>
                        <td>Rp. <?= number_format($value->total_transaksi); ?>;-</td>
                        <td><?= $value->jasa_pengiriman; ?></td>
                        <td><?= $value->telephone; ?>/<?= $value->email; ?></td>
                        <td><?= date("d F Y", strtotime($value->tanggal_transaksi)); ?></td>
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


                      <?php $detail_produk = $mysqli->query("SELECT * FROM tb_dt_transaksi as tbd JOIN tb_produk as tbp ON tbp.id_produk=tbd.id_produk JOIN tb_warna as tbw ON tbw.id_warna=tbd.id_warna JOIN tb_ukuran as tbu ON tbu.id_ukuran=tbd.id_ukuran WHERE tbd.id_transaksi='$_GET[id]'"); ?>
                      <tr>
                        <th scope="row">Produk </th>
                        <td colspan="5">
                          <?php while ($produk = $detail_produk->fetch_object()) {
                            echo "<b>(".$produk->nama_produk." - ".$produk->jenis_ukuran." - ".$produk->jenis_warna." - ".$produk->banyak."/pcs)</b> ";
                          } ?>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">Pengiriman </th>
                        <td colspan="5">
                          <h5><?= $value->jasa_pengiriman; ?> - <?= $value->durasi_ongkir; ?></h5>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">Nama Penerima </th>
                        <td colspan="5">
                          <h5><?= $value->nama_penerima; ?></h5>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">Provinsi/Kota </th>
                        <td colspan="5">
                          <h5><?= $value->provinsi_kirim; ?>/<?= $value->kota_kirim; ?></h5>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">Alamat Kirim </th>
                        <td colspan="5">
                          <h5><?= $value->alamat_kirim; ?></h5>
                        </td>
                      </tr>

                      <?php if ($value->status==1): ?>
                        <tr>
                          <th scope="row">Nomor Resi </th>
                          <td colspan="5">
                            <?php if ($value->no_resi==null): ?>
                              <a href="addResi.php?id=<?= $value->id_transaksi; ?>" class="btn btn-primary">Tambah Nomor Resi</a>
                            <?php else: ?>
                              <h5><?= $value->no_resi; ?></h5>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif; ?>

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
