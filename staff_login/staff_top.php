<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

ショップ管理トップメニュー<br><br>
<?php 
session_start();
session_regenerate_id(true);//合言葉を都度変える。セッションハイジャック対策。

if(isset($_SESSION['login']) == false){
    echo "ログインされていません。<br>";
    echo '<a href="../staff_login/staff_login.html">ログインする</a><br>';
    exit();
}else{
    echo $_SESSION['staff_name']."さんログイン中<br>";
}
?>

<a href="../staff/staff_list.php">スタッフ管理</a><br>
<a href="../product/pro_list.php">商品管理</a><br>
<a href="../shop/shop_list.php">商品一覧</a><br>
<a href="../order/order_download.php">注文書ダウンロード</a><br>
<a href="staff_logout.php">ログアウト</a>
</body>
</html>

