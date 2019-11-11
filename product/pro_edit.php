<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

商品情報修正<br><br>
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
$pro_code = $_GET['procode'];

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name,price,gazou FROM mst_product WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];
$pro_price = $rec['price'];
$gazou_old = $rec['gazou'];

if($gazou_old == ''){
    $gazou_disp = '';
}else{
    $gazou_disp = $gazou_old;
    echo '<img src="./gazou/'.$gazou_old.'"><br>';

}
$dbh=null;

?>

<form action="pro_edit_check.php" method="post" enctype="multipart/form-data">
商品コード:
<?php echo $pro_code?><br><br>
<input type="hidden" name="pro_code" value="<?php echo $pro_code?>">
商品名<br>
    <input type="text" name="pro_name" value="<?php echo $pro_name?>"><br>
商品価格<br>
    <input type="text" name="pro_price" value="<?php echo $pro_price?>"><br>
画像ファイル<br>
<input type="hidden" name="gazou_old" value="<?php echo $gazou_old?>"><br>
<input type="file" name="gazou" style="width=400px" value="<?php echo $gazou_disp?>"><br>
<input type="button" onclick="history.back()" value="戻る">

<input type="submit" value="修正">
</form>
<?php }catch(Exception $e){
    echo $e;
    exit();
}?>
</body>
</html>

