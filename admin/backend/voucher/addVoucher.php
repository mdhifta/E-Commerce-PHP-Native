<?php
include '../../../config/config.php';

if ($mysqli->query("INSERT INTO tb_kupon(nama_kupon, jenis_kupon, total_diskon, masa_berlaku, deskripsi, status) VALUES('$_POST[nama_voucher]', '$_POST[jenis_voucher]', '$_POST[totaldiskon]', '$_POST[masa_berlaku]', '$_POST[deskripsi]', '0')")) {
  header("Location:../../masterVoucher.php");
} else {
  header("Location:../../masterVoucher.php?alert=1");
}

 ?>
