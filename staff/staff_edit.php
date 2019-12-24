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
    echo '<a href="../staff_login/staff_login.php">ログインする</a><br>';
    exit();
}else{
    echo $_SESSION['staff_name']."さんログイン中<br>";
}

try{
// require_once("../common/common.php");
// $post = sanitize($_POST);

$staff_code = $_GET['staffcode'];

$dsn='mysql:dbname=tqmsbzgg_shop;host=tqmsbzgg_shop;charset=utf8';
$user='tqmsbzgg_shop';
$password='%RdFsbr)I})8';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name FROM mst_staff WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$staff_name = $rec['name'];

$dbh=null;

?>

<form action="staff_edit_check.php" method="post">
スタッフコード:
<?php echo $staff_code?><br><br>
<input type="hidden" name="staff_code" value="<?php echo $staff_code?>">
スタッフ名<br>
    <input type="text" name="staff_name" value="<?php echo $staff_name?>"><br>
パスワードを入力してください。<br>
    <input type="text" name="pass1"><br>
パスワードをもう一度入力してください。<br>
    <input type="text" name="pass2"><br>

<input type="button" onclick="history.back()" value="戻る">

<input type="submit" value="修正">
</form>
<?php }catch(Exception $e){
    echo $e;
    exit();
}?>
</body>
</html>

