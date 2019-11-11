<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
スタッフログイン<br>
<?php
try{
    require_once('../common/common.php');
    $post = sanitize($_POST);
    $member_email = $post['email'];
    $member_pass = $post['pass'];
    $member_pass = md5($member_pass);

    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql='SELECT code, name FROM dat_member WHERE email=? AND password=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$member_email;
    $data[]=$member_pass;
    $stmt->execute($data);
    $dbh=null;

    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    if($rec == false){
        echo "メールアドレスかパスワードが間違っています<br>";
        echo '<a href="member_login.html">戻る</a>';
    }else{
        // echo "成功";
        session_start();
        $_SESSION['member_login'] = 1;
        $_SESSION['member_code'] = $rec['code'];
        $_SESSION['member_name'] = $rec['name'];
        header('Location:shop_list.php');
        exit();
    }

}
catch(Exception $e){
    echo "ただいま障害が起きております。ご迷惑をおかけいたします。<br>";
    echo $e;
    echo '<a href="member_login.html">戻る</a>';
    exit();
}

?>
</body>
</html>