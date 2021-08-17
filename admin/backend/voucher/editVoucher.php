<?php
include '../../../config/config.php';

if ($mysqli->query("UPDATE tb_kupon SET nama_kupon='$_POST[nama_voucher]', jenis_kupon='$_POST[jenis_voucher]', total_diskon='$_POST[totaldiskon]', masa_berlaku='$_POST[masa_berlaku]', deskripsi='$_POST[deskripsi]' WHERE id_kupon='$_POST[id]'")) {
  header("Location:../../masterVoucher.php");
} else {
  header("Location:../../masterVoucher.php?alert=1");
}

 ?>
