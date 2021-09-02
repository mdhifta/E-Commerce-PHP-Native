<?php
session_start();
include '../../../config/config.php';

$password = $_POST['pass1'];
$confirm = $_POST['pass2'];

$id = $_POST['id'];

if ($password==$confirm) {
  if ($mysqli->query("UPDATE tb_user SET password='$password' WHERE id_user='$id'")) {
    header('Location:../../login.php?alert=4');
  }
} else {
  header('Location:../../asset/password/new_password.php?id='.$id.'&alert=1');
}


?>
