<?php
include '../../../config/config.php';

#add produk data
if ($mysqli->query("INSERT INTO tb_produk(nama_produk, stok, harga_produk, berat_produk, id_kategori, deskripsi_produk, status) VALUES('$_POST[nama_produk]', '$_POST[stok]', '$_POST[harga]', '$_POST[berat]', '$_POST[id_kategori]', '$_POST[deskripsi]', '0')")) {
  #get data id
  $id_produk = $mysqli->insert_id;

  #menambahkan data warna
  foreach ($_POST['warna'] as $value) {
    $mysqli->query("INSERT INTO tb_warna(id_produk, jenis_warna) VALUES('$id_produk', '$value')");
  }

  #menambahkan ukuran
  foreach ($_POST['ukuran'] as $value) {
    $mysqli->query("INSERT INTO tb_ukuran(id_produk, jenis_ukuran) VALUES('$id_produk', '$value')");
  }

  #menambah gambar
  $jenis_file	= array('png','jpg', 'jpeg');
  $images = $_FILES['gambar'];

  foreach ($_FILES['gambar']['name'] as $key => $value) {
    $filename = $value;
    $file_tmp = $images['tmp_name'][$key];

    $explode = explode('.', $value);
    $validation = strtolower(end($explode));

    if (in_array($validation, $jenis_file)===TRUE) {
      if (move_uploaded_file($file_tmp, '../../../vendor/product_img/'.$filename)) {
        $mysqli->query("INSERT INTO tb_gambar(id_produk, filename) VALUES('$id_produk', '$value')");
      }
    }
  }

  #pergi ke halaman list
  header("Location:../../masterProduk.php");
} else {
  echo "Gagal Memasukan Data";
}

?>
