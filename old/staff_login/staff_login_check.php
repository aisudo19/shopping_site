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
    $staff_code = $post['code'];
    $staff_pass = $post['pass'];
    $staff_pass = md5($staff_pass);

// $staff_code=$_POST['code'];
// $staff_pass=$_POST['pass'];

// $staff_code=htmlspecialchars($staff_code);
// $staff_pass=htmlspecialchars($staff_pass);

// $staff_pass=md5($staff_pass);

    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql='SELECT name FROM mst_staff WHERE code=? AND password=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$staff_code;
    $data[]=$staff_pass;
    $stmt->execute($data);
    $dbh=null;

    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    if($rec == false){
        echo "スタッフコードかパスワードが間違っています<br>";
        echo '<a href="staff_login.html">戻る</a>';
    }else{
        echo "成功";
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['staff_code'] = $staff_code;
        $_SESSION['staff_name'] = $rec['name'];
        header('Location:staff_top.php');
        exit();
    }

}
catch(Exception $e){
    echo "ただいま障害が起きております。ご迷惑をおかけいたします。<br>";
    echo $e;
    echo '<a href="staff_login.html">戻る</a>';
    exit();
}

?>
</body>
</html>