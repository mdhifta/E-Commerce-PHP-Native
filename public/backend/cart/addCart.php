<?php
session_start();
include '../../../config/config.php';

// mengambil id_produk dari url
$id_produk = $_GET['id'];


$query = $mysqli->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
$get_data = $query->fetch_object();

if($_SESSION['mycart'][$id_produk]>=$get_data->stok){
  // Dialihkan ke halaman keranjang
  echo "<script>alert('Produk melebihi batas stok!');</script>";
  echo "<script>location='../../cart.php';</script>";
} else {

  // jika sudah ada produk di keranjang, maka produk itu jumlahnya +1
  if(isset($_SESSION['mycart'][$id_produk])){
    $_SESSION['mycart'][$id_produk] += 1;
  }
  // selain itu (belum ada di keranjang), maka produk itu dianggap dibeli 1
  else{
    $_SESSION['mycart'][$id_produk] = 1;
    $_SESSION['colors'][$id_produk] = $_GET['color'];
    $_SESSION['size'][$id_produk] = $_GET['size'];
  }

  // Dialihkan ke halaman keranjang
  echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
  header('location:../../cart.php');

}
