<?php
session_start();  // セッションを開始
session_regenerate_id(true); // セッションIDをアクセスの度、毎回変える
if(!isset($_SESSION['login']))  // ログインしているかどうか
{
	print 'ログインされていません。<br />';
	print '<a href="../login/staff_login.html">ログイン画面へ</a>';
	exit(); // プログラム終了
} else {
  print $_SESSION['staff_name'];
  print 'さんログイン中<br>';
  print '<br>';
}
?>