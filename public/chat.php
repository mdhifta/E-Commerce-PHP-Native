<!-- partial:index.partial.html -->
<div class="chatbox-holder">
  <div class="chatbox chatbox-min">
    <div class="chatbox-top">
      <div class="chatbox-avatar">
        <a href="#"><img class="chat-open" src="../vendor/assets/user.png" /></a>
      </div>
      <div class="chat-partner-name">
        <span class="status donot-disturb"></span>
        <a href="#" class="chat-open">DigiShop Cloth (admin)</a>
      </div>
      <div class="chatbox-icons">
        <a href="javascript:void(0);"><i class="fa fa-minus"></i></a>
        <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
      </div>
    </div>

    <div class="chat-messages" id="refresh">
      <?php if (isset($_SESSION['id_costumer'])) : ?>
        <?php
        $verifyChat = $mysqli->query("SELECT * FROM tb_room as tbr JOIN tb_chat as tbc ON tbc.id_room=tbr.id_room WHERE tbc.id_user=" . $_SESSION['id_costumer']);
        $getId = $verifyChat->fetch_object();
        ?>

        <?php if ($getId != '') : ?>
          <?php $chat = $mysqli->query("SELECT tbu.fname, tbu.lname, tbu.roles, tbc.*, tbr.* FROM tb_chat as tbc JOIN tb_room as tbr ON tbr.id_room=tbc.id_room JOIN tb_user as tbu ON tbu.id_user=tbc.id_user WHERE tbc.id_room='$getId->id_room' ORDER BY tbc.id_chat ASC"); ?>
          <?php while ($value = $chat->fetch_object()) {
            if ($value->roles == 0) { ?>
              <div class="message-box-holder">
                <div class="message-sender">
                  Admin
                </div>
                <div class="message-box message-partner">
                  <?= $value->teks; ?>
                </div>
              </div>
            <?php } else { ?>
              <div class="message-box-holder">
                <div class="message-box">
                  <?= $value->teks; ?>
                </div>
              </div>
          <?php }
          } ?>
        <?php else : ?>
          <div class="alert alert-warning col-12">
            Kirim pesan kepada admin sekarang!
          </div>
        <?php endif; ?>
    </div>
  <?php else : ?>
    <div class="alert alert-warning col-12">
      Kirim pesan kepada admin sekarang!
    </div>
  </div>

<?php endif; ?>

<?php if (isset($_SESSION['id_costumer'])) : ?>
  <form>
    <textarea name="message" id="message" placeholder="ketik pesan anda" rows="1" style="resize:none;" required></textarea>

    <?php if ($getId != '') : ?>
      <input type="hidden" id="id_room" name="id_room" value="<?= $getId->id_room; ?>">
    <?php else : ?>
      <input type="hidden" id="id_room" name="id_room" value="0">
    <?php endif; ?>

    <div class="chat-input-holder">
      <a onclick="submit()" class="btn col-12 message-send">submit</a>
    </div>
  </form>
<?php else : ?>
  <textarea name="message" placeholder="ketik pesan anda" rows="1" style="resize:none;"></textarea>
  <form action="login.php" method="post">
    <div class="chat-input-holder">
      <input type="submit" value="Send" class="message-send" />
    </div>
  </form>
<?php endif; ?>

</div>
</div>
<!-- partial -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        $("#refresh").load(" #refresh");
      }
    });
  }
</script>