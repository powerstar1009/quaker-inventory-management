<?php
/*
  header("Content-Type:text/html; charset=utf-8");
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    echo '<div class="alert alert-danger" role="alert">';
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
    echo '</div>';
  }

  echo '<div class="alert alert-success" role="alert">資料庫連線成功</div>';

  $mysqli->close();
*/
    require 'db.php';
    require 'products.php';
    require 'inventories.php';
    require 'exports.php';
    require 'imports.php';
    $db = new DB(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    //$i = new Products($db);
    //$i->create('G', '#123', 'NA', '123cm');
    //$i->read();
    //$i->update(1, "TES", NULL, "1234CM");
    //$i->delete(1);
    //$i = new Inventories($db);
    //$i->create(2, 'E2014-10-22-1', 1000);
    //$i->read();
    //$i->update(10, "", "123");
    //$i->delete(9);
    //$i = new Exports($db);
    //$i->create(10, '2014-10-22', 3000, 'Joe', 'Non');
    //$i->read();
    //$i->update(2, "", "123", "", "Test");
    //$i->delete(1);
    $i = new Imports($db);
    $i->create(10, '2014-10-22', 3000);
    $i->read();
    $i->update(1, "", "2230");
    $i->delete(1);
?>
