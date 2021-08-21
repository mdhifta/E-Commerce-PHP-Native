<?php
session_start();
include '../../../config/config.php';

$verify = $mysqli->query("SELECT * FROM tb_user WHERE id_user='$_SESSION[id_costumer]'");
$validation = $verify->fetch_object();

// get data order
if (isset($_SESSION['mykupon'])) {
  $jumlah = $_SESSION['harga_baru'];
} else {
  $jumlah = $_SESSION['price']+$_SESSION['subtotal'];
}

$totbayar = $jumlah;

$no_order = "SD".$_SESSION['id_costumer']."SLx43";


if ($validation->saldo<$jumlah) {
  header("Location:../../checkout.php?failed=1");
} else {

  // get data costumer
  $id_costumer = $_SESSION['id_costumer'];
  $costumer_name = $_POST['costumer_name'];
  $address = $_POST['detail_address'];

  // data pengiriman
  $longtime = $_SESSION['etd'];
  $courir = $_SESSION['getKurir'];

  // data orde
  $province = $_SESSION['getProvince'];
  $city = $_SESSION['getCity'];

  #get
  $no_virtual = "Your Saldo";
  $bank = "Saldo";

  $verif = $mysqli->query("INSERT INTO tb_transaksi(no_order, id_user, total_transaksi, jasa_pengiriman, durasi_ongkir, alamat_kirim, nama_penerima, provinsi_kirim, kota_kirim, tanggal_transaksi) VALUES('$no_order', '$id_costumer', '$jumlah', '$courir', '$longtime', '$address', '$costumer_name', '$province', '$city', NOW())");
  #mengambil nilai id transaksi
  $id_transaksi = $mysqli->insert_id;

  if ($verif) {
    #set detail ongkir
    foreach($_SESSION['mycart'] as $id_produk => $jumlah){
      $query = $mysqli->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
      $get_data = $query->fetch_object();

      $color_id = $_SESSION['colors'][$id_produk];
      $size_id = $_SESSION['size'][$id_produk];
      $total = $totbayar;

      $mysqli->query("INSERT INTO tb_dt_transaksi(id_transaksi, id_produk, banyak, id_warna, id_ukuran) VALUES('$id_transaksi', '$get_data->id_produk', '$jumlah', '$color_id', '$size_id')");
    }
    #end

    #update kupon
    if (isset($_SESSION['mykupon'])) {
      $mysqli->query("UPDATE tb_get_diskon SET status='1' WHERE id_get_diskon='$_SESSION[mykupon]'");
    }

    if ($mysqli->query("INSERT INTO tb_pembayaran(id_transaksi, total_bayar, bank, no_virtual, status) VALUES('$id_transaksi', '$total', '$bank', '$no_virtual','1')")) {
      unset($_SESSION['mycart']);
      unset($_SESSION['colors']);
      unset($_SESSION['size']);
      unset($_SESSION['getProvince']);
      unset($_SESSION['getCity']);
      unset($_SESSION['etd']);
      unset($_SESSION['getKurir']);
      unset($_SESSION['harga_baru']);
      unset($_SESSION['mykupon']);

      if ($mysqli->query("UPDATE tb_user SET saldo=saldo-$total WHERE id_user='$_SESSION[id_costumer]'")) {
        header("Location:../../../public/payment_list.php");
      }
    } else {
      echo "Gagal menambah data pembayaran!";
    }
  } else {
    echo "Gagal Menambah data transaksi!";
  }
}
?>
