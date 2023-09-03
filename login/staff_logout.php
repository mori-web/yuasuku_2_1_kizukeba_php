<?php
session_start();  // セッションの開始
$_SESSION=array();  // セッション変数を空にする
if(isset($_COOKIE[session_name()]) == true) 
{
  setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  ログアウトしました。<br>
  <br>
  <a href="staff_login.html">ログイン画面へ</a>
</body>
</html>