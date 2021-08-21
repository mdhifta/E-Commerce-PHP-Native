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
  <title>My Cart</title>
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
          <div class="wrapper"><h1 class="page-width">Shopping Cart</h1></div>
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
                    <th colspan="2" class="text-center">Product</th>
                    <th class="text-center">Color</th>
                    <th class="text-center">Size</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-right">Total</th>
                    <th class="action">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $total = 0; ?>
                  <?php if (isset($_SESSION['mycart'])): ?>
                    <?php foreach($_SESSION['mycart'] as $id_produk => $jumlah): ?>
                      <?php $query = $mysqli->query("SELECT * FROM tb_produk as tbp JOIN tb_gambar as tbg ON tbg.id_produk=tbp.id_produk WHERE tbp.id_produk='$id_produk'"); ?>
                      <?php $get_data = $query->fetch_object(); ?>
                      <tr class="cart__row border-bottom line1 cart-flex border-top">
                        <td class="cart__image-wrapper cart-flex-item">
                          <a href="#"><img class="cart__image" src="../vendor/product_img/<?= $get_data->filename; ?>" alt="gambar produk"></a>
                        </td>
                        <td class="cart__meta small--text-left cart-flex-item">
                          <div class="list-view-item__title">
                            <a href="#"><?= $get_data->nama_produk; ?></a>
                          </div>
                        </td>

                        <?php $id_warna = $_SESSION['colors'][$id_produk]; ?>
                        <?php $color_query = $mysqli->query("SELECT * FROM tb_warna WHERE id_warna='$id_warna'"); ?>
                        <?php $get_colors = $color_query->fetch_object(); ?>
                        <td class="cart__price-wrapper cart-flex-item">
                          <div class="list-view-item__title">
                            <a href="#"><?= $get_colors->jenis_warna; ?></a>
                          </div>
                        </td>

                        <?php $id_size = $_SESSION['size'][$id_produk]; ?>
                        <?php $size_query = $mysqli->query("SELECT * FROM tb_ukuran WHERE id_ukuran='$id_size'"); ?>
                        <?php $get_size = $size_query->fetch_object(); ?>
                        <td class="cart__price-wrapper cart-flex-item">
                          <div class="list-view-item__title">
                            <a href="#"><?= $get_size->jenis_ukuran; ?></a>
                          </div>
                        </td>

                        <?php $diskon = $mysqli->query("SELECT * FROM tb_dt_diskon as tdd JOIN tb_diskon as tbd ON tbd.id_diskon=tdd.id_diskon WHERE tdd.id_produk='$get_data->id_produk'"); ?>
                        <?php $getDiskon = $diskon->fetch_object(); ?>

                        <?php if ($getDiskon!=''): ?>
                          <?php $totalHarga = $get_data->harga_produk-$getDiskon->total_diskon; ?>
                        <?php else: ?>
                          <?php $totalHarga = $get_data->harga_produk; ?>
                        <?php endif; ?>

                        <td class="cart__price-wrapper cart-flex-item">
                          <span class="money">Rp.<?= number_format($totalHarga); ?>;-</span>
                        </td>
                        <td class="cart__update-wrapper cart-flex-item text-right">
                          <div class="cart__qty text-center">
                            <div class="qtyField">
                              <a class="qtyBtn minus" href="backend/cart/removeCart.php?id=<?= $get_data->id_produk; ?>"><i class="icon icon-minus"></i></a>
                              <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="<?= $jumlah; ?>" pattern="[0-9]*">
                              <a class="qtyBtn plus" href="backend/cart/addCart.php?id=<?= $get_data->id_produk; ?>"><i class="icon icon-plus"></i></a>
                            </div>
                          </div>
                        </td>
                        <td class="text-right small--hide cart-price">
                          <div><span class="money">Rp.<?= number_format($totalHarga*$jumlah); ?></span></div>
                        </td>
                        <td class="text-center small--hide"><a href="backend/cart/clearCart.php?id=<?= $get_data->id_produk; ?>" class="btn btn--secondary cart__remove" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a></td>
                      </tr>
                      <?php $total = $total + $totalHarga * $jumlah; ?>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="6"></td>
                    </tr>
                  <?php endif; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3" class="text-left"><a href="produk.php" class="btn btn-secondary btn--small cart-continue">Continue shopping</a></td>
                  </tr>
                </tfoot>
              </table>
            </form>
          </div>

          <?php if (isset($_SESSION['id_costumer'])): ?>
            <?php $_SESSION['subtotal'] = $total; ?>
            <div class="container mt-4">
              <div class="row">

                <?php include 'asset/select-ongkir.php'; ?>

                <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer" id="price_ongkir"></div>

              </div>
            </div>
          <?php endif; ?>
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
