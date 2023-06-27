<?php
session_start();
include '../config/config.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/index.html   11 Nov 2019 12:16:10 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <?php include "asset/css.php"; ?>
    <style>
    .home-slideshow {
        padding-top: 0px !important;
    }
    </style>
</head>

<body class="template-index belle template-index-belle">
    <div id="pre-loader">
        <img src="../vendor/assets/images/loader.gif" alt="Loading..." />
    </div>
    <div class="pageWrapper">
        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="#">
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..."
                        aria-label="Search" autocomplete="off">
                </form>
                <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
            </div>
        </div>
        <!--End Search Form Drawer-->

        <!-- topbar menu -->
        <?php include 'asset/topbar.php'; ?>
        <!-- end topbar -->

        <!-- navbar menu -->
        <?php include "asset/navbar.php"; ?>
        <!-- end navbar -->

        <!-- mobile menu -->
        <?php include 'asset/mobile.php'; ?>
        <!-- end mobile menu -->

        <!--Body Content-->
        <div id="page-content">
            <!-- home slider -->
            <?php include 'asset/homeslider.php'; ?>
            <!-- end home slider -->

            <!-- collection sidebar -->
            <?php include 'asset/collection.php'; ?>
            <!-- end collection -->

            <!--Featured Product-->
            <div class="product-rows section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="section-header text-center">
                                <h2 class="h2">KOLEKSI PRODUK</h2>
                                <p>Cari dan pilih produk yang anda inginkan</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid-products">
                        <div class="row">
                            <?php $pakaian = $mysqli->query("SELECT * FROM tb_produk WHERE status='0'");  ?>
                            <?php while ($value = $pakaian->fetch_object()) { ?>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                                <div class="grid-view_image">
                                    <!-- start product image -->
                                    <a id="<?= $value->id_produk; ?>" onclick="getView(this)" data-toggle="modal"
                                        data-target="#content_quickview" class="grid-view-item__link">
                                        <?php $slide = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk=".$value->id_produk); ?>
                                        <?php while ($imgSlide = $slide->fetch_object()) { ?>
                                        <!-- image -->
                                        <img class="grid-view-item__image primary blur-up lazyload"
                                            data-src="../vendor/product_img/<?= $imgSlide->filename; ?>"
                                            src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image"
                                            title="product">
                                        <!-- End image -->

                                        <!-- Hover image -->
                                        <img class="grid-view-item__image hover blur-up lazyload"
                                            data-src="../vendor/product_img/<?= $imgSlide->filename; ?>"
                                            src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image"
                                            title="product">
                                        <!-- End hover image -->
                                        <?php } ?>

                                        <!-- product label -->
                                        <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                        <!-- End product label -->
                                    </a>
                                    <!-- end product image -->
                                    <!--start product details -->
                                    <div class="product-details hoverDetails text-center mobile">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <a id="<?= $value->id_produk; ?>" onclick="getView(this)"
                                                data-toggle="modal"
                                                data-target="#content_quickview"><?= $value->nama_produk; ?></a>
                                        </div>
                                        <!-- End product name -->
                                        <!-- product price -->
                                        <div class="product-price">
                                            <span class="price">Rp. <?= number_format($value->harga_produk); ?></span>
                                        </div>
                                        <!-- product button -->
                                        <div class="button-set">
                                            <a title="Quick View" class="quick-view-popup quick-view"
                                                id="<?= $value->id_produk; ?>" onclick="getView(this)"
                                                data-toggle="modal" data-target="#content_quickview">
                                                <i class="icon anm anm-search-plus-r"></i>
                                            </a>
                                            <!-- Start product button -->
                                            <form class="variants add" action="login.php">
                                                <button class="btn cartIcon btn-addto-cart" tabindex="0"><i
                                                        class="icon anm anm-bag-l"></i></button>
                                            </form>
                                        </div>
                                        <!-- end product button -->
                                    </div>
                                    <!-- Variant -->
                                    <ul class="swatches text-center">
                                        <a href="#" data-src="../vendor/product_img/<?= $imgSlide->filename; ?>"
                                            src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image"
                                            title="product" class="grid-view-item__link">
                                            <?php $slide = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk=".$value->id_produk); ?>
                                            <?php while ($imgSlide = $slide->fetch_object()) { ?>
                                            <li class="swatch medium rounded"><img
                                                    src="../vendor/product_img/<?= $imgSlide->filename; ?>"
                                                    alt="image" /></li>
                                            <?php } ?>
                                        </a>
                                    </ul>
                                    <!-- End Variant -->
                                    <!-- End product details -->
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <!--End Featured Product-->

            <!--Store Feature-->
            <div class="store-feature section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="display-table store-info">
                                <li class="display-table-cell">
                                    <i class="icon anm anm-truck-l"></i>
                                    <h5>Pengantaran</h5>
                                    <span class="sub-text">Pilih Jasa pengantaran yang anda inginkan</span>
                                </li>
                                <li class="display-table-cell">
                                    <i class="icon anm anm-dollar-sign-r"></i>
                                    <h5>Harga Murah</h5>
                                    <span class="sub-text">Dapatkan banyak diskon dari setiap produk</span>
                                </li>
                                <li class="display-table-cell">
                                    <i class="icon anm anm-comments-l"></i>
                                    <h5>Layanan Tanya Jawab</h5>
                                    <span class="sub-text">Menjawab semua keluah dan keperluan yang ada</span>
                                </li>
                                <li class="display-table-cell">
                                    <i class="icon anm anm-credit-card-front-r"></i>
                                    <h5>Keamanan Pembayaran</h5>
                                    <span class="sub-text">Lakukan pembayaran menggunakan payment</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Store Feature-->
        </div>
        <!--End Body Content-->

        <!-- footer -->
        <?php include 'asset/footer.php';?>
        <!-- end footer -->

        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->

        <!--Quick View popup-->
        <div class="modal fade quick-view-popup" id="content_quickview"></div>
        <!--End Quick View popup-->
        <script src="../vendor/assets/js/jquery-2.2.4.min.js"></script>

        <?php include 'asset/js.php'; ?>
    </div>
    <script type="text/javascript" language="javascript">
    function getView($this) {
        var get_id = $this.id;
        $.ajax({
            type: 'POST',
            url: 'backend/select/viewProduk.php',
            data: 'id=' + get_id,
            success: function(data) {
                $("#content_quickview").html(data);
                $("#content_quickview").niceSelect('update');
            }
        });
    }
    </script>
</body>

<!-- belle/index.html   11 Nov 2019 12:20:55 GMT -->

</html>