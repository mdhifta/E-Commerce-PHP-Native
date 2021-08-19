<?php
session_start();
include '../config/config.php';
 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/cart-variant1.html   11 Nov 2019 12:44:31 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>My Cart</title>
  <meta name="description" content="description">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'asset/css.php'; ?>
</head>
<body class="page-template belle cart-variant1">
  <div class="pageWrapper">

    <?php include 'asset/topbar.php'; ?>

    <?php include 'asset/navbar.php'; ?>

    <?php include 'asset/mobile.php'; ?>

    <!--Body Content-->
    <div id="page-content">
      <!--Page Title-->
      <div class="page section-header text-center">
        <div class="page-title">
          <div class="wrapper"><h1 class="page-width">Shopping Cart</h1></div>
        </div>
      </div>
      <!--End Page Title-->

      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
            <form action="#" method="post" class="cart style2">
              <table>
                <thead class="cart__row cart__header">
                  <tr>
                    <th colspan="2" class="text-center">Product</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-right">Total</th>
                    <th class="action">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>


                  <tr class="cart__row border-bottom line1 cart-flex border-top">
                    <td class="cart__image-wrapper cart-flex-item">
                      <a href="#"><img class="cart__image" src="../vendor/assets/images/product-images/home7-product4.jpg" alt="Minerva Dress black"></a>
                    </td>
                    <td class="cart__meta small--text-left cart-flex-item">
                      <div class="list-view-item__title">
                        <a href="#">Minerva Dress black</a>
                      </div>
                    </td>
                    <td class="cart__price-wrapper cart-flex-item">
                      <span class="money">$526.00</span>
                    </td>
                    <td class="cart__update-wrapper cart-flex-item text-right">
                      <div class="cart__qty text-center">
                        <div class="qtyField">
                          <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon icon-minus"></i></a>
                          <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="1" pattern="[0-9]*">
                          <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon icon-plus"></i></a>
                        </div>
                      </div>
                    </td>
                    <td class="text-right small--hide cart-price">
                      <div><span class="money">$735.00</span></div>
                    </td>
                    <td class="text-center small--hide"><a href="#" class="btn btn--secondary cart__remove" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a></td>
                  </tr>


                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3" class="text-left"><a href="produk.php" class="btn btn-secondary btn--small cart-continue">Continue shopping</a></td>
                  </tr>
                </tfoot>
              </table>
            </form>
          </div>


          <div class="container mt-4">
            <div class="row">

              <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
                <h5>Estimate Shipping and Tax</h5>
                <form action="#" method="post">
                  <div class="form-group">
                    <label for="address_country">Country</label>
                    <select id="address_country" name="address[country]" data-default="United States"><option value="Belgium" data-provinces="[]">Belgium</option>
                      <option value="---" data-provinces="[]">---</option>
                      <option value="Vietnam" data-provinces="[]">Vietnam</option>
                      <option value="Wallis And Futuna" data-provinces="[]">Wallis &amp; Futuna</option>
                      <option value="Western Sahara" data-provinces="[]">Western Sahara</option>
                      <option value="Yemen" data-provinces="[]">Yemen</option>
                      <option value="Zambia" data-provinces="[]">Zambia</option>
                      <option value="Zimbabwe" data-provinces="[]">Zimbabwe</option></select>
                    </div>

                    <div class="form-group">
                      <label>State</label>
                      <select id="address_province" name="address[province]" data-default="">
                        <option value="Wyoming">Wyoming</option>
                        <option value="Armed Forces Americas">Armed Forces Americas</option>
                        <option value="Armed Forces Europe">Armed Forces Europe</option>
                        <option value="Armed Forces Pacific">Armed Forces Pacific</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="address_zip">Postal/Zip Code</label>
                      <input type="text" id="address_zip" name="address[zip]">
                    </div>

                    <div class="actionRow">
                      <div><input type="button" class="btn btn-secondary btn--small" value="Calculate shipping"></div>
                    </div>
                  </form>
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                  <div class="solid-border">
                    <div class="row border-bottom pb-2">
                      <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                      <span class="col-12 col-sm-6 text-right"><span class="money">$735.00</span></span>
                    </div>
                    <div class="row border-bottom pb-2 pt-2">
                      <span class="col-12 col-sm-6 cart__subtotal-title">Tax</span>
                      <span class="col-12 col-sm-6 text-right">$10.00</span>
                    </div>
                    <div class="row border-bottom pb-2 pt-2">
                      <span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
                      <span class="col-12 col-sm-6 text-right">Free shipping</span>
                    </div>
                    <div class="row border-bottom pb-2 pt-2">
                      <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
                      <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">$1001.00</span></span>
                    </div>
                    <input type="submit" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout" value="Proceed To Checkout" disabled="disabled">
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

  <!-- belle/cart-variant1.html   11 Nov 2019 12:44:32 GMT -->
  </html>
