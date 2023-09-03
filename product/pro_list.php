<?php include '../session_check.php' ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
  <?php
  try {
      $dsn = 'mysql:dbname=yuasuku_2_1_db;host=localhost;charset=utf8'; //データーベースに接続
      $user = 'root'; //データーベースに接続するためのユーザー名
      $password = 'root'; //データーベースに接続するためのパスワード
      $dbh = new PDO($dsn, $user, $password); //データーベースに接続するためのオブジェクトを作成
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //PDOの属性を設定
      $sql = 'SELECT code,name,price FROM mst_product WHERE 1'; //SQL文で全てのレコードを取得して、変数に代入
      $stmt = $dbh->prepare($sql); //SQL文をデーターベースに送るためのオブジェクトを作成
      $stmt->execute(); //SQL文をデーターベースに送る
      $dbh = null; //データーベースから切断

      print '商品一覧<br/></br>';
      print '<form method="post" action="pro_branch.php">';
      while(true) { //データーベースから取得したデータを表示
          $rec = $stmt->fetch(PDO::FETCH_ASSOC); //データーベースから取得した1レコードを、変数に代入
          if($rec == false) { //データーベースから取得したデータがなくなったらループから抜ける
              break;
          }
          print '<input type="radio" id="'. $rec['code'].'" name="procode" value="' . $rec['code'] . '">';
          print '<label for="'. $rec['code'] .  '">'. $rec['name'] .'---'.$rec['price'].'円</label>';
          print '<br/>';
      }
      print '<input type="submit" name="disp" value="詳細">';
      print '<input type="submit" name="add" value="追加">';
      print '<input type="submit" name="edit" value="修正">';
      print '<input type="submit" name="delete" value="削除">';
      print '</form>';

  } catch (Exception $e) {
      print 'ただいま障害により大変ご迷惑をおかけしています。';
      exit();
  }



?>
  <br>
  <a href="../login/staff_top.php">トップメニューへ</a>
</body>
</html>