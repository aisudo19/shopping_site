<?php 
session_start();
session_regenerate_id(true);

if(isset($_SESSION['login']) == false){
    echo "ログインしてください。<br>";
    echo '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}else{
    echo $_SESSION['staff_name']."さんがログイン中です。<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php 
require_once('../common/common.php');
$post = sanintize($_POST);

$pro_name = $post['name'];
$pro_price = $post['price'];
$pro_gazou = $_FILES['gazou'];

if($pro_name ==''){
    echo '商品名が入力されていません。<br>';
}
else{
    echo '商品名：'.$pro_name.'<br>';
}
if($pro_price==''){
    print '商品価格が入力されていません<br>';
}
if(preg_match('/\A[0-9]+\z/', $pro_price)==0){
    echo '価格をきちんと入力して下さい。<br>';
}else{
    echo '価格：'.$pro_price.'円<br>';
}

if($pro_gazou['size'] > 0){
    if($pro_gazou['size'] > 1000000){
        echo '画像が大きすぎます';
    }else{
        move_uploaded_file($pro_gazou['tmp_name'], './gazou/'.$pro_gazou['name']);
        print '<img src="./gazou/'.$pro_gazou['name'].'">';
        print "<br>";
    }
}
if($pro_name == '' || preg_match('/\A[0-9]+\z/', $pro_price == 0) || $pro_price == '' || $pro_gazou['size'] > 1000000){
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
}else{
    echo '上記の商品を追加します。<br>';
    print '<form action="pro_add_done.php" method="post">';
    print '<input type="hidden" name="name" value="'.$pro_name.'">';
    print '<input type="hidden" name="price" value="'.$pro_price.'">';
    print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
    print '<br>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
}

?>
</body>
</html>