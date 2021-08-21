<?php if (isset($_SESSION['id_costumer'])): ?>
  <?php $myaccout = $mysqli->query("SELECT * FROM tb_user WHERE id_user='$_SESSION[id_costumer]'"); ?>
  <?php $account = $myaccout->fetch_object(); ?>
<?php endif; ?>
<!--Search Form Drawer-->
<div class="search">
  <div class="search__form">
    <form class="search-bar__form" action="search.php" method="post">
      <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
      <input class="search__input" type="search" name="search" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
    </form>
    <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
  </div>
</div>
<!--End Search Form Drawer-->

<!--Top Header-->
<div class="top-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-10 col-sm-8 col-md-5 col-lg-4">
        <p class="phone-no"><i class="anm anm-phone-s"></i> (+62) 812 9615 8612</p>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
        <div class="text-center"><p class="top-header_middle-text"> Lechy Beutique</p></div>
      </div>
      <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
        <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
        <ul class="customer-links list-inline">
          <?php if (!isset($_SESSION['id_costumer'])): ?>
            <li><a href="../../../../../public/login.php">Login</a></li>
            <li><a href="../../../../../public/register.php">Create Account</a></li>
          <?php else: ?>
            <li><a href="../../../../../public/backend/logout.php">Logout</a></li>
            <li><a href="../../../../../public/profil.php"><?= $account->lname; ?> (saldo : Rp.<?= number_format($account->saldo); ?>;-)</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--End Top Header-->
