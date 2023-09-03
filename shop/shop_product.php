<?php include '../common/session_shop_check.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php
  try {

      $pro_code = $_GET['procode']; //前の画面からpostメソッドから受け取ったデータを変数に代入
      $dsn = 'mysql:dbname=yuasuku_2_1_db;host=localhost;charset=utf8'; //データーベースに接続
      $user = 'root'; //データーベースに接続するためのユーザー名
      $password = 'root'; //データーベースに接続するためのパスワード
      $dbh = new PDO($dsn, $user, $password); //データーベースに接続するためのオブジェクトを作成
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //PDOの属性を設定
      $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?'; //SQL文で全てのレコードを取得して、変数に代入
      $stmt = $dbh->prepare($sql); //SQL文をデーターベースに送るためのオブジェクトを作成
      $data[] = $pro_code; //SQL文の?に入れるデータを配列に代入
      $stmt->execute($data); //SQL文をデーターベースに送る

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $pro_name = $rec['name'];
      $pro_price = $rec['price'];
      $pro_gazou_name = $rec['gazou'];

      $dbh = null; //データーベースから切断

      if ($pro_gazou_name == '') {
          $disp_gazou = '';
      } else {
          $disp_gazou = '<img src="../product/gazou/'. $pro_gazou_name.'">';
      }
      print '<a href="shop_cartin.php?procode='.$pro_code.'">カートに入れる</a><br /><br />';
  } catch (Exception $e) {
      print 'ただいま障害により大変ご迷惑をおかけしています。';
      exit();
  }
?>

  商品情報詳細<br>
  <br>
  商品コード<br>
  <?php print $pro_code; ?>
  <br>
  <br>
  商品名<br>
  <?php print $pro_name; ?>
  <br>
  価格<br>
  <?php print $pro_price; ?>円
  <br>
  <?php print $disp_gazou; ?>
  <br>
  <br>
  <form>
    <input type="button" value="戻る" onclick="history.back()">
  </form>

</body>
</html>