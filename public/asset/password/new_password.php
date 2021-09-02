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
  <title>Ubah Password</title>
  <meta name="description" content="description">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="description">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" href="../../../vendor/assets/logo.jpg">
  <!-- Plugins CSS -->
  <link rel="stylesheet" href="../../../vendor/assets/css/plugins.css">
  <!-- Bootstap CSS -->
  <link rel="stylesheet" href="../../../vendor/assets/css/bootstrap.min.css">
  <!-- Main Style CSS -->
  <link rel="stylesheet" href="../../../vendor/assets/css/style.css">
  <link rel="stylesheet" href="../../../vendor/assets/css/responsive.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>

</head>
<body class="page-template belle">
  <div class="pageWrapper">

    <!--Body Content-->
    <div id="page-content">
      <!--Page Title-->
      <div class="page section-header text-center">
        <div class="page-title">
          <div class="wrapper"><h1 class="page-width">Ubah Password</h1></div>
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
                    Password Tidak Sama!
                  </div>
                <?php }
              } ?>

              <form method="post" action="../../backend/password/password.php" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="CustomerEmail">Password Baru</label>
                      <input type="password" name="pass1" placeholder="Enter your new password" id="CustomerEmail" autocorrect="off" autocapitalize="off" autofocus="" required>
                    </div>

                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

                    <div class="form-group">
                      <label for="CustomerEmail">Konfirmasi password</label>
                      <input type="password" name="pass2" placeholder="Enter confirm password" id="CustomerEmail" autocorrect="off" autocapitalize="off" autofocus="" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="submit" class="btn mb-3" value="Kirim">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!--End Body Content-->
  </div>
</body>

<!-- belle/register.html   11 Nov 2019 12:22:27 GMT -->
</html>
