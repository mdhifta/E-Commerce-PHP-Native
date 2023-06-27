<?php
session_start();
ob_start();
include '../../../../../config/config.php';

$result = json_decode($_POST['json']);
echo 'RESULT <br><pre>';
var_dump($result);
echo '</pre>' ;

// get data costumer
$id_costumer = $_SESSION['id_costumer'];

// get data order
$jumlah = $result->gross_amount;
$no_order = $result->order_id;

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

echo $no_virtual;
$verif = $mysqli->query("INSERT INTO tb_topup(id_user, total_topup, bank, no_virtual, tanggal_topup, status, no_order) VALUES('$id_costumer', '$jumlah', '$bank', '$no_virtual', NOW(), '0', '$no_order')");

if ($verif) {
  header("Location:../../../../../public/topup.php");
} else {
  echo "Gagal Menambah data transaksi!";
}
?>
