<?php
include '../../../config/config.php';

if ($mysqli->query("UPDATE tb_produk SET status='1' WHERE id_produk='$_GET[id]'")) {
  header('Location:../../masterProduk.php');
} else {
  header('Location:../../masterProduk.php?alert=1');
}
 ?>
