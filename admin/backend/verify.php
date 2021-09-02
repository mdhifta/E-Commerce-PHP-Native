<?php
session_start();
include '../../config/config.php';

#get data
$email = $_POST['email'];
$password = $_POST['password'];

$query = $mysqli->query("SELECT * FROM tb_user WHERE email='$email' AND password='$password'");
$validation = $query->num_rows;

$role = $query->fetch_object();

if ($validation==1) {
  if ($role->roles=='0') {
    $_SESSION['id_user'] = $role->id_user;
    header('Location:../dashboard.php');
  } elseif ($role->roles=='2') {
    $_SESSION['id_master'] = $role->id_user;
    header('Location:../../master/dashboard.php');
  } else {
    header('Location:../../public/');
  }
} else {
  header('Location:../index.php?id=1');
}
?>
