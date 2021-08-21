<?php
session_start();

$id_produk = $_GET['id'];
// unset($_SESSION['keranjang'][$id_produk]);

$_SESSION['mycart'][$id_produk]--;

if($_SESSION['mycart'][$id_produk] == 0){
  unset($_SESSION['mycart'][$id_produk]);
  unset($_SESSION['colors'][$id_produk]);
  unset($_SESSION['size'][$id_produk]);

}

header('location:../../cart.php');
