<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

会員ログインチェック<br>
<?php 
try{
    require_once("../common/common.php");
    $post = sanitize($_POST);
    $email = $post['email'];
    $pass = $post['pass'];
    $pass = md5($pass);

    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql='SELECT code,name FROM dat_member WHERE email=? AND password=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$email;
    $data[]=$pass;
    $stmt->execute($data);
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);

    $dbh=null;
    
    if($rec == false){
        echo "メールアドレスかパスワードのどちらかが間違っています。<br>";
        echo '<a href="member_login.html">戻る</a>';
    }else{
        session_start();
        $_SESSION['member_login'] = 1;
        $_SESSION['member_code'] = $rec['code'];
        $_SESSION['member_name'] = $rec['name'];
        header('Location: shop_list.php');
        exit();
    }
}
catch(Exception $e){
    echo $e;
    exit();
}
?>

</body>
</html>

