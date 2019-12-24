<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

スタッフ情報削除<br><br>
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
require_once('../common/common.php');
$post = sanitize($_POST);

$staff_code = $post['staff_code'];
$staff_name = $post['staff_name'];

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='DELETE FROM mst_staff WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data);

echo "削除しました。<br>";
echo "スタッフ名：".$staff_name."<br>";
$dbh=null;

?>

<?php }catch(Exception $e){
    echo $e;
    exit();
}?>
<a href="staff_list.php">戻る</a>
</body>
</html>

