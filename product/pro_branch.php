<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

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

// 追加の場合はcodeがないので、if判定
if(isset($post['procode'])){
    $pro_code = $post['procode'];
}
if(isset($post['add']) == true){
    header('Location: pro_add.php');
    exit();
}
if(isset($pro_code) == false){
    header('Location: pro_ng.php');
    exit();
}
if(isset($post['edit'])== true){
    header('Location: pro_edit.php?procode='.$pro_code);
    exit();
}elseif(isset($post['delete']) == true){
    header('Location: pro_delete.php?procode='.$pro_code);
    exit();
}elseif(isset($post['view']) == true){
    header('Location: pro_view.php?procode='.$pro_code);
    exit();
}
}catch(Exception $e){
    echo $e;
    exit();
}?>
</body>
</html>

