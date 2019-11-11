<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

カートの中身<br><br>
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
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
}else{
    // if(count($cart)== 0){
    echo "カートに商品はありません。<br>";
    echo '<a href="shop_list.php">戻る</a>';
    exit();
    // }
}

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
<?php
foreach($cart as $key=>$val){
    $sql='SELECT code, name,gazou,price FROM mst_product WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[0] = $val;
    $stmt->execute($data);
    
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name[] = $rec['name'];
    $pro_gazou[] = $rec['gazou'];
    $pro_price[] = $rec['price'];
}
?>
<form action="kazu_change.php" method="post">
<table border="1">
<tr>
    <td>商品名</td>
    <td>商品画像</td>
    <td>価格</td>
    <td>個数</td>
    <td>削除</td>
</tr>
<?php
for($i = 0; $i < count($cart); $i++){
    echo '<tr><td>'.$pro_name[$i].'</td>';
    echo '<td><img src="../product/gazou/'.$pro_gazou[$i].'"></td>';
    echo '<td>'.$kazu[$i] * $pro_price[$i]."円 </td>";
    ?>
    <td><input type="text" name="kazu<?php echo $i;?>" value="<?php echo $kazu[$i]?>"></td>
    <td><input type="checkbox" name="sakujo<?php echo $i?>"></td><br>
<?php
}
 ?>
 </table>

<input type="hidden" name="max" value="<?php echo count($cart)?>">
<input type="submit" value="数量変更">
</form>
<?php
$dbh=null;

}catch(Exception $e){
    echo $e;
    exit();
}?>
<a href="shop_form.php">購入手続きに進む</a><br>
<?php 
    if(isset($_SESSION['member_login'])==true){
        echo '<a href="shop_kantan_check.php">会員簡単注文へ進む</a><br>';
    }
?>
<a href="shop_list.php">戻る</a>
</body>
</html>

