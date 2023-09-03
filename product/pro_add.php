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

  商品追加<br>
  <br>
  
  <form action="pro_add_check.php" method="post" enctype="multipart/form-data">
    商品名を入力してください<br>
    <input type="text" name="name" style="width:200px"><br>
    画像を選んでください。<br>
    <input type="file" name="gazou" style="width:400px">
    <br>
    価格を入力してください<br>
    <input type="text" name="price" style="width:50px"><br>
    <br>
    <input type="button" onclick="history.back()" value="戻る">  
    <input type="submit" value="ＯＫ">
  </form>
</body>

</html>