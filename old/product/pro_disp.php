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

<h1>商品情報参照</h1>
<?php 
$pro_code = $_GET['procode'];
try{
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='SELECT name, price, gazou FROM mst_product WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$pro_code;
    $stmt->execute($data);
 
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name=$rec['name'];
    $pro_price=$rec['price'];
    $pro_gazou_name=$rec['gazou'];
    $dbh=null;
}
catch(Exception $e){
    echo 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

if($pro_gazou_name ==''){
    $disp_gazou='';
}else{
    $disp_gazou = '<img src="./gazou/'.$pro_gazou_name.'">';
}
?>

<p>商品コード: <?php echo $pro_code ?></p>
<p>商品名: <?php echo $pro_name ?></p>
<p>商品価格: <?php echo $pro_price ?>円</p>
<?php echo $pro_gazou ?>

<form>
    <input type="button" value="戻る" onclick="history.back()">
</form>
</body>
</html>