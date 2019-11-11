<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

商品追加チェック<br>
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
try{
require_once("../common/common.php");
$post = sanitize($_POST);

$name = $post['name'];
$kakaku = $post['kakaku'];
$gazou_name = $post['gazou'];

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO mst_product (name,price,gazou) VALUES (?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$name;
$data[]=$kakaku;
$data[]=$gazou_name;
$stmt->execute($data);
$dbh=null;

echo $name."を追加しました。<br>";

}catch(Exception $e){
    echo $e;
    exit();
}?>
<a href="pro_list.php">戻る</a><br>
</body>
</html>

