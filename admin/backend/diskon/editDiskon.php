<?php
include '../../../config/config.php';

if ($mysqli->query("UPDATE tb_diskon SET total_diskon='$_POST[total_diskon]', tanggal_awal='$_POST[tanggal_awal]', tanggal_akhir='$_POST[tanggal_akhir]', deskripsi='$_POST[deskripsi]' WHERE id_diskon='$_POST[id]'")) {
  header("Location:../../masterDiskon.php");
} else {
  header("Location:../../masterDiskon.php?alert=1");
}

 ?>
