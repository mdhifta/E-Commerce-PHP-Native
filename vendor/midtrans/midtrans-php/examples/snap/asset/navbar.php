<!--Header-->
<div class="header-wrap animated d-flex">
  <div class="container-fluid">
    <div class="row align-items-center">
      <!--Desktop Logo-->
      <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
        <a href="../../../../../public/index.php">
          <img src="../../../../../vendor/assets/logo.png" width="50" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template"/>
          igiShop Cloth
        </a>
      </div>
      <!--End Desktop Logo-->

      <div class="col-2 col-sm-3 col-md-3 col-lg-8">
        <div class="d-block d-lg-none">
          <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
            <i class="icon anm anm-times-l"></i>
            <i class="anm anm-bars-r"></i>
          </button>
        </div>
        <!--Desktop Menu-->
        <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
          <ul id="siteNav" class="site-nav medium center hidearrow">

            <?php if (!isset($_SESSION['id_costumer'])): ?>
              <li class="lvl1 parent megamenu"><a href="../../../../../public/index.php">Home <i class="anm anm-angle-down-l"></i></a></li>
            <?php endif; ?>

            <li class="lvl1 parent megamenu"><a href="../../../../../public/produk.php">Product <i class="anm anm-angle-down-l"></i></a></li>

            <li class="lvl1 parent dropdown"><a href="#">Kategori <i class="anm anm-angle-down-l"></i></a>
              <ul class="dropdown">
                <?php $kategori = $mysqli->query("SELECT * FROM tb_kategori"); ?>
                <?php while ($value = $kategori->fetch_object()) { ?>
                  <li><a href="../../../../../public/search.php?id=<?= $value->id_kategori; ?>" class="site-nav"><?= $value->jenis_kategori; ?></a></li>
                <?php } ?>
              </ul>
            </li>

            <?php if (isset($_SESSION['id_costumer'])): ?>
              <li class="lvl1 parent dropdown"><a href="../../../../../public/transaction_list.php">Riwayat Transaksi <i class="anm anm-angle-down-l"></i></a></li>
              <li class="lvl1 parent dropdown"><a href="../../../../../public/payment_list.php">Pembayaran <i class="anm anm-angle-down-l"></i></a></li>
              <li class="lvl1 parent dropdown"><a href="../../../../../public/topup.php">Topup <i class="anm anm-angle-down-l"></i></a></li>
            <?php endif; ?>

            <?php if (!isset($_SESSION['id_costumer'])): ?>
              <li class="lvl1 parent dropdown"><a href="#footer">Tentang <i class="anm anm-angle-down-l"></i></a></li>
            <?php endif; ?>
          </ul>
        </nav>
        <!--End Desktop Menu-->
      </div>

      <!--Mobile Logo-->
      <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
        <div class="logo">
          <a href="../../../../../public/index.php">
            <h2>DigiShop CLoth</h2>
          </a>
        </div>
      </div>
      <!--Mobile Logo-->

      <div class="col-4 col-sm-3 col-md-3 col-lg-2">
        <div class="site-cart">
          <a href="../../../../../public/cart.php" style="font-size:22px; text-decoration:none;">
            <i class="icon anm anm-bag-l"></i>
          </a>
        </div>
        <div class="site-header__search">
          <button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End Header-->
