<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

商品情報参照<br><br>
<?php 
session_start();
session_regenerate_id(true);//合言葉を都度変える。セッションハイジャック対策。

// if(isset($_SESSION['login']) == false){
//     echo "ログインされていません。<br>";
//     echo '<a href="../staff_login/staff_login.html">ログインする</a><br>';
//     exit();
// }else{
//     echo $_SESSION['staff_name']."さんログイン中<br>";
//     echo '<a href="member_logout.php">ログアウト</a><br><br>';
// }
if(isset($_SESSION['member_login']) == false){
    echo "ログインされていません。<br>";
    echo '<a href="./member_login.html">ログインする</a><br>';
    exit();
}else{
    echo "ようこそ、".$_SESSION['member_name']."様<br>";
    echo '<a href="member_logout.php">ログアウト</a><br><br>';
}
try{

$pro_code = $_GET['procode'];

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code, name,gazou,price FROM mst_product WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];
$pro_gazou = $rec['gazou'];
$pro_price = $rec['price'];
echo "商品名：".$pro_name."<br>";
echo "商品コード:".$pro_code."<br>";
echo "商品価格:".$pro_price."円<br>";
echo '<img src="../product/gazou/'.$pro_gazou.'"><br>';

$dbh=null;

}catch(Exception $e){
    echo $e;
    exit();
}?>

<form action="shop_cartin.php" method="post">
<input type="hidden" name="procode" value="<?php echo $pro_code?>"><br>
数量
<select name='kazu'>
    <?php for($i = 1; $i <= 100; $i++){?>
        <option value=<?php echo $i?>><?php echo $i?></option>
   <?php }?>
</select>
<input type="submit" value="カートに入れる"><br>
</form>

<!-- <a href="shop_cartin.php?procode=<?php echo $pro_code?>">カートに入れる</a><br><br> -->
<a href="shop_list.php">戻る</a>
</body>
</html>

