<?php
session_start();
include '../../config/config.php';

$query = $mysqli->query("SELECT * FROM tb_user WHERE email='$_POST[email]' AND password='$_POST[password]' AND roles='1'");
$verify = $query->num_rows;

if ($verify==1) {
  $user_data = $query->fetch_object();
  $_SESSION['id_costumer'] = $user_data->id_user;
  $_SESSION['email'] = $user->email;

  header("Location:../produk.php");
} else {
  header("Location:../login.php?alert=1");
}

 ?>
