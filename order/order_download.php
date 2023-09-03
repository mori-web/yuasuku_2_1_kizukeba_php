<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    require_once('../common.php');
  ?>  
  ダウンロードしたい注文日を選んでください。<br />
  <form method="post" action="order_download_done.php">
    <?php pulldown_year(); ?>
    年
    <?php pulldown_month(); ?>
    月
    <?php pulldown_day(); ?>
    日<br />
    <br />
    <input type="submit" value="ダウンロードへ">
  </form>

</body>
</html>