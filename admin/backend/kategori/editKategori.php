<?php
include '../../../config/config.php';

if ($mysqli->query("UPDATE tb_kategori SET jenis_kategori='$_POST[jenis_kategori]' WHERE id_kategori='$_POST[id]'")) {
  header('Location:../../masterKategori.php');
} else {
  header('Location:../../masterKategori.php?alert=1');
}
 ?>
