<?php
session_start();
include '../../../../../config/config.php';

$result = json_decode($_POST['json']);
echo 'RESULT <br><pre>';
var_dump($result);
echo '</pre>' ;

// get data costumer
$id_costumer = $_SESSION['id_costumer'];
$costumer_name = $_POST['costumer_name'];
$address = $_POST['detail_address'];

// get data order
$jumlah = $result->gross_amount;
$no_order = $result->order_id;

// data pengiriman
$longtime = $_SESSION['etd'];
$courir = $_SESSION['getKurir'];

// data orde
$province = $_SESSION['getProvince'];
$city = $_SESSION['getCity'];

if (isset($result->permata_va_number)) {
  $bank = "permata";
  $no_virtual = $result->permata_va_number;
} elseif (isset($result->bill_key)) {
  #get
  $no_virtual = '<a href='.$result->pdf_url.'>Klik</a>';
  $bank = "Mandiri";
} else {
  #get number
  $vas_number = $result->va_numbers;
  #get
  $no_virtual = $vas_number[0]->va_number;
  $bank = $vas_number[0]->bank;
}

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

    $mysqli->query("INSERT INTO tb_dt_transaksi(id_transaksi, id_produk, banyak, id_warna, id_ukuran) VALUES('$id_transaksi', '$get_data->id_produk', '$jumlah', '$color_id', '$size_id')");
  }
  #end
  #update kupon
  if (isset($_SESSION['mykupon'])) {
    $mysqli->query("UPDATE tb_get_diskon SET status='1' WHERE id_get_diskon='$_SESSION[mykupon]'");
  }

  if ($mysqli->query("INSERT INTO tb_pembayaran(id_transaksi, total_bayar, bank, no_virtual, status) VALUES('$id_transaksi', '$result->gross_amount', '$bank', '$no_virtual','0')")) {
    unset($_SESSION['mycart']);
    unset($_SESSION['colors']);
    unset($_SESSION['size']);
    unset($_SESSION['getProvince']);
    unset($_SESSION['getCity']);
    unset($_SESSION['etd']);
    unset($_SESSION['getKurir']);
    unset($_SESSION['mykupon']);

    header("Location:../../../../../public/payment_list.php");
  } else {
    echo "Gagal menambah data pembayaran!";
  }
} else {
  echo "Gagal Menambah data transaksi!";
}
?>
