<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

スタッフ追加チェック<br>
<?php 
try{
    require_once("../common/common.php");
    $post = sanitize($_POST);
    
    $code = $post['code'];
    $pass = $post['pass'];
    $pass = md5($pass);
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql='SELECT name,code FROM mst_staff WHERE code=? AND password=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$code;
    $data[]=$pass;
    $stmt->execute($data);
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);

    $dbh=null;
    
    if($rec == false){
        echo "スタッフコードかパスワードのどちらかが間違っています。<br>";
        echo '<a href="staff_login.html">戻る</a>';
    }else{
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['staff_code'] = $rec['code'];
        $_SESSION['staff_name'] = $rec['name'];
        header('Location: staff_top.php');
        exit();
    }
    $staff_name=$rec['name'];
}
catch(Exception $e){
    echo $e;
    exit();
}
?>

</body>
</html>

