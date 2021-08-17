<?php session_start(); ?>
<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if (isset($_GET['id'])): ?>
    <title>Ubah Produk</title>
  <?php else: ?>
    <title>Tambah Produk</title>
  <?php endif; ?>
  <?php include 'asset/css.php'; ?>
  <style media="screen">
  .gbr {
    float:left;
    width:100px;
    height:100px;
    position:relative;
    padding:5px;
  }
  </style>
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
              <h1 class="m-0">Tambah Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Produk</li>
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
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Produk Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php if (isset($_GET['id'])): ?>
                  <?php
                  $produk_query = $mysqli->query("SELECT * FROM tb_produk WHERE id_produk='$_GET[id]'");
                  $produk = $produk_query->fetch_object();
                  ?>
                  <form action="backend/produk/editProduk.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <?php if (isset($_GET['alert'])): ?>
                          <div class="alert alert-danger" role="alert">
                            Gagal Menambah/Mengubah Produk
                          </div>
                        <?php endif; ?>
                        <label for="exampleInputEmail1">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" value="<?= $produk->nama_produk; ?>" required>
                      </div>

                      <input type="hidden" name="id" value="<?= $produk->id_produk; ?>">

                      <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        <select name="id_kategori" class="form-control" aria-label="Default select example">
                          <?php  $query = $mysqli->query("SELECT * FROM tb_kategori WHERE status='0'");?>
                          <?php while ($value = $query->fetch_object()) {?>
                            <option value="<?= $value->id_kategori; ?>"><?= $value->jenis_kategori; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Stok Produk</label>
                        <input type="number" name="stok" class="form-control" id="exampleInputEmail1" value="<?= $produk->stok; ?>" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Berat Produk (gram)</label>
                        <input type="number" name="berat" class="form-control" id="exampleInputEmail1" value="<?= $produk->berat_produk; ?>" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Harga Produk (1pcs/Rp)</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1" value="<?= $produk->harga_produk; ?>" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tentang Produk</label>
                        <textarea name="deskripsi" class="form-control" rows="4" cols="80" style="resize:none;" value="<?= $produk->deskripsi_produk; ?>" placeholder="<?= $produk->deskripsi_produk; ?>"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Warna Tersedia</label>
                        <!-- checkbox -->
                        <div class="form-check">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Hitam" checked>
                            <label class="form-check-label" for="inlineRadio1">Hitam</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault"  type="checkbox" name="warna[]" value="Putih">
                            <label class="form-check-label" for="inlineRadio2">Putih</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Biru">
                            <label class="form-check-label" for="inlineRadio3">Biru</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="flexCheckDefault" type="checkbox" name="warna[]" value="Merah">
                            <label class="form-check-label" for="inlineRadio3">Merah</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Kuning">
                            <label class="form-check-label" for="inlineRadio3">Kuning</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Hijau">
                            <label class="form-check-label" for="inlineRadio3">Hijau</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Abu-abu">
                            <label class="form-check-label" for="inlineRadio3">Abu-abu</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Biru Tua">
                            <label class="form-check-label" for="inlineRadio3">Biru Tua</label>
                          </div>
                        </div>
                        <!-- end -->
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Ukuran Tersedia</label>
                        <!-- checkbox -->
                        <div class="form-check">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="ukuran[]" value="XL" checked>
                            <label class="form-check-label" for="inlineRadio1">XL</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault"  type="checkbox" name="ukuran[]" value="L">
                            <label class="form-check-label" for="inlineRadio2">L</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="ukuran[]" value="M">
                            <label class="form-check-label" for="inlineRadio3">M</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="flexCheckDefault" type="checkbox" name="ukuran[]" value="S">
                            <label class="form-check-label" for="inlineRadio3">S</label>
                          </div>
                        </div>
                        <!-- end -->
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tambahkan Lampiran (Gambar : jpg, png, jpeg)</label>
                        <br>
                        <div id="preview-image">
                          <?php
                          $img = $mysqli->query("SELECT * FROM tb_gambar WHERE id_produk='$_GET[id]'");
                          while ($value = $img->fetch_object()) { ?>
                            <div class="card" style="width:100px;float:left;margin-left:5px;">
                              <img class="card-img-top" src="../vendor/product_img/<?= $value->filename; ?>" alt="Card image cap">
                              <a href="backend/produk/deleteImg.php?id=<?= $value->id_gambar; ?>&id_produk=<?= $produk->id_produk; ?>" class="btn btn-danger">Hapus</a>
                            </div>
                          <?php } ?>
                        </div>
                        <input type="file" name="gambar[]" class="form-control"id="imageupload" multiple required>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                  </form>
                <?php else: ?>
                  <form action="backend/produk/addProduk.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <?php if (isset($_GET['alert'])): ?>
                          <div class="alert alert-danger" role="alert">
                            Gagal Menambah/Mengubah Produk
                          </div>
                        <?php endif; ?>
                        <label for="exampleInputEmail1">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" placeholder="Nama Produk" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        <select name="id_kategori" class="form-control" aria-label="Default select example">
                          <?php  $query = $mysqli->query("SELECT * FROM tb_kategori WHERE status='0'");?>
                          <?php while ($value = $query->fetch_object()) {?>
                            <option value="<?= $value->id_kategori; ?>"><?= $value->jenis_kategori; ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Stok Produk</label>
                        <input type="number" name="stok" class="form-control" id="exampleInputEmail1" placeholder="Banyak Produk" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Berat Produk (gram)</label>
                        <input type="number" name="berat" class="form-control" id="exampleInputEmail1" placeholder="Berat Produk" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Harga Produk (1pcs/Rp)</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Harga Produk" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tentang Produk</label>
                        <textarea name="deskripsi" class="form-control" rows="4" cols="80" style="resize:none;"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Warna Tersedia</label>
                        <!-- checkbox -->
                        <div class="form-check">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Hitam" checked>
                            <label class="form-check-label" for="inlineRadio1">Hitam</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault"  type="checkbox" name="warna[]" value="Putih">
                            <label class="form-check-label" for="inlineRadio2">Putih</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Biru">
                            <label class="form-check-label" for="inlineRadio3">Biru</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="flexCheckDefault" type="checkbox" name="warna[]" value="Merah">
                            <label class="form-check-label" for="inlineRadio3">Merah</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Kuning">
                            <label class="form-check-label" for="inlineRadio3">Kuning</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Hijau">
                            <label class="form-check-label" for="inlineRadio3">Hijau</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Abu-abu">
                            <label class="form-check-label" for="inlineRadio3">Abu-abu</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="warna[]" value="Biru Tua">
                            <label class="form-check-label" for="inlineRadio3">Biru Tua</label>
                          </div>
                        </div>
                        <!-- end -->
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Ukuran Tersedia</label>
                        <!-- checkbox -->
                        <div class="form-check">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="ukuran[]" value="XL" checked>
                            <label class="form-check-label" for="inlineRadio1">XL</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault"  type="checkbox" name="ukuran[]" value="L">
                            <label class="form-check-label" for="inlineRadio2">L</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" name="ukuran[]" value="M">
                            <label class="form-check-label" for="inlineRadio3">M</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="flexCheckDefault" type="checkbox" name="ukuran[]" value="S">
                            <label class="form-check-label" for="inlineRadio3">S</label>
                          </div>
                        </div>
                        <!-- end -->
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tambahkan Lampiran (Gambar : jpg, png, jpeg)</label>
                        <br>
                        <div id="preview-image"></div>
                        <input type="file" name="gambar[]" class="form-control"id="imageupload" multiple required>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                <?php endif; ?>
              </div>
              <!-- /.card -->
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
  <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
  <script type="text/javascript">
  $("#imageupload").on('change', function () {

    //Get count of selected files
    var countFiles = $(this)[0].files.length;

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#preview-image");
    image_holder.empty();

    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
      if (typeof (FileReader) != "undefined") {

        //loop for each file selected for uploaded.
        for (var i = 0; i < countFiles; i++) {

          var reader = new FileReader();
          reader.onload = function (e) {
            $("<img />", {
              "src": e.target.result,
              "class": "gbr"
            }).appendTo(image_holder);
          }

          image_holder.show();
          reader.readAsDataURL($(this)[0].files[i]);
        }

      } else {
        alert("This browser does not support FileReader.");
      }
    } else {
      alert("Pls select only images");
    }
  });
  </script>
  <?php include "asset/js.php" ?>
</body>
</html>
