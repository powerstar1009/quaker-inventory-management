<?php
  header("Content-Type:text/html; charset=utf-8");
  $con=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_errno()) {
    echo '<div class="alert alert-danger" role="alert">';
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
    echo '</div>';
  }

  mysqli_query($con, "SET NAMES 'utf8'");
  $result = mysqli_query($con,"SELECT * FROM `configurations`");

  mysqli_close($con);
?>
