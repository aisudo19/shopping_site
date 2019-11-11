<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

<?php 
session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()]) == true){
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

?>

ログアウトしました。<br>
<a href="staff_login.html">ログイン画面へ</a>
</body>
</html>

