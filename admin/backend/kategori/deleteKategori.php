<?php
include '../../../config/config.php';

if ($mysqli->query("UPDATE tb_kategori SET status='1' WHERE id_kategori='$_GET[id]'")) {
  header('Location:../../masterKategori.php');
} else {
  header('Location:../../masterKategori.php?alert=1');
}
 ?>
