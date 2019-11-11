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
$pro_code = $_POST['procode'];
$pro_name = $_POST['proname'];

if(isset($_POST['edit']) == true || isset($_POST['delete']) == true || isset($_POST['disp']) == true){
    if(isset($pro_code) == false){
        header('Location: pro_ng.php');
        exit();
    }
}

if(isset($_POST['edit']) == true){
    header('Location: pro_edit.php?procode='.$pro_code.'&proname='.$pro_name);
    exit();
}
elseif(isset($_POST['delete']) == true){
    header('Location: pro_delete.php?procode='.$pro_code.'&proname='.$pro_name);
    exit();
}
elseif(isset($_POST['add']) == true){
    header('Location: pro_add.php');
    exit();
}
elseif(isset($_POST['disp']) == true){
    header('Location: pro_disp.php?procode='.$pro_code.'&proname='.$pro_name);
    exit();
}

?>
<br>
<input type="button" onclick="history.back()" value="戻る">

</body>
</html>