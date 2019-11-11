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
    echo '<a href="../staff_login/staff_login.html">ログインする</a><br>';
    exit();
}else{
    echo $_SESSION['staff_name']."さんログイン中<br>";
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

echo '<form action="pro_branch.php" method="post">';
while(true){
$rec=$stmt->fetch(PDO::FETCH_ASSOC);

if($rec == false){
    break;
}else{
    echo '<input type="radio" name="procode" value="'.$rec['code'].'"<br>';
    echo $rec['name']."_ _ _".$rec['price']."円<br>";
}
}
echo '<input type="submit" name="add" value="追加">';
echo '<input type="submit" name="view" value="参照">';
echo '<input type="submit" name="edit" value="修正">';
echo '<input type="submit" name="delete" value="削除">';
echo '</form>';

}catch(Exception $e){
    echo $e;
    exit();
}?>
<br>
<a href="../staff_login/staff_top.php">トップメニューへ</a><br>
</body>
</html>

