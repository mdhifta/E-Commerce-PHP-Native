<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add User</title>
  <?php include 'asset/css.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- navbar start -->
    <?php include 'asset/navbar.php'; ?>
    <!-- navbar end -->

    <!-- navbar start -->
    <?php include 'asset/sidebar.php'; ?>
    <!-- end navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add User (admin)</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add User (admin)</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">

            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New Admin</h3>
                </div>

                <div class="card-body">
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
                        Sukses membuat akun!
                      </div>
                    <?php } ?>
                  <?php } ?>
                </div>

                <!-- /.card-header -->
                <form method="post" action="backend/addUser.php" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                  <div class="card-body">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="Enter your first name" id="FirstName" autofocus="" required>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Enter your last name" id="LastName" required>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="CustomerEmail">Telephone</label>
                        <input type="number" class="form-control" name="telp" placeholder="Enter your telephone" id="CustomerEmail" autocorrect="off" autocapitalize="off" autofocus="" required>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="CustomerEmail">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" id="CustomerEmail" autocorrect="off" autocapitalize="off" autofocus="" required>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="CustomerPassword">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" id="CustomerPassword" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="submit" class="btn btn-info" value="Create">
                    </div>
                  </div>
                </form>
              </div>

            </div>
            <!-- /.row -->
          </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <?php include 'asset/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <?php include "asset/js.php" ?>
  </body>
  </html>
