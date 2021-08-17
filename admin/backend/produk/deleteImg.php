<?php
include '../../../config/config.php';

if ($mysqli->query("DELETE FROM tb_gambar WHERE id_gambar='$_GET[id]'")) {
  header('Location:../../addProduk.php?id='.$_GET['id_produk'].'');
} else {
  header('Location:../../masterProduk.php?alert=1');
}
 ?>
