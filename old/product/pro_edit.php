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

<h1>商品修正</h1>
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
    $pro_gazou_old=$rec['gazou'];
    $dbh=null;
}
catch(Exception $e){
    echo 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}
if($pro_gazou_old ==''){
    $disp_gazou == '';
}else{
    $disp_gazou = '<img src="./gazou/'.$pro_gazou_old.'">';
}

?>

<p>商品コード: <?php echo $pro_code ?></p>
<p>修正する商品名: <?php echo $pro_name ?></p>
<p>商品画像：<?php echo $disp_gazou ?></p>

<form action="pro_edit_check.php" method="post" enctype="multipart/form-data">
    <div>
        <p>商品名を入力してください。</p>
        <input type="hidden" id="code" name="code" value="<?php echo $pro_code; ?>">
        <input type="text" id="name" name="name" value="<?php echo $pro_name; ?>">
        <p>商品価格を入力してください。</p>
        <input type="text" id="price" name="price" value="<?php echo $pro_price; ?>">円     
        <p>商品画像を選んでください。</p>
        <input type="file" id="gazou" name="gazou" style="width=400px" value="<?php echo $pro_gazou?>">
        <input type="hidden" id="gazou_old" name="gazou_old" value="<?php echo $pro_gazou_old?>">
    </div>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
</form>
</form>
</body>
</html>