<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

商品一覧<br><br>
<?php 
session_start();
session_regenerate_id(true);//合言葉を都度変える。セッションハイジャック対策。

if(isset($_SESSION['login']) == false){
    echo "ログインされていません。<br>";
    echo '<a href="../staff_login/staff_login.php">ログインする</a><br>';
    exit();
}else{
    echo $_SESSION['staff_name']."さんログイン中<br>";
    echo '<a href="member_logout.php">ログアウト</a><br><br>';
}
try{

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name,price FROM mst_product WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

while(true){
$rec=$stmt->fetch(PDO::FETCH_ASSOC);

if($rec == false){
    break;
}else{

    echo '<a href="shop_product.php?procode='.$rec['code'].'">';
    echo $rec['name']."---".$rec['price']."円</a><br>";
}
}

}catch(Exception $e){
    echo $e;
    exit();
}?>
<br>
<a href="shop_cartlook.php">カートを見る</a><br>
<a href="clear_cart.php">カートを空にする</a><br>
<a href="../staff_login/staff_top.php">トップメニューへ</a><br>
</body>
</html>

