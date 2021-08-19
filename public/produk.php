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

                  <?php $query = $mysqli->query("SELECT * FROM tb_produk WHERE status='0'"); ?>
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
                        <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                          <button class="btn btn-addto-cart" type="button">Add To Cart</button>
                        </form>
                        <div class="button-set">
                          <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
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

                        <!-- product price -->
                        <div class="product-price">
                          <span class="price">Rp.<?= number_format($value->harga_produk); ?>;-</span>
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

    <!--Quick View popup-->
    <div class="modal fade quick-view-popup" id="content_quickview">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div id="ProductSection-product-template" class="product-template__container prstyle1">
              <div class="product-single">
                <!-- Start model close -->
                <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right" title="close"><span class="icon icon anm anm-times-l"></span></a>
                <!-- End model close -->
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="product-details-img">
                      <div class="pl-20">
                        <img src="../vendor/assets/images/product-detail-page/camelia-reversible-big1.jpg" alt="" />
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="product-single__meta">
                      <h2 class="product-single__title">Product Quick View Popup</h2>
                      <div class="prInfoRow">
                        <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                        <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                      </div>
                      <p class="product-single__price product-single__price-product-template">
                        <span class="visually-hidden">Regular price</span>
                        <s id="ComparePrice-product-template"><span class="money">$600.00</span></s>
                        <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                          <span id="ProductPrice-product-template"><span class="money">$500.00</span></span>
                        </span>
                      </p>
                      <div class="product-single__description rte">
                        Belle Multipurpose Bootstrap 4 Html Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion,...
                      </div>

                      <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                        <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                          <div class="product-form__item">
                            <label class="header">Color: <span class="slVariant">Red</span></label>
                            <div data-value="Red" class="swatch-element color red available">
                              <input class="swatchInput" id="swatch-0-red" type="radio" name="option-0" value="Red">
                              <label class="swatchLbl color medium rectangle" for="swatch-0-red" style="background-image:url(../vendor/assets/images/product-detail-page/variant1-1.jpg);" title="Red"></label>
                            </div>
                            <div data-value="Blue" class="swatch-element color blue available">
                              <input class="swatchInput" id="swatch-0-blue" type="radio" name="option-0" value="Blue">
                              <label class="swatchLbl color medium rectangle" for="swatch-0-blue" style="background-image:url(../vendor/assets/images/product-detail-page/variant1-2.jpg);" title="Blue"></label>
                            </div>
                            <div data-value="Green" class="swatch-element color green available">
                              <input class="swatchInput" id="swatch-0-green" type="radio" name="option-0" value="Green">
                              <label class="swatchLbl color medium rectangle" for="swatch-0-green" style="background-image:url(../vendor/assets/images/product-detail-page/variant1-3.jpg);" title="Green"></label>
                            </div>
                            <div data-value="Gray" class="swatch-element color gray available">
                              <input class="swatchInput" id="swatch-0-gray" type="radio" name="option-0" value="Gray">
                              <label class="swatchLbl color medium rectangle" for="swatch-0-gray" style="background-image:url(../vendor/assets/images/product-detail-page/variant1-4.jpg);" title="Gray"></label>
                            </div>
                          </div>
                        </div>
                        <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                          <div class="product-form__item">
                            <label class="header">Size: <span class="slVariant">XS</span></label>
                            <div data-value="XS" class="swatch-element xs available">
                              <input class="swatchInput" id="swatch-1-xs" type="radio" name="option-1" value="XS">
                              <label class="swatchLbl medium rectangle" for="swatch-1-xs" title="XS">XS</label>
                            </div>
                            <div data-value="S" class="swatch-element s available">
                              <input class="swatchInput" id="swatch-1-s" type="radio" name="option-1" value="S">
                              <label class="swatchLbl medium rectangle" for="swatch-1-s" title="S">S</label>
                            </div>
                            <div data-value="M" class="swatch-element m available">
                              <input class="swatchInput" id="swatch-1-m" type="radio" name="option-1" value="M">
                              <label class="swatchLbl medium rectangle" for="swatch-1-m" title="M">M</label>
                            </div>
                            <div data-value="L" class="swatch-element l available">
                              <input class="swatchInput" id="swatch-1-l" type="radio" name="option-1" value="L">
                              <label class="swatchLbl medium rectangle" for="swatch-1-l" title="L">L</label>
                            </div>
                          </div>
                        </div>
                        <!-- Product Action -->
                        <div class="product-action clearfix">
                          <div class="product-form__item--quantity">
                            <div class="wrapQtyBtn">
                              <div class="qtyField">
                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="product-form__item--submit">
                            <button type="button" name="add" class="btn product-form__cart-submit">
                              <span>Add to cart</span>
                            </button>
                          </div>
                        </div>
                        <!-- End Product Action -->
                      </form>
                      <div class="display-table shareRow">
                        <div class="display-table-cell">
                          <div class="wishlist-btn">
                            <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--End-product-single-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Quick View popup-->

    <?php include 'asset/js.php'; ?>
  </div>
</body>

<!-- belle/shop-grid-6.html   11 Nov 2019 12:41:01 GMT -->
</html>
