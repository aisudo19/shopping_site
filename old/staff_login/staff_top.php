<?php 
session_start();
session_regenerate_id(true);

if(isset($_SESSION['login']) == false){
    echo "ログインしてください。<br>";
    echo '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}else{
    echo $_SESSION['staff_name']."さんがログイン中です。<br>";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
ショップ管理トップメニュー<br>
<br>
<a href="../staff/staff_list.php">スタッフ管理</a><br>
<a href="../product/pro_list.php">商品管理</a><br>

<a href="./staff_login.html">ログイン画面へ</a><br>
<a href="./staff_logout.php">ログアウトする</a><br>
<a href="../order/order_download.php">注文ダウンロード</a>
</body>
</html>