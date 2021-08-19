<!-- partial:index.partial.html -->
<div class="chatbox-holder">
  <div class="chatbox chatbox-min">
    <div class="chatbox-top">
      <div class="chatbox-avatar">
        <a href="#"><img src="../vendor/assets/user.png" /></a>
      </div>
      <div class="chat-partner-name">
        <span class="status donot-disturb"></span>
        <a href="#">Lechy Beutique (admin)</a>
      </div>
      <div class="chatbox-icons">
        <a href="javascript:void(0);"><i class="fa fa-minus"></i></a>
        <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
      </div>
    </div>

    <div class="chat-messages">

      <?php if (isset($_SESSION['id_costumer'])): ?>
        <?php
        $verifyChat = $mysqli->query("SELECT * FROM tb_room as tbr JOIN tb_chat as tbc ON tbc.id_room=tbr.id_room WHERE tbc.id_user=".$_SESSION['id_costumer']);
        $getId = $verifyChat->fetch_object();
        ?>

        <?php if ($getId!=''): ?>
          <?php $chat = $mysqli->query("SELECT tbu.fname, tbu.lname, tbu.roles, tbc.*, tbr.* FROM tb_chat as tbc JOIN tb_room as tbr ON tbr.id_room=tbc.id_room JOIN tb_user as tbu ON tbu.id_user=tbc.id_user WHERE tbc.id_room='$getId->id_room' ORDER BY tbc.id_chat ASC"); ?>
          <?php while ($value = $chat->fetch_object()) {
            if ($value->roles==0) { ?>
              <div class="message-box-holder">
                <div class="message-sender">
                  Admin
                </div>
                <div class="message-box message-partner">
                  <?= $value->teks; ?>
                </div>
              </div>
            <?php } else {?>
              <div class="message-box-holder">
                <div class="message-box">
                  <?= $value->teks; ?>
                </div>
              </div>
            <?php }
          } ?>
        <?php else: ?>
          <div class="alert alert-warning col-12">
            Kirim pesan kepada admin sekarang!
          </div>
        <?php endif; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-warning col-12">
        Kirim pesan kepada admin sekarang!
      </div>
    </div>

  <?php endif; ?>

  <?php if (isset($_SESSION['id_costumer'])): ?>
    <form action="backend/chat/addChat.php" method="post">
      <textarea name="message" placeholder="ketik pesan anda" rows="1" style="resize:none;" required></textarea>
      <?php if ($getId!=''): ?>
        <input type="hidden" name="id_room" value="<?= $getId->id_room; ?>">
      <?php else: ?>
        <input type="hidden" name="id_room" value="0">
      <?php endif; ?>
      <div class="chat-input-holder">
        <input type="submit" value="Send" class="message-send"/>
      </div>
    </form>
  <?php else: ?>
    <textarea name="message" placeholder="ketik pesan anda" rows="1" style="resize:none;"></textarea>
    <form action="login.php" method="post">
      <div class="chat-input-holder">
        <input type="submit" value="Send" class="message-send"/>
      </div>
    </form>
  <?php endif; ?>

</div>
</div>
<!-- partial -->
