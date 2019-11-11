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
$post = sanitize($_POST);

$staff_code = $post['code'];
$staff_name = $post['name'];
$staff_pass = $post['pass'];
$staff_pass2 = $post['pass2'];

if($staff_name ==''){
    print 'スタッフ名が入力されていません。<br>';
}
elseif($staff_name != '' && $staff_pass != '' && $staff_pass2 != ''){?>
    <p>修正してよろしいですか？</p>
<br>
<?php
    echo 'スタッフ名：';
    echo $staff_name;
    echo '<br>';
    echo 'パスワード：';
    echo str_repeat("*", mb_strlen($staff_pass, "UTF8"));
    echo '<br>';
}

if($staff_pass==''){
    print 'パスワードが入力されていません。<br>';
}
if($staff_pass2==''){
    print 'パスワード(再確認)が入力されていません。<br>';
}
if($staff_pass != $staff_pass2){
    print 'パスワードが一致しません。<br/>';
}

if($staff_name == '' || $staff_pass == '' || $staff_pass2 == ''){
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
}else{
    $staff_pass = md5($staff_pass);
    print '<form action="staff_edit_done.php" method="post">';
    print '<input type="hidden" name="code" value="'.$staff_code.'">';
    print '<input type="hidden" name="name" value="'.$staff_name.'">';
    print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
    print '<br>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
}

?>

</body>
</html>