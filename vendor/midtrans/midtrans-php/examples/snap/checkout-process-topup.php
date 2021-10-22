<?php
namespace Midtrans;
session_start();
include '../../../../../config/config.php';

require_once dirname(__FILE__) . '/../../Midtrans.php';

//Set Your server key
Config::$serverKey = "server-key";

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

// Required
$transaction_details = array(
  'order_id' => rand(),
  'gross_amount' => $_POST['saldo'] // no decimal allowed for creditcard
);

$item2_details = array(
  'id' => 0,
  'price' => $_POST['saldo'],
  'quantity' => 1,
  'name' => "ISI SALDO"
);

// Optional
$item_details = array($item2_details);

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
          <div class="wrapper"><h1 class="page-width">Checkout</h1></div>
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
                      <th>Total</th>
                      <th>qty</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-left">TOP UP SALDO</td>
                      <td>Rp.<?= number_format($_POST['saldo']); ?>;-</td>
                      <td>1</td>
                      <td>Rp.<?= number_format($_POST['saldo']); ?>;-</td>
                    </tr>
                  </tbody>
                  <tfoot class="font-weight-600">
                    <tr>
                      <td colspan="3" class="text-right">Total</td>
                      <td>Rp.<?= number_format($_POST['saldo']); ?>;-</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <hr />

            <div class="your-payment">
              <h2 class="payment-title mb-3">Confirmation</h2>
              <div class="payment-method">

                <form name="myform" action="add-topup.php" method="post">
                  <input type="hidden" name="saldo" value="<?= $_POST['saldo']; ?>">
                  <input type="hidden" name="json" id="json" value="">
                </form>

                <div class="order-button-payment">
                  <button class="btn" value="Place order" id="pay-button">Top up</button>
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

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="client-key"></script>
<script type="text/javascript">
document.getElementById('pay-button').onclick = function(){
  var resultData = document.getElementById('result-data');

  // SnapToken acquired from previous step
  snap.pay('<?php echo $snapToken?>', {
    // Optional
    onSuccess: function(result){
      document.getElementById('json').value = JSON.stringify(result, null, 2);
      document.myform.submit();
    },
    // Optional
    onPending: function(result){
      document.getElementById('json').value = JSON.stringify(result, null, 2);
      document.myform.submit();
    },
    // Optional
    onError: function(result){
      document.getElementById('json').value = JSON.stringify(result, null, 2);
      document.myform.submit();
    }
  });
};
</script>
</body>
</html>
