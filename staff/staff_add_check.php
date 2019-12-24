<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

スタッフ追加チェック<br>
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

require_once("../common/common.php");
$post = sanitize($_POST);

$name = $post['name'];
$pass1 = $post['pass1'];
$pass2 = $post['pass2'];

$okflg = true;

if($name == ""){
    echo "スタッフ名を入力してください。<br>";
    $okflg = false;
}else{
    echo "スタッフ名:".$name."<br>";
}
if($pass1 == "" || $pass2 == ""){
    echo "パスワードに未入力があります。<br>";
    $okflg = false;
}elseif($pass1 != $pass2){
    echo "パスワードが一致しません。<br>";
    $okflg = false;
}
if($okflg == false){
    echo '<form>';
    echo '<input type="button" onclick="history.back()" value="戻る"></form>';
}else{
    $staff_pass=md5($pass1);?>
    <form action="staff_add_done.php" method="post">
        <input type="hidden" name="name" value="<?php echo $name?>">
        <input type="hidden" name="pass" value="<?php echo $staff_pass?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
<?php } ?>

</body>
</html>

