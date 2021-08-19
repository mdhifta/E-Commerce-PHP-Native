<?php
session_start();
include '../../../config/config.php';

if ($_POST['id_room']=='0') {
  $query = $mysqli->query("SELECT * FROM tb_user WHERE id_user='$_SESSION[id_costumer]'");
  $getName = $query->fetch_object();
  $fullname = $getName->fname." ".$getName->lname;

  if ($mysqli->query("INSERT INTO tb_room(nama_room) VALUES('$fullname')")) {
    $id_room = $mysqli->insert_id;
    if ($mysqli->query("INSERT INTO tb_chat(id_user, id_room, teks) VALUES('$_SESSION[id_costumer]', '$id_room', '$_POST[message]')")) {
      header('Location:../../index.php');
    } else {
      echo "Error balas pesan";
    }
  }
} else {
  if ($mysqli->query("INSERT INTO tb_chat(id_user, id_room, teks) VALUES('$_SESSION[id_costumer]', '$_POST[id_room]', '$_POST[message]')")) {
    header('Location:../../index.php');
  } else {
    echo "Error balas pesan";
  }
}

 ?>
