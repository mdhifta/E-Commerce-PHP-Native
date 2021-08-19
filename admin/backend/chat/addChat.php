<?php
session_start();
include '../../../config/config.php';

if ($mysqli->query("INSERT INTO tb_chat(id_user, id_room, teks) VALUES('$_SESSION[id_user]', '$_POST[id_room]', '$_POST[message]')")) {
  header('Location:../../chatRoom.php?id='.$_POST['id_room']);
} else {
  echo "Error balas pesan";
}
 ?>
