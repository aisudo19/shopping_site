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
$post = sanintize($_POST);

try{
    $staff_name = $post['name'];
    $staff_pass = $post['pass'];
        
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    
    $sql='INSERT INTO mst_staff (name,password) VALUES (?,?)';
    $stmt=$dbh->prepare($sql);
    $data[]=$staff_name;
    $data[]=$staff_pass;
    $stmt->execute($data);
    $dbh=null;
    
    print $staff_name;
    print 'さんを追加しました。<br>';
    
}
catch(Exception $e){
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}
?>
<a href="staff_list.php">戻る</a>

</body>
</html>