<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-5 mb-3 bg-white border-bottom shadow-sm">
        <h2 class="my-0 mr-md-auto font-weight-normal"><a href="../shop/index.php" class="">八百屋のすどう</a></h2>
        <div class="flex-row-reverse">
            <?php
            session_start();
            session_regenerate_id(true); //合言葉を都度変える。セッションハイジャック対策。

            if (isset($_SESSION['login']) == false) {
                echo "ログインされていません。<br>";
                echo '<a href="../staff_login/staff_login.php">ログインする</a><br>';
                exit();
            } else {
                echo '管理者モード<br>' . $_SESSION['staff_name'] . "さんログイン中<br>";
            }

            ?>
        </div>
    </div>
    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ追加チェック</h3>
        </div>

<?php 

require_once("../common/common.php");
$post = sanitize($_POST);
$code = $post['staff_code'];
$name = $post['staff_name'];
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
    <form action="staff_edit_done.php" method="post">
        <input type="hidden" name="code" value="<?php echo $code?>">
        <input type="hidden" name="name" value="<?php echo $name?>">
        <input type="hidden" name="pass" value="<?php echo $staff_pass?>">
        <input class="btn btn-secondary mt-3" type="button" onclick="history.back()" value="戻る">
        <input class="btn btn-primary mt-3" type="submit" value="OK">
    </form>
<?php } ?>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

