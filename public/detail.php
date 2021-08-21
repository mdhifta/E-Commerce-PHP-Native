<?php session_start(); include '../config/config.php'; ?>
<?php $query = $mysqli->query("SELECT  * FROM tb_produk WHERE id_produk='$_GET[id]'"); ?>
<?php $getProduk = $query->fetch_object(); ?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/short-description.html   11 Nov 2019 12:43:10 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Detail <?= $getProduk->nama_produk; ?></title>
  <?php include 'asset/css.php'; ?>
</head>
<body class="template-product belle">
  <div class="pageWrapper">
    <?php include 'asset/topbar.php'; ?>

    <?php include 'asset/navbar.php'; ?>

    <?php include 'asset/mobile.php'; ?>

    <!--Body Content-->
    <div id="page-content">
      <!--MainContent-->
      <div id="MainContent" class="main-content" role="main">
        <!--Breadcrumb-->
        <div class="bredcrumbWrap">
          <div class="container breadcrumbs">
            <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Detail <?= $getProduk->nama_produk; ?></span>
          </div>
        </div>
        <!--End Breadcrumb-->

        <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
          <!--product-single-->
          <div class="product-single">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="product-details-img">
                  <div class="product-thumb">
                    <div id="gallery" class="product-dec-slider-2 product-tab-left">
                      <?php $i = 0; $getImg = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk='$_GET[id]'"); ?>
                      <?php while ($image = $getImg->fetch_object()) { ?>
                        <?php if ($i == 1): ?>
                          <?php $my_img = $image->filename; ?>
                        <?php endif; ?>
                        <a data-image="../vendor/product_img/<?= $image->filename; ?>" data-zoom-image="../vendor/product_img/<?= $image->filename; ?>" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                          <img class="blur-up lazyload" src="../vendor/product_img/<?= $image->filename; ?>" alt="" />
                        </a>
                        <?php $i +=1; ?>
                      <?php  } ?>
                    </div>
                  </div>
                  <div class="zoompro-wrap product-zoom-right pl-20">
                    <div class="zoompro-span">
                      <img class="zoompro blur-up lazyload" data-zoom-image="../vendor/product_img/<?= $my_img; ?>" alt="" src="../vendor/product_img/<?= $my_img; ?>" />
                    </div>
                  </div>
                  <div class="lightboximages">
                    <?php while ($image = $getImg->fetch_object()) { ?>
                      <a href="../vendor/product_img/<?= $image->filename; ?>" data-size="1462x2048"></a>
                      <?php $i +=1; ?>
                    <?php  } ?>
                  </div>

                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="product-single__meta">
                  <h1 class="product-single__title"><?= $getProduk->nama_produk; ?></h1>
                  <div class="product-nav clearfix">
                    <a href="#" class="next" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
                  <div class="prInfoRow">
                    <?php if ($getProduk->stok==0): ?>
                      <div class="product-stock"> <span class="SaveAmount-product-template">Out Stock</span> <span class="outstock hide">Unavailable</span> </div>
                    <?php else: ?>
                      <div class="product-stock"> <span class="instock">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                    <?php endif; ?>
                  </div>
                  <p class="product-single__price product-single__price-product-template">
                    <span class="visually-hidden">Regular price</span>
                    <?php $getDiskon = $mysqli->query("SELECT * FROM tb_diskon as tdk JOIN tb_dt_diskon as tdd ON tdd.id_diskon=tdk.id_diskon WHERE tdd.id_produk='$_GET[id]' AND tdd.status='0'"); ?>
                    <?php $diskon = $getDiskon->fetch_object(); ?>
                    <?php if ($diskon!=''): ?>
                      <s id="ComparePrice-product-template"><span class="money">Rp. <?= number_format($getProduk->harga_produk); ?></span></s>
                      <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                        <span id="ProductPrice-product-template"><span class="money">Rp. <?= number_format($getProduk->harga_produk-$diskon->total_diskon); ?></span></span>
                      </span>
                      <?php else: ?>
                        <span class="product-price__price product-price__price-product-template product-price__sale--single">
                          <span id="ProductPrice-product-template"><span class="">Rp. <?= number_format($getProduk->harga_produk); ?></span></span>
                        </span>
                    <?php endif; ?>
                </p>

                <div class="product-single__description rte">
                  <p><?= $getProduk->deskripsi_produk; ?></p>
                </div>

                <form method="get" action="backend/cart/addCart.php" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                  <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                    <div class="product-form__item">
                      <label class="header">Color: <label>
                      <select id="swatch-1-xs" name="color">
                        <?php $color = $mysqli->query("SELECT * FROM tb_warna WHERE id_produk='$_GET[id]'"); ?>
                        <?php while ($colors = $color->fetch_object()) { ?>
                          <option value="<?= $colors->id_warna; ?>"><?= $colors->jenis_warna; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <!-- ukuran start -->
                  <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                    <div class="product-form__item">
                      <label class="header">Size: </label>
                      <select id="swatch-1-xs" name="size">
                        <?php $size = $mysqli->query("SELECT * FROM tb_ukuran WHERE id_produk='$_GET[id]'"); ?>
                        <?php while ($sizes = $size->fetch_object()) { ?>
                          <option value="<?= $sizes->id_ukuran; ?>"><?= $sizes->jenis_ukuran; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <!-- ukuran end -->

                  <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

                  <!-- Product Action -->
                  <div class="product-action clearfix">
                    <div class="product-form__item--submit">
                      <button name="add" class="btn product-form__cart-submit">
                        <span>Add to cart</span>
                      </button>
                    </div>
                  </div>
                  <!-- End Product Action -->
                </form>
              </div>
            </div>
          </div>
          <!--End-product-single-->

        </div>
        <!--#ProductSection-product-template-->
      </div>
      <!--MainContent-->
    </div>
    <!--End Body Content-->

    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->

    <!-- Photoswipe Gallery -->
    <script src="../vendor/assets/js/vendor/photoswipe.min.js"></script>
    <script src="../vendor/assets/js/vendor/photoswipe-ui-default.min.js"></script>

    <?php include 'asset/js.php'; ?>

    <script>
    $(function(){
      var $pswp = $('.pswp')[0],
      image = [],
      getItems = function() {
        var items = [];
        $('.lightboximages a').each(function() {
          var $href   = $(this).attr('href'),
          $size   = $(this).data('size').split('x'),
          item = {
            src : $href,
            w: $size[0],
            h: $size[1]
          }
          items.push(item);
        });
        return items;
      }
      var items = getItems();

      $.each(items, function(index, value) {
        image[index]     = new Image();
        image[index].src = value['src'];
      });
      $('.prlightbox').on('click', function (event) {
        event.preventDefault();

        var $index = $(".active-thumb").parent().attr('data-slick-index');
        $index++;
        $index = $index-1;

        var options = {
          index: $index,
          bgOpacity: 0.9,
          showHideOpacity: true
        }
        var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
        lightBox.init();
      });
    });
    </script>
  </div>

  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item">
    </div>
  </div>
  <div class="pswp__ui pswp__ui--hidden">
    <div class="pswp__top-bar">
      <div class="pswp__counter">
      </div>
      <button class="pswp__button pswp__button--close" title="Close (Esc)">
      </button>
      <button class="pswp__button pswp__button--share" title="Share">
      </button>
      <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
      <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
      <div class="pswp__preloader"><div class="pswp__preloader__icn">
        <div class="pswp__preloader__cut"><div class="pswp__preloader__donut">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
  <div class="pswp__share-tooltip">
  </div>
</div>
<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
<div class="pswp__caption">
  <div class="pswp__caption__center">
  </div>
</div>
</div>
</div>
</div>

</body>

<!-- belle/short-description.html   11 Nov 2019 12:43:10 GMT -->
</html>
