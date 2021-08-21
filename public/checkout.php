<?php session_start(); include '../config/config.php'; ?>

<?php if (isset($_SESSION['mykupon'])): ?>
  <?php $query_kupon = $mysqli->query("SELECT * FROM tb_get_diskon as tgd JOIN tb_kupon as tbk ON tbk.id_kupon=tgd.id_kupon WHERE tgd.id_get_diskon='$_SESSION[mykupon]'"); ?>
  <?php $kupon = $query_kupon->fetch_object(); ?>
  <?php $potongan = $kupon->total_diskon; ?>
<?php endif; ?>

<!-- design data user input -->
<!DOCTYPE html>
<html class="no-js" lang="en">
<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Checkout</title>
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
          <div class="wrapper"><h1 class="page-width">Checkout</h1></div>
        </div>
      </div>
      <!--End Page Title-->

      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="customer-box customer-coupon">
              <h3 class="font-15 xs-font-13"><i class="anm anm-user-al"></i> please entrie your data</h3>
            </div>
          </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="your-order-payment">
            <div class="your-order">
              <h2 class="order-title mb-4">Your Order</h2>
              <?php if (isset($_GET['failed'])): ?>
                <div class="alert alert-danger" role="alert">
                  Saldo anda tidak mencukupi! <a href="../vendor/midtrans/midtrans-php/examples/snap/checkout-process.php?kupon=1">ingin mencoba membayar via bank *click</a>
                </div>
              <?php endif; ?>
              <div class="table-responsive-sm order-table">
                <table class="bg-white table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th class="text-left">Product Name</th>
                      <th>Price</th>
                      <th>Size</th>
                      <th>color</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($_SESSION['mycart'] as $id_produk => $jumlah){ ?>
                      <?php $query = $mysqli->query("SELECT * FROM tb_produk as tbp JOIN tb_gambar as tbg ON tbg.id_produk=tbp.id_produk WHERE tbp.id_produk='$id_produk'"); ?>
                      <?php $get_data = $query->fetch_object(); ?>
                      <tr>
                        <td class="text-left"><?= $get_data->nama_produk; ?></td>
                        <td>Rp.<?= number_format($get_data->harga_produk); ?>;-</td>

                        <!-- get size -->
                        <?php $id_ukuran = $_SESSION['size'][$id_produk]; ?>
                        <?php $ukuran_query = $mysqli->query("SELECT * FROM tb_ukuran WHERE id_ukuran='$id_ukuran'"); ?>
                        <?php $size_get = $ukuran_query->fetch_object(); ?>
                        <td><?= $size_get->jenis_ukuran; ?></td>

                        <!-- get colors -->
                        <?php $id_warna = $_SESSION['colors'][$id_produk]; ?>
                        <?php $color_query = $mysqli->query("SELECT * FROM tb_warna WHERE id_warna='$id_warna'"); ?>
                        <?php $get_colors = $color_query->fetch_object(); ?>
                        <td><?= $get_colors->jenis_warna; ?></td>

                        <td><?= $jumlah; ?></td>
                        <td>Rp.<?= number_format($get_data->harga_produk*$jumlah); ?>;-</td>
                      </tr>
                    <?php } ?>

                  </tbody>
                  <tfoot class="font-weight-600">
                    <tr>
                      <td colspan="4" class="text-right">Ongkir </td>
                      <td>Rp.<?= number_format($_SESSION['price']); ?>;-</td>
                    </tr>
                    <tr>
                      <td colspan="4" class="text-right">Total</td>
                      <?php if (isset($_SESSION['mykupon'])): ?>

                        <?php if ($kupon->jenis_kupon=='persen'){ ?>
                          <?php $tmp = $_SESSION['price']+$_SESSION['subtotal']; ?>
                          <?= $persen = $tmp*$kupon->total_diskon/100; ?>
                          <td>Rp.<?= number_format($tmp*$jumlah-$persen); ?>;- (Potongan Kupon <?= $potongan ?>%)</td>
                          <?php $_SESSION['harga_baru'] = $tmp*$jumlah-$persen; ?>
                        <?php } else { ?>
                          <td>Rp.<?= number_format($tmp-$potongan); ?>;- (-Diskon Rp.<?= $number_format($potongan); ?>)</td>
                          <?php $_SESSION['harga_baru'] = $tmp-$potongan; ?>
                        <?php } ?>
                      <?php else: ?>
                        <td>Rp.<?= number_format($_SESSION['price']+$_SESSION['subtotal']); ?>;-</td>
                      <?php endif; ?>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <hr/>

            <div class="your-payment">
              <h2 class="payment-title mb-3">address</h2>
              <div class="payment-method">
                <div class="payment-accordion">
                  <div id="accordion" class="payment-section">
                    <label for="">Province</label>
                    <input type="text" readonly value="<?= $_SESSION['getProvince']; ?>">
                  </div>

                  <div id="accordion" class="payment-section">
                    <label for="">City</label>
                    <input type="text" readonly value="<?= $_SESSION['getCity']; ?>">
                  </div>
                </div>

                <form name="myform" action="backend/user/add-pembayaran.php" method="post">
                  <label for="">Address</label>
                  <div id="accordion" class="payment-section">
                    <textarea name="detail_address" rows="8" cols="80" required style="resize:none;" required></textarea>
                  </div>

                  <div id="accordion" class="payment-section">
                    <input type="text" name="costumer_name" required placeholder="Enter your name" required>
                  </div>

                  <div class="order-button-payment">
                    <button class="btn" value="Place order" id="pay-button">Checkout</button>
                  </div>
                </form>
              </div>
            </div>
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
<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->
</html>
<!-- end data user input -->
