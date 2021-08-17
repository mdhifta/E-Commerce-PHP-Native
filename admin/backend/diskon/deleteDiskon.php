<?php
include '../../../config/config.php';

if ($mysqli->query("UPDATE tb_diskon SET status='1' WHERE id_diskon='$_GET[id]'")) {
  header('Location:../../masterDiskon.php');
} else {
  header('Location:../../masterDiskon.php?alert=1');
}
?>
