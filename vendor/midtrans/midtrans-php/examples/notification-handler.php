<?php

namespace Midtrans;
include '../../../../koneksi.php';

require_once dirname(__FILE__) . '/../Midtrans.php';
Config::$isProduction = false;
Config::$serverKey = 'SB-Mid-server-9HojBqZbOz3saQ2VFspC2gtP';
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
  if ($mysqli->query("UPDATE pembayaran SET status='1' WHERE no_order='$order_id'")) {
    #get data id_pembelian
    $query = $mysqli->query("SELECT * FROM pembayaran WHERE no_order='$order_id'");
    $data = $query->fetch_object();
    if ($mysqli->query("UPDATE pembelian SET status_pembelian='200' WHERE id_pembelian='$data->id_pembelian'")) {
      echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
    }
  }
} else if ($transaction == 'pending') {
  // TODO set payment status in merchant's database to 'Pending'
  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
} else if ($transaction == 'deny') {
  // TODO set payment status in merchant's database to 'Denied'
  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
} else if ($transaction == 'expire') {
  if ($mysqli->query("UPDATE pembayaran SET status='0' WHERE no_order='$order_id'")) {
    #get data id_pembelian
    $query = $mysqli->query("SELECT * FROM pembayaran WHERE no_order='$order_id'");
    $data = $query->fetch_object();
    if ($mysqli->query("UPDATE pembelian SET status_pembelian='202' WHERE id_pembelian='$data->id_pembelian'")) {
      echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
    }
  }
  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
} else if ($transaction == 'cancel') {
  // TODO set payment status in merchant's database to 'Denied'
  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
}
?>
