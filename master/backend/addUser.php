<?php
include '../../config/config.php';

$query = $mysqli->query("SELECT * FROM tb_user WHERE email='$_POST[email]'");
$verify = $query->num_rows;

if ($verify==0) {
  if ($mysqli->query("INSERT INTO tb_user(fname, lname, telephone, saldo, email, password, roles, status) VALUES('$_POST[fname]', '$_POST[lname]', '$_POST[telp]', '0', '$_POST[email]', '$_POST[password]', '0', '1')")) {
    header("Location:../addUser.php?alert=3");
  } else {
    header("Location:../addUser.php?alert=2");
  }
} else {
  header("Location:../addUser.php?alert=1");
}

 ?>
