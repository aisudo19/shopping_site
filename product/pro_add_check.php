<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

商品追加チェック<br>
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
require_once("../common/common.php");
$post = sanitize($_POST);

$name = $post['name'];
$kakaku = $post['kakaku'];
$gazou = $_FILES['gazou'];
$okflg = true;

if($name == ""){
    echo "商品名を入力してください。<br>";
    $okflg = false;
}else{
    echo "商品名:".$name."<br>";
}
if($kakaku == ""){
    echo "商品価格を入力してください。<br>";
    $okflg = false;
}
if(preg_match('/\A[0-9]+\z/',$kakaku) == false){
    echo "価格に正しく数字を入力してください。<br>";
    $okflg = false;
}else{
    echo "価格：".$kakaku."円<br>";
}
if($gazou['size'] > 0){
    if($gazou['size'] > 1000000){
        echo "画像が大きすぎます。<br>";
        $okflg = false;
    }else{
        move_uploaded_file($gazou['tmp_name'], './gazou/'.$gazou['name']);
        echo '<img src="./gazou/'.$gazou['name'].'">';
    }
}
if($okflg == false){
    echo '<form>';
    echo '<input type="button" onclick="history.back()" value="戻る"></form>';
}else{?>
    <form action="pro_add_done.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="name" value="<?php echo $name?>">
        <input type="hidden" name="kakaku" value="<?php echo $kakaku?>">
        <input type="hidden" name="gazou" value="<?php echo $gazou['name']?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
<?php } ?>

</body>
</html>

