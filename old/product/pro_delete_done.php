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

$pro_code = $_POST['code'];

try{
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='DELETE FROM mst_product WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$pro_code;
    $stmt->execute($data);

    $dbh=null;
}
catch(Exception $e){
    echo $e;
    print '<br>ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

// try{

//     $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
//     $user='root';
//     $password='root';
//     $dbh=new PDO($dsn,$user,$password);
//     $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//     $sql='SELECT name, price FROM mst_product WHERE code=?';
//     $stmt=$dbh->prepare($sql);
//     $data[]=$pro_code;
//     $stmt->execute($data);
 
//     $rec=$stmt->fetch(PDO::FETCH_ASSOC);
//     $pro_name=$rec['name'];
//     $pro_price=$rec['price'];

//     echo "商品名：". $pro_name. "<br>";
//     echo "商品価格：".$pro_price."円<br><br>";

//     $dbh=null;
// }
// catch(Exception $e){
//     echo $e;
//     print '<br>ただいま障害により大変ご迷惑をおかけしております。';
//     exit();
// }


?>
<p>削除しました。</p>
<br>
<a href="pro_list.php">戻る</a>

</body>
</html>