<?php
session_start();
include '../config/config.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/shop-grid-6.html   11 Nov 2019 12:39:07 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Produk List</title>
  <meta name="description" content="description">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'asset/css.php'; ?>
</head>
<body class="template-collection belle">
  <div class="pageWrapper">
    <?php include 'asset/topbar.php'; ?>

    <?php include 'asset/navbar.php'; ?>

    <?php include 'asset/mobile.php'; ?>

    <!--Body Content-->
    <div id="page-content">
      <!--Collection Banner-->
      <div class="collection-header">
        <div class="collection-hero">
          <div class="collection-hero__image"><img class="blur-up lazyload" data-src="../vendor/assets/images/cat-men.jpg" src="../vendor/assets/images/cat-men.jpg" alt="Men" title="Men" /></div>
          <div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Shop Product list</h1></div>
        </div>
      </div>
      <!--End Collection Banner-->

      <div class="container">
        <div class="row">
          <!--Main Content-->
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col shop-grid-6">
            <div class="productList">
              <div class="grid-products grid--view-items">
                <div class="row">
                  <?php if (isset($_POST['search'])){
                    $query = $mysqli->query("SELECT * FROM tb_produk WHERE status='0' AND nama_produk LIKE '%$_POST[search]%'");
                  } elseif (isset($_GET['id'])) {
                    $query = $mysqli->query("SELECT * FROM tb_produk WHERE status='0' AND id_kategori='$_GET[id]'");
                  } else {
                    header("Location:produk.php");
                  } ?>
                  <?php while ($value = $query->fetch_object()) { ?>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 item">
                      <!-- start product image -->
                      <div class="product-image">
                        <!-- start product image -->
                        <a href="#">
                          <?php $img = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk=".$value->id_produk); ?>
                          <?php while ($slide = $img->fetch_object()) { ?>
                            <!-- image -->
                            <img class="primary blur-up lazyload" data-src="../vendor/product_img/<?= $slide->filename; ?>" src="../vendor/product_img/<?= $slide->filename; ?>" alt="image" title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload" data-src="../vendor/product_img/<?= $slide->filename; ?>" src="../vendor/product_img/<?= $slide->filename; ?>" alt="image" title="product">
                            <!-- End hover image -->
                          <?php } ?>
                        </a>
                        <!-- end product image -->
                        <!-- Start product button -->
                        <form class="variants add" action="detail.php" method="get">
                          <input type="hidden" name="id" value="<?= $value->id_produk; ?>">
                          <button class="btn btn-addto-cart" type="submit">Add To Cart</button>
                        </form>
                        <div class="button-set">
                          <a href="" title="Quick View" class="quick-view-popup quick-view" id="<?= $value->id_produk; ?>" onclick="getView(this)" data-toggle="modal" data-target="#content_quickview">
                            <i class="icon anm anm-search-plus-r"></i>
                          </a>
                        </div>
                        <!-- end product button -->
                      </div>
                      <!-- end product image -->

                      <!--start product details -->
                      <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                          <a href="#"><?= $value->nama_produk; ?></a>
                        </div>
                        <!-- End product name -->
                        <?php $diskon = $mysqli->query("SELECT * FROM tb_dt_diskon as tdd JOIN tb_diskon as tbd ON tbd.id_diskon=tdd.id_diskon WHERE tdd.id_produk='$value->id_produk'"); ?>
                        <?php $getDiskon = $diskon->fetch_object(); ?>
                        <!-- product price -->
                        <div class="product-price">
                          <?php if ($getDiskon!=''): ?>
                            <span class="old-price">Rp. <?= number_format($value->harga_produk); ?></span>
                            <span class="price">Rp. <?= number_format($value->harga_produk-$getDiskon->total_diskon); ?></span>
                          <?php else: ?>
                            <span class="price">Rp. <?= number_format($value->harga_produk); ?></span>
                          <?php endif; ?>
                        </div>
                        <!-- End product price -->
                      </div>
                      <!-- End product details -->
                    </div>
                  <?php } ?>

                </div>
              </div>
            </div>
            <div class="infinitpaginOuter">
              <div class="infinitpagin">
                <a href="#" class="btn loadMore">Load More</a>
              </div>
            </div>
          </div>
          <!--End Main Content-->
        </div>
      </div>

    </div>
    <!--End Body Content-->

    <?php include 'asset/footer.php'; ?>
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    <div class="modal fade quick-view-popup" id="content_quickview"></div>
    <script src="../vendor/assets/js/jquery-2.2.4.min.js"></script>

    <?php include 'asset/js.php'; ?>
  </div>
  <script type="text/javascript" language="javascript">
  function getView($this){
    var get_id = $this.id;
    $.ajax({
      type : 'POST',
      url : 'backend/select/viewProduk.php',
      data :  'id=' + get_id,
      success: function (data) {
        $("#content_quickview").html(data);
        $("#content_quickview").niceSelect('update');
      }
    });
  }
  </script>
</body>

<!-- belle/shop-grid-6.html   11 Nov 2019 12:41:01 GMT -->
</html>
