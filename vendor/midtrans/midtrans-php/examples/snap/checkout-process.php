<?php
namespace Midtrans;
session_start();
include '../../../../../config/config.php';

require_once dirname(__FILE__) . '/../../Midtrans.php';

//Set Your server key
Config::$serverKey = "your-key";

// Uncomment for production environment
// Config::$isProduction = true;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;

// Uncomment for append and override notification URL
// Config::$appendNotifUrl = "https://example.com";
// Config::$overrideNotifUrl = "https://example.com";

// get data costumer
$user = $mysqli->query("SELECT * FROM tb_user WHERE id_user='$_SESSION[id_costumer]'");
$getUser = $user->fetch_object();

#get data total
$subtotal = $_SESSION['subtotal']+$_SESSION['price'];
#get data total order
if (!isset($_GET['kupon'])) {
  if ($_POST['kupon']!='null') {
    $_SESSION['mykupon'] = $_POST['kupon'];
    $getKupon = $mysqli->query("SELECT * FROM tb_get_diskon as tgd JOIN tb_kupon as tbk ON tbk.id_kupon=tgd.id_kupon WHERE tgd.id_get_diskon='$_POST[kupon]'");
    $kupon = $getKupon->fetch_object();
    #seletion data kupon to get data
    if ($kupon->jenis_kupon=='persen') {
      $potongan = $subtotal*$kupon->total_diskon/100;
      $total_order = $subtotal-$potongan;
    } else {
      $total_order = $subtotal-$kupon->total_diskon;
    }
  } else {
    $total_order = $subtotal;
  }
} else {
  $total_order = $subtotal;
}


// Required
$transaction_details = array(
  'order_id' => rand(),
  'gross_amount' => $total_order, // no decimal allowed for creditcard
);

// Ongkir
$item1_details = array(
  'id' => '0000',
  'price' => $_SESSION['price'],
  'quantity' => 1,
  'name' => "Biaya Ongkir"
);

if (!isset($_GET['kupon'])) {
  if ($_POST['kupon']!='null') {
    $item3_details = array(
      'id' => '0001',
      'price' => -$total_order,
      'quantity' => 1,
      'name' => "Potongan"
    );
  }
}

foreach($_SESSION['mycart'] as $id_produk => $jumlah){
  $query = $mysqli->query("SELECT * FROM tb_produk as tbp JOIN tb_gambar as tbg ON tbg.id_produk=tbp.id_produk WHERE tbp.id_produk='$id_produk'");
  $get_data = $query->fetch_object();

  $diskon = $mysqli->query("SELECT * FROM tb_dt_diskon as tdd JOIN tb_diskon as tbd ON tbd.id_diskon=tdd.id_diskon WHERE tdd.id_produk='$get_data->id_produk'");
  $getDiskon = $diskon->fetch_object();

  if ($getDiskon!=''):
    $totalHarga = $get_data->harga_produk-$getDiskon->total_diskon;
  else:
    $totalHarga = $get_data->harga_produk;
  endif;
  // data barang
  $item2_details = array(
    'id' => $get_data->id_produk,
    'price' => $totalHarga,
    'quantity' => $jumlah,
    'name' => $get_data->nama_produk
  );
  $data_item[] = $item2_details;
}

# add data to array
array_push($data_item, $item1_details);

if (!isset($_GET['kupon'])) {
  if ($_POST['kupon']!='null') {
    array_push($data_item, $item3_details);
  }
}

// Optional
$item_details = $data_item;

// Pelanggan
$billing_address = array(
  'first_name'    => $getUser->fname,
  'last_name'     => $getUser->lname,
  'address'       => "",
  'city'          => "",
  'postal_code'   => "",
  'phone'         => $getUser->telephone,
  'country_code'  => 'IDN'
);

// Optional
$customer_details = array(
  'first_name'    => $getUser->fname,
  'last_name'     => $getUser->lname,
  'email'         => $getUser->email,
  'phone'         => $getUser->telephone,
  'billing_address'  => $billing_address,
  // 'shipping_address' => $shipping_address
);

// Optional, remove this to display all available payment methods
$enable_payments = array('bank_transfer');

$time = time();
$custom_expiry = array(
  'start_time' => date("Y-m-d H:i:s O",$time),
  'unit' => 'minute',
  'duration'  => 1
);

// Fill transaction details
$transaction = array(
  'enabled_payments' => $enable_payments,
  'transaction_details' => $transaction_details,
  'customer_details' => $customer_details,
  'item_details' => $item_details,
  'expiry' => $custom_expiry,
);

$snapToken = Snap::getSnapToken($transaction);
"snapToken = ".$snapToken;
?>
<!-- end process midtrans -->

<!-- design data user input -->
<!DOCTYPE html>
<html class="no-js" lang="en">
<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'asset/css.php'; ?>
</head>

