<?php
session_start();
include '../../../config/config.php';

$result = $_POST['array'];
$result_explode = explode('|', $result);

$_SESSION['etd'] = $result_explode[0]." HARI";
$_SESSION['price'] = floatval($result_explode[1])*1000;

?>

<form class="" action="../vendor/midtrans/midtrans-php/examples/snap/checkout-process.php" method="post">
  <div class="solid-border">
    <div class="row border-bottom pb-2">
      <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
      <span class="col-12 col-sm-6 text-right"><span class="money">Rp. <?= number_format($_SESSION['subtotal']); ?>;-</span></span>
    </div>
    <div class="row border-bottom pb-2 pt-2">
      <span class="col-12 col-sm-6 cart__subtotal-title">Ongkir</span>
      <span class="col-12 col-sm-6 text-right">Rp.<?= number_format($_SESSION['price']); ?>;-</span>
    </div>
    <div class="row border-bottom pb-2 pt-2">
      <span class="col-12 col-sm-6 cart__subtotal-title">Kupon</span>
      <span class="col-12 col-sm-6 text-right">
        <select class="" name="kupon" id="kupon">
          <option value="null">-- PILIH KUPON --</option>
          <?php $query_kupon = $mysqli->query("SELECT * FROM tb_get_diskon as tgd JOIN tb_kupon as tbk ON tbk.id_kupon=tgd.id_kupon WHERE tgd.id_user='$_SESSION[id_costumer]' AND tgd.status='0'"); ?>
          <?php while ($kupon = $query_kupon->fetch_object()) { ?>
            <?php if ($kupon->jenis_kupon=='persen'){ ?>
              <option value="<?= $kupon->id_get_diskon; ?>"><?= $kupon->nama_kupon ?> <?= $kupon->total_diskon; ?>% (<?= $kupon->deskripsi; ?>)</option>
            <?php } else { ?>
              <option value="<?= $kupon->id_get_diskon; ?>"><?= $kupon->nama_kupon ?> -Rp.<?= $kupon->total_diskon; ?>(<?= $kupon->deskripsi; ?>)</option>
            <?php } ?>
          <?php } ?>
        </select>
      </span>
    </div>
    <div class="row border-bottom pb-2 pt-2">
      <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
      <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">Rp. <?= number_format($_SESSION['subtotal']+$_SESSION['price']); ?>;-</span></span>
    </div>
    <input type="submit" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout" value="Proceed To Checkout via Bank">
    <a name="checkout" id="cartCheckout" class="btn btn--small-wide checkout" href="checkout.php" style="color:#fff;margin-top:5px">Proceed To Checkout via Saldo</a>
  </div>
</div>
</form>

<script src="../vendor/assets/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
  $('#kupon').change(function(){
    var kupon = $('#kupon').val();
    $.ajax({
      type : 'POST',
      url : 'backend/user/setKupon.php',
      data :  'kupon_id=' + kupon,
      success: function (data) {
        alert("Berhasil memilih kupon");
      }
    });
  });
});
</script>
