<?php 
session_start();
session_regenerate_id(true);

if(isset($_SESSION['login']) == false){
    echo "ログインしてください。<br>";
    echo '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
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
$staff_code = $_POST['staffcode'];
$staff_name = $_POST['staffname'];
// TODO staffnameとstaffcodeを次のページに渡すには、どうしたらいい？

if(isset($_POST['edit']) == true || isset($_POST['delete']) == true || isset($_POST['disp']) == true){
    if(isset($staff_code) == false){
        header('Location: staff_ng.php');
        exit();
    }
}

if(isset($_POST['edit']) == true){
    header('Location: staff_edit.php?staffcode='.$staff_code.'&staffname='.$staff_name);
    exit();
}
elseif(isset($_POST['delete']) == true){
    header('Location: staff_delete.php?staffcode='.$staff_code.'&staffname='.$staff_name);
    exit();
}
elseif(isset($_POST['add']) == true){
    header('Location: staff_add.php');
    exit();
}
elseif(isset($_POST['disp']) == true){
    header('Location: staff_disp.php?staffcode='.$staff_code.'&staffname='.$staff_name);
    exit();
}

?>
<br>
<input type="button" onclick="history.back()" value="戻る">

</body>
</html>