<?php
session_start();
include '../config/config.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/register.html   11 Nov 2019 12:22:27 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Register</title>
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
          <div class="wrapper"><h1 class="page-width">Create an Account</h1></div>
        </div>
      </div>
      <!--End Page Title-->

      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
            <div class="mb-4">
              <?php if (isset($_GET['alert'])) { ?>
                <?php if ($_GET['alert']==1){ ?>
                  <div class="alert alert-danger" role="alert">
                    Email sudah digunakan!
                  </div>
                <?php } elseif ($_GET['alert']==2) { ?>
                  <div class="alert alert-danger" role="alert">
                    Gagal membuat akun!
                  </div>
                <?php }  else {?>
                  <div class="alert alert-success" role="alert">
                    Sukses membuat akun! <a href="login.php">Login sekarang</a>
                  </div>
                <?php } ?>
              <?php } ?>

              <form method="post" action="backend/register.php" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="FirstName">First Name</label>
                      <input type="text" name="fname" placeholder="Enter your first name" id="FirstName" autofocus="" required>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="LastName">Last Name</label>
                      <input type="text" name="lname" placeholder="Enter your last name" id="LastName" required>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="CustomerEmail">Telephone</label>
                      <input type="number" name="telp" placeholder="Enter your telephone" id="CustomerEmail" autocorrect="off" autocapitalize="off" autofocus="" required>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="CustomerEmail">Email</label>
                      <input type="email" name="email" placeholder="Enter your email" id="CustomerEmail" autocorrect="off" autocapitalize="off" autofocus="" required>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="CustomerPassword">Password</label>
                      <input type="password" name="password" placeholder="Enter your password" id="CustomerPassword" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="submit" class="btn mb-3" value="Create">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!--End Body Content-->

    <?php include 'asset/footer.php'; ?>

    <?php include 'asset/js.php'; ?>
  </div>
</body>

<!-- belle/register.html   11 Nov 2019 12:22:27 GMT -->
</html>
