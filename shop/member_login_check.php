<?php

try {
    require_once('../common.php');
    $post = sanitize($_POST);
    $member_email = $post['email'];
    $member_pass = $post['pass'];

    $member_pass = md5($member_pass);

    $dsn = 'mysql:dbname=yuasuku_2_1_db;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT code,name FROM dat_member WHERE email=? AND password=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $member_email;
    $data[] = $member_pass;
    $stmt->execute($data);

    $dbh = null;

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$rec) {
        print 'メールアドレスかパスワードが間違っています。<br />';
        print '<a href="member_login.html"> 戻る</a>';
    } else {
        session_start();  // セッションを開始
        $_SESSION['member_login'] = 1; // ログインOKの証拠を残す
        $_SESSION['member_code'] = $rec['code'];  // メールアドレスを渡す
        $_SESSION['member_name'] = $rec['name']; //　会員名を渡す
        header('Location:shop_list.php'); // ログインOKならstaff_top.phpへ
        exit();
    }
} catch(Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    echo $e->getMessage();
    exit();
}
