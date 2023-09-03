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
    if(isset($_SESSION['cart']) == true) {
      $cart = $_SESSION['cart'];
      $kazu = $_SESSION['kazu'];
      if(in_array($pro_code,$cart)==true)
      {
        print 'その商品はすでにカートに入っています。<br />';
        print '<a href="shop_list.php">商品一覧に戻る</a>';
        exit();
      }
    }
    $cart[] = $pro_code;
    $kazu[] = 1;
    $_SESSION['cart'] = $cart;
    $_SESSION['kazu'] = $kazu;
  } catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をおかけしています。';
    exit();
  }
?>

カートに追加しました。<br>
<br>
<a href="shop_list.php">商品に一覧に戻る</a>

</body>
</html>