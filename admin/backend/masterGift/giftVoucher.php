<?php
include '../../../config/config.php';

if ($_POST['id_user']=='all') {
  $query = $mysqli->query("SELECT * FROM tb_user WHERE roles='1'");
  while ($value = $query->fetch_object()) {
    $mysqli->query("INSERT INTO tb_get_diskon(id_user, id_kupon) VALUES('$value->id_user', '$_POST[id_kupon]')");
  }
  header("Location:../../masterGift.php?verify=1&alert=1");
} else {
  if ($mysqli->query("INSERT INTO tb_get_diskon(id_user, id_kupon) VALUES('$_POST[id_user]', '$_POST[id_kupon]')")) {
    header("Location:../../masterGift.php?verify=1&alert=1");
  } else {
    header("Location:../../masterGift.php?verify=1&alert=2");
  }
}
?>
