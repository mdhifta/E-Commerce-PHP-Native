<?php
include '../../../config/config.php';

if ($mysqli->query("INSERT INTO tb_kategori(jenis_kategori) VALUES('$_POST[jenis_kategori]')")) {
  header('Location:../../masterKategori.php');
} else {
  header('Location:../../masterKategori.php?alert=1');
}
 ?>
