<?php
session_start();
include '../../../config/config.php';

$query = $mysqli->query("SELECT * FROM tb_user WHERE email='$_POST[email]'");

$data_verify = $query->fetch_object();

if ($_SESSION['email']==$_POST['email']) {
  $verify = 0;
} else {
  $verify = $query->num_rows;
}

if ($verify==0) {
  if ($_POST['password']!='') {
    if ($mysqli->query("UPDATE tb_user SET fname='$_POST[fname]', lname='$_POST[lname]', telephone='$_POST[telp]', email='$_POST[email]', password='$_POST[password]' WHERE id_user='$_SESSION[id_costumer]'")) {
      header("Location:../../profil.php?alert=3");
    } else {
      header("Location:../../profil.php?alert=2");
    }
  } else {
    if ($mysqli->query("UPDATE tb_user SET fname='$_POST[fname]', lname='$_POST[lname]', telephone='$_POST[telp]', email='$_POST[email]' WHERE id_user='$_SESSION[id_costumer]'")) {
      header("Location:../../profil.php?alert=3");
    } else {
      header("Location:../../profil.php?alert=2");
    }
  }

} else {
  header("Location:../../profil.php?alert=1");
}

 ?>
