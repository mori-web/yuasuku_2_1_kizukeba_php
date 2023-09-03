<?php include '../common/session_shop_check.php' ?>

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

    print '商品一覧<br /><br />';
    while(true) { //データーベースから取得したデータを表示
        $rec = $stmt->fetch(PDO::FETCH_ASSOC); //データーベースから取得した1レコードを、変数に代入
        if($rec == false) { //データーベースから取得したデータがなくなったらループから抜ける
        break;
    }
    print '<a href="shop_product.php?procode='.$rec['code'].'">';
    print $rec['name'].'---';
    print $rec['price'].'円';
    print '</a>';
    print '<br/>';
    }
    print '<br />';
    print '<a href="shop_cartlook.php">カートを見る</a><br />';

  } catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をおかけしています。';
    exit();
  }

?>
</body>
</html>