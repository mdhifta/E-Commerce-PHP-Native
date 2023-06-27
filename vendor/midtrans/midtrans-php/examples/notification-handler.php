<?php

namespace Midtrans;
include '../../../../config/config.php';

require_once dirname(__FILE__) . '/../Midtrans.php';
Config::$isProduction = false;
Config::$serverKey = 'SB-Mid-server-Eo2bUnoXZ9bOuKtEHfmFywID';
$notif = new Notification();

$transaction = $notif->transaction_status;
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;

if ($transaction == 'capture') {
  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
  if ($type == 'credit_card') {
    if ($fraud == 'challenge') {
      // TODO set payment status in merchant's database to 'Challenge by FDS'
      // TODO merchant should decide whether this transaction is authorized or not in MAP
      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
    } else {
      // TODO set payment status in merchant's database to 'Success'
      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
    }
  }
} else if ($transaction == 'settlement') {
  // TODO set payment status in merchant's database to 'Settlement'

  $verify_transaksi = $mysqli->query("SELECT * FROM tb_transaksi WHERE no_order='$order_id'");
  $verify = $verify_transaksi->num_rows;

  if ($verify==1) {
    $get_id = $verify_transaksi->fetch_object();
    if ($mysqli->query("UPDATE tb_pembayaran SET status='1' WHERE id_transaksi='$get_id->id_transaksi'")) {
      $getProduk = $mysqli->query("SELECT * FROM tb_dt_transaksi WHERE id_transaksi='$get_id->transaksi'");

      while ($values = $getProduk->fetch_object()) {
        $mysqli->query("UPDATE tb_produk SET stok=stok-$values->banyak WHERE id_produk='$values->id_produk'");
      }

      echo "Sukses Transaksi";
    }
  } else {
    if ($mysqli->query("UPDATE tb_topup SET status='1' WHERE no_order='$order_id'")) {
      $getPrice = $mysqli->query("SELECT * FROM tb_topup WHERE no_order='$order_id'");
      $price = $getPrice->fetch_object();
      if ($mysqli->query("UPDATE tb_user SET saldo=saldo+$price->total_topup WHERE id_user='$price->id_user'")) {
        echo "Sukses Topup";
      }
    }
  }

} else if ($transaction == 'pending') {
  // TODO set payment status in merchant's database to 'Pending'
  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
} else if ($transaction == 'deny') {
  // TODO set payment status in merchant's database to 'Denied'

  $verify_transaksi = $mysqli->query("SELECT * FROM tb_transaksi WHERE no_order='$order_id'");
  $verify = $verify_transaksi->num_rows;

  if ($verify==1) {
    $get_id = $verify_transaksi->fetch_object();
    if ($mysqli->query("UPDATE tb_pembayaran SET status='2' WHERE id_transaksi='$get_id->id_transaksi'")) {
      echo "Denied Transaksi Sukses Update";
    }
  } else {
    if ($mysqli->query("UPDATE tb_topup SET status='2' WHERE no_order='$order_id'")) {
      echo "Denied Sukses Update";
    }
  }

  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
} else if ($transaction == 'failure') {

  $verify_transaksi = $mysqli->query("SELECT * FROM tb_transaksi WHERE no_order='$order_id'");
  $verify = $verify_transaksi->num_rows;

  if ($verify==1) {
    $get_id = $verify_transaksi->fetch_object();
    if ($mysqli->query("UPDATE tb_pembayaran SET status='2' WHERE id_transaksi='$get_id->id_transaksi'")) {
      echo "Expired Transaksi Sukses Update";
    }
  } else {
    if ($mysqli->query("UPDATE tb_topup SET status='2' WHERE no_order='$order_id'")) {
      echo "Expired Sukses Update";
    }
  }

  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
} else if ($transaction == 'cancel') {
  // TODO set payment status in merchant's database to 'Denied'

  $verify_transaksi = $mysqli->query("SELECT * FROM tb_transaksi WHERE no_order='$order_id'");
  $verify = $verify_transaksi->num_rows;

  if ($verify==1) {
    $get_id = $verify_transaksi->fetch_object();
    if ($mysqli->query("UPDATE tb_pembayaran SET status='2' WHERE id_transaksi='$get_id->id_transaksi'")) {
      echo "Denied Transaksi Sukses Update";
    }
  } else {
    if ($mysqli->query("UPDATE tb_topup SET status='2' WHERE no_order='$order_id'")) {
      echo "Denied Sukses Update";
    }
  }
  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
}
?>
