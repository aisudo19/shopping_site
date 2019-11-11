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
    echo '<a href="../staff_login/staff_login.html">ログインする</a><br>';
    exit();
}else{
    echo $_SESSION['staff_name']."さんログイン中<br>";
}

    echo "スタッフが選択されていません。<br>";
?>
<a href="staff_list.php">戻る</a>
</body>
</html>

