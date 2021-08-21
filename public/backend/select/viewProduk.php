<?php
session_start();
include '../../../config/config.php';

$produk_id = $_POST['id'];
$query = $mysqli->query("SELECT * FROM tb_produk WHERE id_produk='$produk_id'");
$getProduk = $query->fetch_object();
?>
<!--Quick View popup-->
<div class="modal-dialog" id="hidden">
  <div class="modal-content">
    <div class="modal-body">
      <div id="ProductSection-product-template" class="product-template__container prstyle1">
        <div class="product-single">
          <!-- Start model close -->
          <a href="#" data-dismiss="modal" onclick="refresh(this)" class="model-close-btn pull-right" title="close" data-dismiss="modal"><span class="icon icon anm anm-times-l"></span></a>
          <!-- End model close -->
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="product-details-img">
                <div class="pl-20">
                  <?php $getImg = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk='$_POST[id]'"); ?>
                  <?php while ($image = $getImg->fetch_object()) { ?>
                    <img src="../vendor/product_img/<?= $image->filename; ?>" alt="" />
                    <?php break; ?>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="product-single__meta">
                <h2 class="product-single__title"><?= $getProduk->nama_produk; ?></h2>
                <div class="prInfoRow">
                  <?php if ($getProduk->stok==0): ?>
                    <div class="product-stock"> <span class="SaveAmount-product-template">Out Stock</span> <span class="outstock hide">Unavailable</span> </div>
                  <?php else: ?>
                    <div class="product-stock"> <span class="instock">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                  <?php endif; ?>
                </div>
                <p class="product-single__price product-single__price-product-template">
                  <span class="visually-hidden">Regular price</span>
                  <?php $getDiskon = $mysqli->query("SELECT * FROM tb_diskon as tdk JOIN tb_dt_diskon as tdd ON tdd.id_diskon=tdk.id_diskon WHERE tdd.id_produk='$_POST[id]' AND tdd.status='0'"); ?>
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
                          <?php $color = $mysqli->query("SELECT * FROM tb_warna WHERE id_produk='$_POST[id]'"); ?>
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
                          <?php $size = $mysqli->query("SELECT * FROM tb_ukuran WHERE id_produk='$_POST[id]'"); ?>
                          <?php while ($sizes = $size->fetch_object()) { ?>
                            <option value="<?= $sizes->id_ukuran; ?>"><?= $sizes->jenis_ukuran; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- ukuran end -->

                    <input type="hidden" name="id" value="<?= $_POST['id']; ?>">

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
        </div>
      </div>
    </div>
  </div>
  <!--End Quick View popup-->
  <?php include '../../asset/js.php'; ?>
  <script type="text/javascript">
    function refresh($this){
    location.reload();
    return false;
  }
</script>
