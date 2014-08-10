<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>庫存管理</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php require 'config.php';?>
  </head>
  <body>
  <div class="container">
    <?php include 'db_test.php';?>
    <h1>庫存管理</h1><hr/>
    <div class="panel panel-default">
    <div class="panel-heading">庫存總覽</div>
    <div class="panel-body">
        <table class="table">
            <tr><td>產品類別</td><td>料號</td><td>品名</td><td>規格</td><td>庫存總數</td>
            <td>入庫日期</td><td>入庫數量</td><td>有效日期</td><td>出庫日期</td>
            <td>領用人</td><td>領用數量</td><td>領用理由</td>
            <td>更新時間</td></tr>
        </table>
    </div>
    </div>
    <div class="panel panel-default">
    <!--<div class="panel-heading">庫存總覽</div>-->
    <div class="panel-body">
    <ul id="navTab" class="nav nav-tabs">
       <li class="active">
          <a href="#home" data-toggle="tab">庫存管理頁面</a>
       </li>
       <li><a href="#admin" data-toggle="tab">控制設定</a></li>
    </ul>

    <div id="myTabContent" class="tab-content">
       <div class="tab-pane fade in active" id="home">
        <br/>
        <form class="form-inline" role="form" id="product_form" action="insert.php" method="post"><!---->
        <!--<div class="form-inline" role="form" id="product_form">-->
          <div class="form-group">
            <input type="text" class="form-control" placeholder="產品類別" name="pgroup">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="產品名稱" name="pname">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="規格" name="pdescription">
          </div>
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" type="date" placeholder="製造日期" name="pmfd">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" type="date" placeholder="有效日期" name="pexp">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="數量" name="pquantity">
            </div>
          </div>
          <select class="form-control" id="pstatus">
            <option>入庫</option>
            <option>取出</option>
          </select>
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="使用者" name="puser">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input class="form-control" type="date" placeholder="入取時間" name="pdatetime">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" id="submit">送出</button>
        <!--</div>-->
        </form>

        <hr/>
        <div class="row">
          <div class="col-md-4">
        <!-- Split button -->
        <div class="btn-group">
          <button type="button" class="btn btn-default">動作</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">編輯</a></li>
            <li><a href="#">刪除</a></li>
            <li class="divider"></li>
            <li><a href="#"></a></li>
          </ul>
        </div> 
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
        <div class="input-group">
        <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
        <input type="text" class="form-control" placeholder="搜尋">
        </div>
          </div>
        </div>
        <br/>
        <table class="table">
            <tr><td>選擇</td><td>產品類別</td><td>產品名稱</td><td>規格</td><td>製造日期</td><td>效期</td><td>數量</td><td>狀態</td>
            <td>使用者</td><td>入取時間</td><td>更新時間</td></tr>
    <?php
      $con=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

      // Check connection
      if (mysqli_connect_errno()) {
        echo '<div class="alert alert-danger" role="alert">';
        die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
        echo '</div>';
      }
      mysqli_query($con, "SET NAMES 'utf8'");
      $result = mysqli_query($con,"SELECT * FROM `logs`");
      while($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td><input type='checkbox'></td>";
          echo "<td>" . $row['group'] ."</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['description'] . "</td>";
          echo "<td>" . $row['mfd'] ."</td>";
          echo "<td>" . $row['exp'] ."</td>";
          echo "<td>" . $row['quantity'] . "</td>";
          echo "<td>" . $row['status'] . "</td>";
          echo "<td>" . $row['user'] . "</td>";
          echo "<td>" . $row['datetime'] . "</td>";
          echo "<td>" . $row['record_time'] . "</td>";
          echo "</tr>";
      }
      mysqli_close($con);
    ?>
        </table>
        <ul class="pagination">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
           </div>
           <div id="admin" class="tab-pane fade">
              <br/><br/>
              <div id="login_admin">
                  <h4>請先登入才能設定控制項</h4>
                  <div class="form-inline" role="form" id="product_form">
                      <div class="form-group">
                        <div class="input-group">
                          <input class="form-control" type="text" placeholder="管理者帳號" name="admin_user">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <input class="form-control" type="password" placeholder="密碼" name="admin_pass">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" id="submit">送出</button>
                  </div>
              </div>
              <div id="console">
              Test
              </div>
           </div>
        </div>


    </div>
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
