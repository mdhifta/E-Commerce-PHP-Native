<?php
session_start();
include '../config/config.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/cart-variant1.html   11 Nov 2019 12:44:31 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Order List</title>
  <meta name="description" content="description">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'asset/css.php'; ?>
</head>
<body class="page-template belle cart-variant1">
  <div class="pageWrapper">

    <?php include 'asset/topbar.php'; ?>

    <?php include 'asset/navbar.php'; ?>

    <?php include 'asset/mobile.php'; ?>

    <!--Body Content-->
    <div id="page-content">
      <!--Page Title-->
      <div class="page section-header text-center">
        <div class="page-title">
          <div class="wrapper"><h1 class="page-width">Order Transaction</h1></div>
        </div>
      </div>
      <!--End Page Title-->

      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
            <form action="#" method="post" class="cart style2">
              <table>
                <thead class="cart__row cart__header">
                  <tr>
                    <th class="text-center">Kode Transaksi</th>
                    <th class="text-center">Total Bayar</th>
                    <th class="text-center">Nomor Resi</th>
                    <th class="text-center">Jasa Kirim</th>
                    <th class="text-center">Lama Kirim</th>
                    <th class="text-center">Alamat Kirim</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $query = $mysqli->query("SELECT * FROM tb_transaksi as tbt JOIN tb_pembayaran as tbp ON tbp.id_transaksi=tbt.id_transaksi WHERE tbt.id_user='$_SESSION[id_costumer]'"); ?>
                  <?php while ($values = $query->fetch_object()) { ?>
                    <tr class="text-right small--hide cart-price">
                      <td class="cart__image-wrapper cart-flex-item">
                        <span><?= $values->no_order; ?></span>
                      </td>
                      <td class="text-right small--hide cart-price">
                        <span class="money">Rp. <?= number_format($values->total_transaksi); ?>;-</span>
                      </td>
                      <td class="text-right small--hide cart-price">
                        <div><span class="money"><?= $values->no_resi; ?></span></div>
                      </td>
                      <td class="text-right small--hide cart-price">
                        <div><span class="money"><?= strtoupper($values->jasa_pengiriman); ?></span></div>
                      </td>
                      <td class="text-right small--hide cart-price">
                        <div><span class="money"><?= $values->durasi_ongkir; ?></span></div>
                      </td>
                      <td class="text-right small--hide cart-price">
                        <div><span class="money"><?= $values->alamat_kirim; ?></span></div>
                      </td>
                      <td class="text-right small--hide cart-price">
                        <?php if ($values->status==0){ ?>
                          <div><h5 class="money"><span class="badge badge-primary">DIPROSES</span></h5></div>
                        <?php } elseif($values->status==1) { ?>
                          <div><h5 class="money"><span class="badge badge-success">TERBAYAR</span></h5></div>
                        <?php } elseif ($values->status==2) { ?>
                          <div><h5 class="money"><span class="badge badge-danger">EXPIRED</span></h5></div>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </form>
          </div>

        </div>
      </div>

    </div>
    <!--End Body Content-->

    <?php include 'asset/footer.php'; ?>
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->

    <?php include 'asset/js.php'; ?>
  </div>
</body>

<!-- belle/cart-variant1.html   11 Nov 2019 12:44:32 GMT -->
</html>
