<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

スタッフ情報修正<br><br>
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

$staff_code = $post['code'];
$staff_name = $post['name'];
$staff_pass = $post['pass'];    

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='UPDATE mst_staff SET name=?, password=? WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[] = $staff_name;
$data[] = $staff_pass;
$data[] = $staff_code;
$stmt->execute($data);

$dbh=null;
echo "修正しました。<br>";

?>
<?php }catch(Exception $e){
    echo $e;
    exit();
}?>
<a href="staff_list.php">戻る</a>
</body>
</html>

