<?php
	session_start();
	session_regenerate_id(true);

	require_once('../common.php');

	$post=sanitize($_POST);

	$max=$post['max'];  //hiddenで送られてきた値を変数に代入
	for($i=0;$i<$max;$i++)  //for文で回している
	{
		if(preg_match("/\A[0-9]+\z/", $post['kazu'.$i])==0)
    {
      print '数量に誤りがあります。<br>';
      print '<a href="shop_cartlook.php">カートに戻る</a>';
      exit();
    }
    if($post['kazu'.$i]<1 || 10<$post['kazu'.$i])
    {
      print '数量は必ず1個以上、10個までです。<br>';
      print '<a href="shop_cartlook.php">カートに戻る</a>';
      exit();
    }
		$kazu[]=$post['kazu'.$i];
	}

	$cart=$_SESSION['cart']; //カートの中身を取り出す

	for($i=$max;0<=$i;$i--)
	{
		if(isset($_POST['sakujo'.$i])==true)  //削除ボタンが押されたら
		{
			array_splice($cart,$i,1);
			array_splice($kazu,$i,1);
		}
	}

	$_SESSION['cart']=$cart;
	$_SESSION['kazu']=$kazu;

	header('Location:shop_cartlook.php');
?>