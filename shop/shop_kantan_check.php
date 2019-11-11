<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

<?php 
// if(isset($_SESSION['login']) == false){
//     echo "ログインされていません。<br>";
//     echo '<a href="../staff_login/staff_login.html">ログインする</a><br>';
//     exit();
// }else{
//     echo $_SESSION['staff_name']."さんログイン中<br>";
//     echo '<a href="member_logout.php">ログアウト</a><br><br>';
// }
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login']) == false){
    echo "ログインされていません。<br>";
    echo '<a href="./member_login.html">ログインする</a><br>';
    exit();
}else{
    echo "ようこそ、".$_SESSION['member_name']."様<br>";
    echo '<a href="member_logout.php">ログアウト</a><br><br>';
}

$code = $_SESSION['member_code'];

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name, email, postal1, postal2, address, tel FROM dat_member WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$code;
$stmt->execute($data);
$rec=$stmt->fetch(PDO::FETCH_ASSOC);

$dbh=null;
$onamae = $rec['name'];
$email = $rec['email'];
$postal1 = $rec['postal1'];
$postal2 = $rec['postal2'];
$address = $rec['address'];
$tel = $rec['tel'];

echo "お名前<br>".$onamae."<br><br>";
echo "メールアドレス<br>".$email."<br><br>";
echo "郵便番号<br>".$postal1."-".$postal2."<br><br>";
echo "住所<br>".$address."<br><br>";
echo "電話番号<br>".$tel."<br><br>";

?>
<form action="shop_kantan_done.php" method="post">
    <input type="hidden" name="name" value="<?php echo $onamae?>">
    <input type="hidden" name="email" value="<?php echo $email?>">
    <input type="hidden" name="postal1" value="<?php echo $postal1?>">
    <input type="hidden" name="postal2" value="<?php echo $postal2?>">
    <input type="hidden" name="address" value="<?php echo $address?>">
    <input type="hidden" name="tel" value="<?php echo $tel?>"> 
    
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="送信する">
</form>
</body>
</html>

