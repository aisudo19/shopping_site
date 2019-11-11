<?php 
session_start();
session_regenerate_id(true);

if(isset($_SESSION['member_login']) == false){
    echo "ようこそゲスト様 ";
    echo '<a href="member_login.html">会員ログイン</a><br><br>';
}else{
    echo 'ようこそ'.$_SESSION['member_name'].'様   <a href="member_logout.php">ログアウト</a><br><br>';
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

try{
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='SELECT code, name, price, gazou FROM mst_product WHERE 1';
    $stmt=$dbh->prepare($sql);
    $stmt->execute($data);
    $dbh=null;

    echo '商品一覧<br><br>';
    while(true){//  一覧を表示
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false){
            break;
        }
        echo '<a href="shop_product.php?procode='.$rec['code'].'">';
        echo $rec['name'].'---'.$rec['price'].'円';
        echo '</a><br>';
        // echo '<br>';
    }

}
catch(Exception $e){
    echo 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}
echo '<br>';
echo '<a href="shop_cartlook.php">カートを見る</a><br>';
?>

</body>
</html>