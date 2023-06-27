<?php session_start(); ?>
<?php include '../config/config.php'; ?>
<?php $query = $mysqli->query("SELECT tbu.fname, tbu.lname, tbc.*, tbr.* FROM tb_chat as tbc JOIN tb_room as tbr ON tbr.id_room=tbc.id_room JOIN tb_user as tbu ON tbu.id_user=tbc.id_user WHERE tbc.id_room='$_GET[id]'"); ?>
<?php $room = $query->fetch_object(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Room</title>
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
              <h1 class="m-0">Room</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Room</li>
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

            <div class="col-12">
              <!-- DIRECT CHAT -->
              <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                  <h3 class="card-title"><?= $room->nama_room; ?></h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <a class="btn btn-tool" href="masterChat.php" title="Contacts">
                      <i class="fas fa-comments"></i>
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->

                <div>
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <?php $chat = $mysqli->query("SELECT tbu.fname, tbu.lname, tbu.roles, tbc.*, tbr.* FROM tb_chat as tbc JOIN tb_room as tbr ON tbr.id_room=tbc.id_room JOIN tb_user as tbu ON tbu.id_user=tbc.id_user WHERE tbc.id_room='$_GET[id]' ORDER BY tbc.id_chat ASC"); ?>

                      <div id="refresh">


                        <?php while ($value = $chat->fetch_object()) { ?>
                          <?php if ($value->roles == 1) { ?>
                            <!-- cosutmer starts -->
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left"><?= $value->fname; ?> <?= $value->lname; ?></span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <img class="direct-chat-img" src="../vendor/assets/user2.png" alt="message user image">
                              <!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                <?= $value->teks; ?>
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                            <!-- costumer end -->
                          <?php  } else {  ?>
                            <!-- admin start -->
                            <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">Admin (me)</span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <img class="direct-chat-img" src="../vendor/assets/user.png" alt="message user image">
                              <!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                <?= $value->teks; ?>
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                            <!-- admin end -->
                        <?php }
                        } ?>
                      </div>
                    </div>
                    <!--/.direct-chat-messages-->
                  </div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <form>
                    <div class="input-group">
                      <input type="hidden" id="id_room" name="id_room" value="<?= $_GET['id']; ?>">
                      <input type="text" id="message" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-append">
                        <a onclick="submit()" class="btn btn-primary">Send</a>
                      </span>
                    </div>
                  </form>
                </div>
                <!-- /.card-footer-->
              </div>
              <!--/.direct-chat -->
            </div>


          </div>
          <!-- /.row -->
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include 'asset/footer.php'; ?>
  </div>
  <!-- ./wrapper -->

  <?php include "asset/js.php" ?>

  <script>
    function loadDiv() {
      $("#refresh").load(" #refresh");
    }

    setInterval(function() {
      loadDiv();
    }, 1000);


    function submit() {
      var id_room = document.getElementById("id_room").value;
      var message = document.getElementById("message").value;
      var form = $('#refresh');

      $.ajax({
        type: "POST", //type of method
        url: "backend/chat/addChat.php", //your page
        data: {
          id_room: id_room,
          message: message,
        }, // passing the values
        success: function(res) {
          document.getElementById("message").value = null;
          loadDiv();
        }
      });
    }
  </script>
</body>

</html>