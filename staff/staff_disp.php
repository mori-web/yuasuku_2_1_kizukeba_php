<?php include '../session_check.php' ?>

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

      $staff_code = $_GET['staffcode']; //前の画面からpostメソッドから受け取ったデータを変数に代入

      $dsn = 'mysql:dbname=yuasuku_2_1_db;host=localhost;charset=utf8'; //データーベースに接続
      $user = 'root'; //データーベースに接続するためのユーザー名
      $password = 'root'; //データーベースに接続するためのパスワード
      $dbh = new PDO($dsn, $user, $password); //データーベースに接続するためのオブジェクトを作成
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //PDOの属性を設定
      $sql = 'SELECT name FROM mst_staff WHERE code=?'; //SQL文で全てのレコードを取得して、変数に代入
      $stmt = $dbh->prepare($sql); //SQL文をデーターベースに送るためのオブジェクトを作成
      $data[] = $staff_code; //SQL文の?に入れるデータを配列に代入
      $stmt->execute($data); //SQL文をデーターベースに送る

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      // echo var_dump($rec);
      $staff_name = $rec['name'];

      $dbh = null; //データーベースから切断
  } catch (Exception $e) {
      print 'ただいま障害により大変ご迷惑をおかけしています。';
      exit();
  }
?>

  スタッフ情報詳細<br>
  <br>
  スタッフコード<br>
  <?php print $staff_code; ?>
  <br>
  <br>
  スタッフ名<br>
  <?php print $staff_name; ?>
  <br>
  <br>
  <form>
    <input type="button" value="戻る" onclick="history.back()">
  </form>

</body>
</html>