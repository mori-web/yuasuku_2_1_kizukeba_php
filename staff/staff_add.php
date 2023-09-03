<?php include '../session_check.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  スタッフ追加<br>
  <br>
  
  <form action="staff_add_check.php" method="post">
    スタッフ名を入力してください<br>
    <input type="text" name="name" style="width:200px"><br>
    パスワードを入力してください<br>
    <input type="password" name="pass" style="width:100px"><br>
    パスワードをもう一度入力してください<br>
    <input type="password" name="pass2" style="width:100px"><br>
    <br>
    <input type="button" onclick="history.back()" value="戻る">  
    <input type="submit" value="ＯＫ">
  </form>
</body>

</html>