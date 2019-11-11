<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>
スタッフ追加<br>
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
?>
<form action="staff_add_check.php" method="post">
    スタッフ名を入力してください。<br>
    <input type="text" name="name"><br>
    パスワードを入力してください。<br>
    <input type="text" name="pass1"><br>
    パスワードをもう一度入力してください。<br>
    <input type="text" name="pass2"><br><br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="送信する">
</form>

</body>
</html>

