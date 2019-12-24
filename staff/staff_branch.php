<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

スタッフ一覧<br><br>
<?php 
session_start();
session_regenerate_id(true);//合言葉を都度変える。セッションハイジャック対策。

if(isset($_SESSION['login']) == false){
    echo "ログインされていません。<br>";
    echo '<a href="../staff_login/staff_login.php">ログインする</a><br>';
    exit();
}else{
    echo $_SESSION['staff_name']."さんログイン中<br>";
}

try{
require_once("../common/common.php");
$post = sanitize($_POST);
$staff_code = $post['staffcode'];
if(isset($staff_code) == false){
    header('Location: staff_ng.php');
    exit();
}
if(isset($post['edit'])== true){
    header('Location: staff_edit.php?staffcode='.$staff_code);
    exit();
}elseif(isset($post['delete']) == true){
    header('Location: staff_delete.php?staffcode='.$staff_code);
    exit();
}elseif(isset($post['view']) == true){
    header('Location: staff_view.php?staffcode='.$staff_code);
    exit();
}elseif(isset($post['add']) == true){
    header('Location: staff_add.php');
    exit();
}
}catch(Exception $e){
    echo $e;
    exit();
}?>
</body>
</html>

