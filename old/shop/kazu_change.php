<?php 
session_start();
session_regenerate_id(true);
require_once('../common/common.php');
$post = sanitize($_POST);
$max = $post['max'];
$cart = $_SESSION['cart'];

for($i = 0; $i < $max; $i++){
    //正規表現で数以外を弾く
    if(preg_match("/\A[0-9]+\z/", $post['kazu'.$i]) == 0){
        echo '数量に誤りがあります。';
        echo '<a href="shop_cartlook.php">カートに戻る</a>';
        exit();
    }
    if($post['kazu'.$i] < 1 || $post['kazu'.$i] > 10){
        echo "数量は必ず1個以上、10個までです。";
        echo '<a href="shop_cartlook.php">カートに戻る</a>';
        exit();
    }
    $kazu[] = $post['kazu'.$i];
    echo $kazu[$i];
}
for($i=$max; 0<=$i;$i--){
    if(isset($_POST['sakujo'.$i])){
        array_splice($cart, $i,1);//後ろから$i番目を消す
        array_splice($kazu, $i,1);//後ろから$i番目を消す
    }
}
$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;
header('Location: shop_cartlook.php');
exit();
?>
