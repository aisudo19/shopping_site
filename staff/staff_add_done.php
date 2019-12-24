<?php include('../assets/header_staff.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ追加チェック</h3>
        </div>
<br>
<?php 

try{
    require_once("../common/common.php");
$post = sanitize($_POST);

$name = $post['name'];
$pass = $post['pass'];

include('../assets/db_connect.php');

$sql='INSERT INTO mst_staff (name,password) VALUES (?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$name;
$data[]=$pass;
$stmt->execute($data);
$dbh=null;

echo $name."さんを追加しました。<br>";

}catch(Exception $e){
    echo $e;
    exit();
}?>
<a class="btn btn-secondary mt-3" href="staff_list.php">戻る</a><br>
<?php include('../assets/footer.php');?>

