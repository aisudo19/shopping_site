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
// $staff_pass2 = $_POST['pass2'];

try{
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='UPDATE mst_staff SET name=?, password=? WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$staff_name;
    $data[]=$staff_pass;
    $data[]=$staff_code;
    $stmt->execute($data);
    
    // $rec = $stmt->fetch(PDO::FETCH_ASSOC);//*DBから取得したデータを変数追加する処理*
    // $staff_name=$rec['name'];
    // $staff_code=$rec['code'];

    $dbh=null;
}
catch(Exception $e){
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>
<p>修正しました。</p>
<br>
<a href="staff_list.php">戻る</a>

</body>
</html>