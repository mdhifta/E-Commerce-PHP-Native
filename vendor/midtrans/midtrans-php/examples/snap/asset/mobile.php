<!--Mobile Menu-->
<div class="mobile-nav-wrapper" role="navigation">
  <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close</div>
  <ul id="MobileNav" class="mobile-nav">
    <li class="lvl1 parent megamenu"><a href="../../../../../public/index.php">Home</a></li>
    <li class="lvl1 parent megamenu"><a href="../../../../../public/produk.php">Product</a></li>
    <li class="lvl1 parent megamenu"><a href="#">Kategori <i class="anm anm-plus-l"></i></a>
      <ul>
        <?php $kategori = $mysqli->query("SELECT * FROM tb_kategori"); ?>
        <?php while ($value = $kategori->fetch_object()) { ?>
          <li><a href="../../../../../public/search.php?id=<?= $value->id_kategori; ?>" class="site-nav"><?= $value->jenis_kategori; ?></a></li>
        <?php } ?>
      </ul>
    </li>
    <li class="lvl1 parent megamenu"><a href="#footer">Tentang</a></li>
    </li>
  </ul>
</div>
<!--End Mobile Menu-->
