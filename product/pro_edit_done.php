<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

商品編集完了<br>
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
$code = $post['code'];
$gazou_old = $post['gazou_old'];
$gazou = $post['gazou'];

//もし画像が変更されていなかったら、古い画像が消えないようにする
if($gazou == ''){
    $gazou = $gazou_old;
}
if($gazou_old !=''){
    //もし古い画像が残っていたら、フォルダから削除する
    unlink('./gazou/'.$gazou_old);
}
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='UPDATE mst_product SET name=?, price=?, gazou=? WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$name;
$data[]=$kakaku;
$data[]=$gazou;
$data[]=$code;
$stmt->execute($data);
$dbh=null;

echo "修正しました。<br>";
echo "商品名：".$name."<br>";
echo "商品価格:".$kakaku."<br>";
echo '<img src="./gazou/'.$gazou.'"><br>';

}catch(Exception $e){
    echo $e;
    exit();
}?>
<a href="pro_list.php">戻る</a><br>
</body>
</html>

