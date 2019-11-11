<?php 
session_start();
$_SESSION = array();
//クッキー削除
if(isset($_COOKIE[session_name()]) == true){
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<!-- カートを空にしました。<br> -->
<?php header('Location: shop_list.php'); ?>
<!-- <a href="./shop_list.php">お店トップへ</a><br> -->
</body>
</html>