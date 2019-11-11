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
require_once('../common/common.php');
$post = sanintize($_POST);

$pro_code = $post['code'];
$pro_name = $post['name'];
$pro_price = $post['price'];
$pro_gazou = $post['gazou'];
$pro_gazou_old = $post['gazou_old'];
//オリジナルに追加。画像に変更がなかったら古い画像のままにする
if($pro_gazou===""){
    $pro_gazou = $pro_gazou_old;
}
try{
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='UPDATE mst_product SET name=?, price=?, gazou=? WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$pro_name;
    $data[]=$pro_price;
    $data[]=$pro_gazou;
    $data[]=$pro_code;
    $stmt->execute($data);
    // $rec = $stmt->fetch(PDO::FETCH_ASSOC);//*DBから取得したデータを変数追加する処理*
    // $pro_name=$rec['name'];
    // $pro_code=$rec['code'];

    echo "以下の通り、修正しました。 <br>";

    echo "商品名：". $pro_name. "<br>";
    echo "商品価格：".$pro_price."円<br><br>";
    echo '<img src="./gazou/'.$pro_gazou.'">';
    $dbh=null;
}
catch(Exception $e){
    echo $e;
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>
<a href="pro_list.php">戻る</a>

</body>
</html>