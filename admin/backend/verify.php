<?php
session_start();
include '../../config/config.php';

#get data
$email = $_POST['email'];
$password = $_POST['password'];

$query = $mysqli->query("SELECT * FROM tb_user WHERE email='$email' AND password='$password' AND roles='0'");
$validation = $query->num_rows;

if ($validation==1) {
  $data = $query->fetch_object();
  $_SESSION['id_user'] = $data->id_user;
  header('Location:../dashboard.php');
} else {
  header('Location:../index.php?id=1');
}
 ?>