<body class="page-template belle">
    <div class="pageWrapper">
        <?php include 'asset/topbar.php'; ?>

        <?php include 'asset/navbar.php'; ?>

        <?php include 'asset/mobile.php'; ?>

        <!--Body Content-->
        <div id="page-content">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">Checkout</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->

            <div class="container">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                        <div class="customer-box customer-coupon">
                            <h3 class="font-15 xs-font-13"><i class="anm anm-user-al"></i> please entrie your data</h3>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Your Order</h2>

                            <div class="table-responsive-sm order-table">
                                <table class="bg-white table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Product Name</th>
                                            <th>Price</th>
                                            <th>Size</th>
                                            <th>color</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($_SESSION['mycart'] as $id_produk => $jumlah){ ?>
                                        <?php $query = $mysqli->query("SELECT * FROM tb_produk as tbp JOIN tb_gambar as tbg ON tbg.id_produk=tbp.id_produk WHERE tbp.id_produk='$id_produk'"); ?>
                                        <?php $get_data = $query->fetch_object(); ?>
                                        <tr>
                                            <td class="text-left"><?= $get_data->nama_produk; ?></td>
                                            <td>Rp.<?= number_format($get_data->harga_produk); ?>;-</td>

                                            <!-- get size -->
                                            <?php $id_ukuran = $_SESSION['size'][$id_produk]; ?>
                                            <?php $ukuran_query = $mysqli->query("SELECT * FROM tb_ukuran WHERE id_ukuran='$id_ukuran'"); ?>
                                            <?php $size_get = $ukuran_query->fetch_object(); ?>
                                            <td><?= $size_get->jenis_ukuran; ?></td>

                                            <!-- get colors -->
                                            <?php $id_warna = $_SESSION['colors'][$id_produk]; ?>
                                            <?php $color_query = $mysqli->query("SELECT * FROM tb_warna WHERE id_warna='$id_warna'"); ?>
                                            <?php $get_colors = $color_query->fetch_object(); ?>
                                            <td><?= $get_colors->jenis_warna; ?></td>

                                            <td><?= $jumlah; ?></td>
                                            <td>Rp.<?= number_format($get_data->harga_produk*$jumlah); ?>;-</td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="4" class="text-right">Ongkir </td>
                                            <td>Rp.<?= number_format($_SESSION['price']); ?>;-</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total</td>

                                            <?php if (!isset($_GET['kupon'])) {
                        if ($_POST['kupon']!='null') { ?>
                                            <?php if ($kupon->jenis_kupon=='persen'){ ?>
                                            <td>Rp.<?= number_format($total_order); ?>;- (Potongan Kupon
                                                <?= $kupon->total_diskon; ?>%)</td>
                                            <?php $_SESSION['harga_baru'] = $total_order; ?>
                                            <?php } else { ?>
                                            <td>Rp.<?= number_format($total_order); ?>;- (-Diskon
                                                Rp.<?= number_format($kupon->total_diskon); ?>)</td>
                                            <?php $_SESSION['harga_baru'] = $total_order; ?>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <td>Rp.<?= number_format($total_order); ?>;-</td>
                                            <?php }
                      } else {?>
                                            <td>Rp.<?= number_format($total_order); ?>;-</td>
                                            <?php } ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <hr />

                        <div class="your-payment">
                            <h2 class="payment-title mb-3">address</h2>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion" class="payment-section">
                                        <label for="">Province</label>
                                        <input type="text" readonly value="<?= $_SESSION['getProvince']; ?>">
                                    </div>

                                    <div id="accordion" class="payment-section">
                                        <label for="">City</label>
                                        <input type="text" readonly value="<?= $_SESSION['getCity']; ?>">
                                    </div>
                                </div>

                                <form name="myform" action="add-pembayaran.php" method="post">
                                    <label for="">Address</label>
                                    <div id="accordion" class="payment-section">
                                        <textarea name="detail_address" rows="8" cols="80" required
                                            style="resize:none;"></textarea>
                                    </div>
                                    <input type="hidden" name="json" id="json" value="">
                                    <div id="accordion" class="payment-section">
                                        <input type="text" name="costumer_name" required placeholder="Enter your name">
                                    </div>
                                </form>

                                <div class="order-button-payment">
                                    <button class="btn" value="Place order" id="pay-button">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End Body Content-->

    <?php include 'asset/footer.php'; ?>
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->

    <?php include 'asset/js.php'; ?>
    </div>
</body>
<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->

</html>
<!-- end data user input -->

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="your-key"></script>
<script type="text/javascript">
document.getElementById('pay-button').onclick = function() {
    var resultData = document.getElementById('result-data');

    // SnapToken acquired from previous step
    snap.pay('<?php echo $snapToken?>', {
        // Optional
        onSuccess: function(result) {
            document.getElementById('json').value = JSON.stringify(result, null, 2);
            document.myform.submit();
        },
        // Optional
        onPending: function(result) {
            document.getElementById('json').value = JSON.stringify(result, null, 2);
            document.myform.submit();
        },
        // Optional
        onError: function(result) {
            document.getElementById('json').value = JSON.stringify(result, null, 2);
            document.myform.submit();
        }
    });
};
</script>
</body>

</html>