<?php
include '../../../config/config.php';

if ($mysqli->query("UPDATE tb_transaksi SET no_resi='$_POST[no_resi]' WHERE id_transaksi='$_POST[id]'")) {
  header('Location:../../detailTransaksi.php?id='.$_POST['id'].'');
} else {
  header('Location:../../addResi.php?alert=1&id='.$_POST['id'].'');
}
 ?>
