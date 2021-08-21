<?php session_start(); include '../config/config.php'; ?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/cart.html   11 Nov 2019 12:47:01 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Top up</title>
  <meta name="description" content="description">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php include 'asset/css.php'; ?>
</head>
<body class="page-template belle">
  <div class="pageWrapper">

    <?php include 'asset/topbar.php'; ?>

    <?php include 'asset/navbar.php'; ?>

    <?php include 'asset/mobile.php'; ?>
    <!--Body Content-->
    <div id="page-content">
      <!--Page Title-->
      <div class="page section-header text-center">
        <div class="page-title">
          <div class="wrapper"><h1 class="page-width">Your saldo</h1></div>
        </div>
      </div>
      <!--End Page Title-->

      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
              <table>
                <thead class="cart__row cart__header">
                  <tr>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">bank</th>
                    <th class="text-center">nomor virtual</th>
                    <th class="text-center">status</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $query = $mysqli->query("SELECT * FROM tb_topup WHERE id_user='$_SESSION[id_costumer]'"); ?>
                  <?php while ($values = $query->fetch_object()) { ?>
                    <tr class="cart__row border-bottom line1 cart-flex border-top">
                      <td class="cart__image-wrapper text-center cart-flex-item">
                        <a href="#"><?= date("d F Y", strtotime($values->tanggal_topup)); ?></a>
                      </td>
                      <td class="cart__meta small--text-left text-center cart-flex-item">
                        <div class="list-view-item__title">
                          <a href="#">Rp.<?= number_format($values->total_topup); ?>;-</a>
                        </div>
                      </td>
                      <td class="cart__price-wrapper text-center cart-flex-item">
                        <span class="money"><?= strtoupper($values->bank); ?></span>
                      </td>
                      <td class="cart__price-wrapper text-center cart-flex-item">
                        <div class="list-view-item__title">
                          <a href="#"><?= $values->no_virtual; ?></a>
                        </div>
                      </td>
                      <td class="small--hide text-center cart-price">
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

              <hr>

            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
              <div class="solid-border">
                <div class="row">
                  <span class="col-12 col-sm-6 cart__subtotal-title"><strong>top up </strong></span>
                </div>
                <div class="cart__shipping">Isi saldo anda segera dan nikmati pembayaran dengan mudah</div>

                <form class="" action="../vendor/midtrans/midtrans-php/examples/snap/checkout-process-topup.php" method="post">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="50000" name="saldo" id="flexRadioDefault1">
                    <h5 class="form-check-label" for="flexRadioDefault1">
                      Top Up saldo sebesar Rp. 50,000;-
                    </h5>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="100000" name="saldo" id="flexRadioDefault2" checked>
                    <h5 class="form-check-label" for="flexRadioDefault2">
                      Top Up saldo sebesar Rp. 100,000;-
                    </h5>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="150000" name="saldo" id="flexRadioDefault2">
                    <h5 class="form-check-label" for="flexRadioDefault2">
                      Top Up saldo sebesar Rp. 150,000;-
                    </h5>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="200000" name="saldo" id="flexRadioDefault2">
                    <h5 class="form-check-label" for="flexRadioDefault2">
                      Top Up saldo sebesar Rp. 200,000;-
                    </h5>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="300000" name="saldo" id="flexRadioDefault2">
                    <h5 class="form-check-label" for="flexRadioDefault2">
                      Top Up saldo sebesar Rp. 300,000;-
                    </h5>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="500000" name="saldo" id="flexRadioDefault2">
                    <h5 class="form-check-label" for="flexRadioDefault2">
                      Top Up saldo sebesar Rp. 500,000;-
                    </h5>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="700000" name="saldo" id="flexRadioDefault2">
                    <h5 class="form-check-label" for="flexRadioDefault2">
                      Top Up saldo sebesar Rp. 700,000;-
                    </h5>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="1000000" name="saldo" id="flexRadioDefault2">
                    <h5 class="form-check-label" for="flexRadioDefault2">
                      Top Up saldo sebesar Rp. 1.000,000;-
                    </h5>
                  </div>
                  <br>
                  <center>
                    <button type="submit" class="btn btn--small-wide">top up</button>
                  </center>
                </form>
              </div>

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

  <!-- belle/cart.html   11 Nov 2019 12:47:01 GMT -->
  </html>
