<?php

session_start();  // セッションを開始
session_regenerate_id(true); // セッションIDをアクセスの度、毎回変える
if(!isset($_SESSION['login']))  // ログインしているかどうか
{
	print 'ログインされていません。<br />';
	print '<a href="./staff_login.html">ログイン画面へ</a>';
	exit(); // プログラム終了
} 


if (isset($_POST['disp'])) {
    if(is_null($_POST['procode'])) {
        header('Location:pro_ng.php'); //header関数で指定したURLに遷移する
        exit(); //これ以降の処理を行わない
    }
    $pro_code = $_POST['procode'];
    header('Location:pro_disp.php?procode='.$pro_code); //header関数で指定したURLに遷移する
    exit(); //これ以降の処理を行わない
}

if (isset($_POST['add'])) {
    header('Location:pro_add.php'); //header関数で指定したURLに遷移する
    exit(); //これ以降の処理を行わない
}

if (isset($_POST['edit'])) {
    if(is_null($_POST['procode'])) {
        header('Location:pro_ng.php'); //header関数で指定したURLに遷移する
        exit(); //これ以降の処理を行わない
    }
    $pro_code = $_POST['procode'];
    header('Location:pro_edit.php?procode='.$pro_code); //header関数で指定したURLに遷移する
    exit(); //これ以降の処理を行わない
}

if (isset($_POST['delete'])) {
    if(is_null($_POST['procode'])) {
        header('Location:pro_ng.php'); //header関数で指定したURLに遷移する
        exit(); //これ以降の処理を行わない
    }
    $pro_code = $_POST['procode'];
    header('Location:pro_delete.php?procode='.$pro_code); //header関数で指定したURLに遷移する
    exit(); //これ以降の処理を行わない
};
