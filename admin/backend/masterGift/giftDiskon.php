<?php
include '../../../config/config.php';

if ($_POST['id_produk']=='all') {
  $query = $mysqli->query("SELECT * FROM tb_produk WHERE status='0'");
  while ($value = $query->fetch_object()) {
    $mysqli->query("INSERT INTO tb_dt_diskon(id_diskon, id_produk) VALUES('$_POST[id_diskon]', '$value->id_produk')");
  }
  header("Location:../../masterGift.php?verify=2&alert=1");
} else {
  if ($mysqli->query("INSERT INTO tb_dt_diskon(id_diskon, id_produk) VALUES('$_POST[id_diskon]', '$_POST[id_produk]')")) {
    header("Location:../../masterGift.php?verify=2&alert=1");
  } else {
    header("Location:../../masterGift.php?verify=2&alert=2");
  }
}
?>
