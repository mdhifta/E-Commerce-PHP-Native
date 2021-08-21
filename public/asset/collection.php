<!--Collection Tab slider-->
<div class="tab-slider-product section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="section-header text-center">
          <h2 class="h2">Produk Diskon</h2>
          <p>Temukan barang yang anda sukai dan warnai diri anda</p>
        </div>
        <div class="tabs-listing">
          <ul class="tabs clearfix">
            <li class="active" rel="tab1">Pakaian</li>
            <li rel="tab2">Celana</li>
            <li rel="tab3">Jaket</li>
          </ul>
          <div class="tab_container">
            <!-- tab 1 -->
            <div id="tab1" class="tab_content grid-products">
              <div class="productSlider">
                <?php $pakaian = $mysqli->query("SELECT * FROM tb_produk as tbp JOIN tb_dt_diskon as tdd ON tdd.id_produk=tbp.id_produk JOIN tb_diskon as tbd ON tbd.id_diskon=tdd.id_diskon WHERE tbp.id_kategori='2' AND tbp.status='0'");  ?>
                <?php while ($value = $pakaian->fetch_object()) { ?>
                  <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                      <!-- start product image -->
                      <a href="short-description.html">
                        <?php $slide = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk=".$value->id_produk); ?>
                        <?php while ($imgSlide = $slide->fetch_object()) { ?>
                          <!-- image -->
                          <img class="primary blur-up lazyload" data-src="../vendor/product_img/<?= $imgSlide->filename; ?>" src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image" title="product" />
                          <!-- End image -->

                          <!-- image -->
                          <img class="hover blur-up lazyload" data-src="../vendor/product_img/<?= $imgSlide->filename; ?>" src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image" title="product" />
                          <!-- End image -->
                        <?php } ?>

                        <!-- product label -->
                        <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                        <!-- End product label -->
                      </a>
                      <!-- end product image -->

                      <!-- Start product button -->
                      <form class="variants add" action="detail.php" method="get">
                        <input type="hidden" name="id" value="<?= $value->id_produk; ?>">
                        <button class="btn btn-addto-cart" tabindex="0">Select Options</button>
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
                        <a href="short-description.html"><?= $value->nama_produk; ?></a>
                      </div>
                      <!-- End product name -->
                      <!-- product price -->
                      <div class="product-price">
                        <span class="old-price">Rp. <?= number_format($value->harga_produk); ?></span>
                        <span class="price">Rp. <?= number_format($value->harga_produk-$value->total_diskon); ?></span>
                      </div>
                      <!-- End product price -->

                      <!-- Variant -->
                      <ul class="swatches">
                        <?php $slide = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk=".$value->id_produk); ?>
                        <?php while ($imgSlide = $slide->fetch_object()) { ?>
                          <li class="swatch medium rounded"><img src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image" /></li>
                        <?php } ?>
                      </ul>
                      <!-- End Variant -->
                    </div>
                    <!-- End product details -->
                  </div>
                <?php } ?>

              </div>
            </div>
            <!-- end tab 1 -->
            <!-- tab 2 -->
            <div id="tab2" class="tab_content grid-products">
              <div class="productSlider">

                <?php $pakaian = $mysqli->query("SELECT * FROM tb_produk as tbp JOIN tb_dt_diskon as tdd ON tdd.id_produk=tbp.id_produk JOIN tb_diskon as tbd ON tbd.id_diskon=tdd.id_diskon WHERE tbp.id_kategori='1' AND tbp.status='0'");  ?>
                <?php while ($value = $pakaian->fetch_object()) { ?>
                  <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                      <!-- start product image -->
                      <a href="short-description.html">
                        <?php $slide = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk=".$value->id_produk); ?>
                        <?php while ($imgSlide = $slide->fetch_object()) { ?>
                          <!-- image -->
                          <img class="primary blur-up lazyload" data-src="../vendor/product_img/<?= $imgSlide->filename; ?>" src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image" title="product" />
                          <!-- End image -->

                          <!-- image -->
                          <img class="hover blur-up lazyload" data-src="../vendor/product_img/<?= $imgSlide->filename; ?>" src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image" title="product" />
                          <!-- End image -->
                        <?php } ?>

                        <!-- product label -->
                        <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                        <!-- End product label -->
                      </a>
                      <!-- end product image -->

                      <!-- Start product button -->
                      <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                        <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                      </form>
                      <div class="button-set">
                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                          <i class="icon anm anm-search-plus-r"></i>
                        </a>
                        <div class="wishlist-btn">
                          <a class="wishlist add-to-wishlist" href="wishlist.html">
                            <i class="icon anm anm-heart-l"></i>
                          </a>
                        </div>
                        <div class="compare-btn">
                          <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                            <i class="icon anm anm-random-r"></i>
                          </a>
                        </div>
                      </div>
                      <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                      <!-- product name -->
                      <div class="product-name">
                        <a href="short-description.html"><?= $value->nama_produk; ?></a>
                      </div>
                      <!-- End product name -->
                      <!-- product price -->
                      <div class="product-price">
                        <span class="old-price">Rp. <?= number_format($value->harga_produk); ?></span>
                        <span class="price">Rp. <?= number_format($value->harga_produk-$value->total_diskon); ?></span>
                      </div>
                      <!-- End product price -->

                      <!-- Variant -->
                      <ul class="swatches">
                        <?php $slide = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk=".$value->id_produk); ?>
                        <?php while ($imgSlide = $slide->fetch_object()) { ?>
                          <li class="swatch medium rounded"><img src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image" /></li>
                        <?php } ?>
                      </ul>
                      <!-- End Variant -->
                    </div>
                    <!-- End product details -->
                  </div>
                <?php } ?>

              </div>
            </div>
            <!-- end tab 2 -->
            <!-- tab 3 -->
            <div id="tab3" class="tab_content grid-products">
              <div class="productSlider">
                <?php $pakaian = $mysqli->query("SELECT * FROM tb_produk as tbp JOIN tb_dt_diskon as tdd ON tdd.id_produk=tbp.id_produk JOIN tb_diskon as tbd ON tbd.id_diskon=tdd.id_diskon WHERE tbp.id_kategori='3' AND tbp.status='0'");  ?>
                <?php while ($value = $pakaian->fetch_object()) { ?>
                  <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                      <!-- start product image -->
                      <a href="short-description.html">
                        <?php $slide = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk=".$value->id_produk); ?>
                        <?php while ($imgSlide = $slide->fetch_object()) { ?>
                          <!-- image -->
                          <img class="primary blur-up lazyload" data-src="../vendor/product_img/<?= $imgSlide->filename; ?>" src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image" title="product" />
                          <!-- End image -->

                          <!-- image -->
                          <img class="hover blur-up lazyload" data-src="../vendor/product_img/<?= $imgSlide->filename; ?>" src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image" title="product" />
                          <!-- End image -->
                        <?php } ?>

                        <!-- product label -->
                        <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                        <!-- End product label -->
                      </a>
                      <!-- end product image -->

                      <!-- Start product button -->
                      <form class="variants add" action="detail.php" method="get">
                        <input type="hidden" name="id" value="<?= $value->id_produk; ?>">
                        <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                      </form>
                      <div class="button-set">
                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                          <i class="icon anm anm-search-plus-r"></i>
                        </a>
                        <div class="wishlist-btn">
                          <a class="wishlist add-to-wishlist" href="wishlist.html">
                            <i class="icon anm anm-heart-l"></i>
                          </a>
                        </div>
                        <div class="compare-btn">
                          <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                            <i class="icon anm anm-random-r"></i>
                          </a>
                        </div>
                      </div>
                      <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                      <!-- product name -->
                      <div class="product-name">
                        <a href="short-description.html"><?= $value->nama_produk; ?></a>
                      </div>
                      <!-- End product name -->
                      <!-- product price -->
                      <div class="product-price">
                        <span class="old-price">Rp. <?= number_format($value->harga_produk); ?></span>
                        <span class="price">Rp. <?= number_format($value->harga_produk-$value->total_diskon); ?></span>
                      </div>
                      <!-- End product price -->

                      <!-- Variant -->
                      <ul class="swatches">
                        <?php $slide = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk=".$value->id_produk); ?>
                        <?php while ($imgSlide = $slide->fetch_object()) { ?>
                          <li class="swatch medium rounded"><img src="../vendor/product_img/<?= $imgSlide->filename; ?>" alt="image" /></li>
                        <?php } ?>
                      </ul>
                      <!-- End Variant -->
                    </div>
                    <!-- End product details -->
                  </div>
                <?php } ?>

              </div>
            </div>
            <!-- end tab 3 -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Collection Tab slider-->
