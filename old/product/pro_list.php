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
    echo '<form method="post" action="pro_branch.php">';
    while(true){//  一覧を表示
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false){
            break;
        }
        echo '<input type="radio" name="procode" value="'.$rec['code'].'">';
        echo '<input type="hidden" name="proname" value="'.$rec['name'].'">';
        echo '<input type="hidden" name="price" value="'.$rec['price'].'">';
        echo '<input type="hidden" name="gazou" value="'.$rec['gazou'].'">';
        echo $rec['name']."-----";
        echo $rec['price']."円";
        echo '<img src="./gazou/'.$rec['gazou'].'">';
        echo '<br>';
    }
    echo '<input type="submit" name="disp" value="参照">';
    echo '<input type="submit" name="add" value="追加">';
    echo '<input type="submit" name="edit" value="修正">';
    echo '<input type="submit" name="delete" value="削除">';
    echo '</form>';

}
catch(Exception $e){
    echo 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}
?>
<br>
<a href="../staff_login/staff_top.php">トップメニューへ</a>

</body>
</html>