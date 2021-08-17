<?php
include '../../../config/config.php';

if ($mysqli->query("INSERT INTO tb_diskon(total_diskon, tanggal_awal, tanggal_akhir, deskripsi, status) VALUES('$_POST[total_diskon]', '$_POST[tanggal_awal]', '$_POST[tanggal_akhir]', '$_POST[deskripsi]', '0')")) {
  header("Location:../../masterDiskon.php");
} else {
  header("Location:../../masterDiskon.php?alert=1");
}

 ?>
