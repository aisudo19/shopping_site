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

<p>スタッフ追加</p>
<form action="staff_add_check.php" method="post">
<div>
    <p>スタッフ名を入力してください。</p>
    <input type="text" id="name" name="name">
</div>
<div>
    <p>パスワードを入力してください。</p>
    <input type="password" id="pass" name="pass">
</div>
<div>
    <p>もう一度パスワードを入力してください。</p>
    <input type="password" id="pass" name="pass2">
</div>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</form>
</body>
</html>