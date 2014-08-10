<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>物流管理</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php
  $arr = $_POST;
/*
  foreach ($arr as $key => $value) {
    echo "Array:";
    echo $value;
    echo "<br/>";
  }
*/
  DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'test');
  $con=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  // Check connection
  if (mysqli_connect_errno()) {
    echo '<div class="alert alert-danger" role="alert">';
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
    echo '</div>';
  }
  mysqli_query($con, "SET NAMES 'utf8'");
  $sql ="INSERT INTO `logs`(`group`, `name`, `description`, `mfd`, `exp`, `quantity`, `status`, `user`, `datetime`) VALUES ('".$arr['pgroup']."', '".$arr['pname']."', '".$arr['pdescription']."', '".$arr['pmfd']."', '".$arr['pexp']."', '".$arr['pquantity']."', '".$arr['pstatus']."', '".$arr['puser']."', '".$arr['pdatetime']."')";
  echo $sql."<br/>";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo("OK");
  } else {
    echo("Failed");
  }
  mysqli_close($con);
?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
