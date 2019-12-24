<?php include('../assets/header_staff.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ追加チェック</h3>
        </div>
<?php 

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
        <input class="btn btn-secondary mt-3" type="button" onclick="history.back()" value="戻る">
        <input class="btn btn-primary mt-3" type="submit" value="OK">
    </form>
<?php } ?>
<?php include('../assets/footer.php');?>
