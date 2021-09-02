<?php
session_start();
include '../../../config/config.php';

$id_produk = $_POST['id_produk'];
$comment = $_POST['comment'];
$id_user = $_SESSION['id_costumer'];

if ($mysqli->query("INSERT INTO tb_komentar(id_user, id_produk, komentar, tanggal_komentar) VALUES('$id_user', '$id_produk', '$comment', NOW())")) {
  header("Location:../../detail.php?id=".$id_produk);
}

 ?>
