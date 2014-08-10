<?php
  header("Content-Type:text/html; charset=utf-8");
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    echo '<div class="alert alert-danger" role="alert">';
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
    echo '</div>';
  }

  echo '<div class="alert alert-success" role="alert">資料庫連線成功</div>';

  $mysqli->close();
?>
