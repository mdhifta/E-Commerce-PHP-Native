<?php
include '../../../config/config.php';

if ($mysqli->query("UPDATE tb_kupon SET status='1' WHERE id_kupon='$_GET[id]'")) {
  header('Location:../../masterVoucher.php');
} else {
  header('Location:../../masterVoucher.php?alert=1');
}
?>
