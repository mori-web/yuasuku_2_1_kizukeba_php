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
        require_once('../common.php');
        $post = sanitize($_POST);
        $staff_code = $post['code']; //前の画面からpostメソッドから受け取ったデータを変数に代入
        $staff_name = $post['name']; //前の画面からpostメソッドから受け取ったデータを変数に代入
        $staff_pass = $post['pass']; //前の画面からpostメソッドから受け取ったデータを変数に代入

        $dsn = 'mysql:dbname=yuasuku_2_1_db;host=localhost;charset=utf8'; //データーベースに接続
        $user = 'root'; //データーベースに接続するためのユーザー名
        $password = 'root'; //データーベースに接続するためのパスワード
        $dbh = new PDO($dsn, $user, $password); //データーベースに接続するためのオブジェクトを作成
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //PDOの属性を設定。PDO::ATTR_ERRMODE: これは、PDOのエラーレポートの方法を設定するための属性です。PDO::ERRMODE_EXCEPTION: これは、PDOがスローする例外を設定するための属性です。

        $sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?'; //SQL文を変数に代入
        $stmt = $dbh->prepare($sql); //SQL文をデーターベースに送るためのオブジェクトを作成
        $data[] = $staff_name; //SQL文の?に入れるデータを配列に代入
        $data[] = $staff_pass; //SQL文の?に入れるデータを配列に代入
        $data[] = $staff_code; //SQL文の?に入れるデータを配列に代入
        $stmt->execute($data); //SQL文をデーターベースに送る

        $dbh = null; //データーベースから切断

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をおかけしています。';
        print $e->getMessage();
        exit();
    }
?>
  修正しました。<br>
  <br>
  <a href="staff_list.php">戻る</a>
</body>
</html>