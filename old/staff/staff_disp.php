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

<h1>スタッフ情報参照</h1>
<?php 
$staff_code = $_GET['staffcode'];
try{
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='SELECT name FROM mst_staff WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$staff_code;
    $stmt->execute($data);
 
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    $staff_name=$rec['name'];
    $dbh=null;
}
catch(Exception $e){
    echo 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}?>

<p>スタッフコード: <?php echo $staff_code ?></p>
<p>スタッフ名: <?php echo $staff_name ?></p>

<form>
    <input type="button" value="戻る" onclick="history.back()">
</form>
</body>
</html>