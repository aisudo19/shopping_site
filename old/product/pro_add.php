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
<p>商品追加</p>
<form action="pro_add_check.php" method="post" enctype="multipart/form-data">
    商品名を入力してください。<br>
    <input type="text" id="name" name="name" style="width: 200px;">
    <br>価格を入力してください。<br>
    <input type="text" id="price" name="price" style="width: 50px;">円<br>
    <br>画像を選んでください。<br>
    <input type="file" id="file" name="gazou" style="width: 400px;"><br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="送信する">
</form>
</body>
</html>