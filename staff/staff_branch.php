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
    if(is_null($_POST['staffcode'])) {
        header('Location:staff_ng.php'); //header関数で指定したURLに遷移する
        exit(); //これ以降の処理を行わない
    }
    $staff_code = $_POST['staffcode'];
    header('Location:staff_disp.php?staffcode='.$staff_code); //header関数で指定したURLに遷移する
    exit(); //これ以降の処理を行わない
}

if (isset($_POST['add'])) {
    $staff_code = $_POST['staffcode'];
    header('Location:staff_add.php?staffcode='.$staff_code); //header関数で指定したURLに遷移する
    exit(); //これ以降の処理を行わない
}

if (isset($_POST['edit'])) {
    if(is_null($_POST['staffcode'])) {
        header('Location:staff_ng.php'); //header関数で指定したURLに遷移する
        exit(); //これ以降の処理を行わない
    }
    $staff_code = $_POST['staffcode'];
    header('Location:staff_edit.php?staffcode='.$staff_code); //header関数で指定したURLに遷移する
    exit(); //これ以降の処理を行わない
}

if (isset($_POST['delete'])) {
    if(is_null($_POST['staffcode'])) {
        header('Location:staff_ng.php'); //header関数で指定したURLに遷移する
        exit(); //これ以降の処理を行わない
    }
    $staff_code = $_POST['staffcode'];
    header('Location:staff_delete.php?staffcode='.$staff_code); //header関数で指定したURLに遷移する
    exit(); //これ以降の処理を行わない
};
