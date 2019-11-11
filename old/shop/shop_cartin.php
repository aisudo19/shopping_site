<?php 
session_start();
session_regenerate_id(true);

if(isset($_SESSION['member_login']) == false){
    echo "ようこそゲスト様<br>";
    echo '<a href="member_login.html">会員ログイン</a><br>';
}else{
    echo 'ようこそ'.$_SESSION['member_name'].'様   <a href="member_logout.html">ログアウト</a><br><br>';
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

try{
    $pro_code = $_GET['procode'];
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $kazu = $_SESSION['kazu'];
        if(in_array($pro_code, $cart)){
            echo 'その商品はすでにカートに入っています。<br>';
            echo '<a href="shop_list.php">商品一覧に戻る</a>';
            exit();
        }
    }
    $cart[] = $pro_code;
    $kazu[] = 1;
    $_SESSION['cart'] = $cart;
    $_SESSION['kazu'] = $kazu;
    
}
catch(Exception $e){
    echo 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>

カートに追加しました。<br />

<br />
<a href="shop_list.php">商品一覧に戻る</a>

</body>
</html>