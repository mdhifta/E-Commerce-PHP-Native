<?php
include '../../config/config.php';

$query = $mysqli->query("SELECT * FROM tb_user WHERE email='$_POST[email]'");
$verify = $query->num_rows;

if ($verify==0) {
  if ($mysqli->query("INSERT INTO tb_user(fname, lname, telephone, saldo, email, password, roles, status) VALUES('$_POST[fname]', '$_POST[lname]', '$_POST[telp]', '0', '$_POST[email]', '$_POST[password]', '1', '0')")) {
    header("Location:../register.php?alert=3");
  } else {
    header("Location:../register.php?alert=2");
  }
} else {
  header("Location:../register.php?alert=1");
}

 ?>
