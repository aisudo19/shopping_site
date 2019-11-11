<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

商品情報参照<br><br>
<?php 
session_start();
session_regenerate_id(true);//合言葉を都度変える。セッションハイジャック対策。
// if(isset($_SESSION['login']) == false){
//     echo "ログインされていません。<br>";
//     echo '<a href="../staff_login/staff_login.html">ログインする</a><br>';
//     exit();
// }else{
//     echo $_SESSION['staff_name']."さんログイン中<br>";
//     echo '<a href="member_logout.php">ログアウト</a><br><br>';
// }
if(isset($_SESSION['member_login']) == false){
    echo "ログインされていません。<br>";
    echo '<a href="./member_login.html">ログインする</a><br>';
    exit();
}else{
    echo "ようこそ、".$_SESSION['member_name']."様<br>";
    echo '<a href="member_logout.php">ログアウト</a><br><br>';
}
try{
    require_once('../common/common.php');
    $post=sanitize($_POST);
    // $pro_code = $_GET['procode'];
    // $kazu = $_GET['kazu'];
    $pro_code = $post['procode'];
    $num = (int)$post['kazu'];
    if(isset($_SESSION['cart']) == true){
        $cart = $_SESSION['cart'];
        $kazu = $_SESSION['kazu'];
        if(in_array($pro_code, $cart)){
            //すでに商品が$cartの2番目に入っていたら、
            //2番めの数を増やす
            $junban = array_search($pro_code, $cart); //結果は2
            $kazu[$junban] += $num;
            //＄_SESSION['kazu']も更新
            $_SESSION['kazu'] = $kazu;
        }else{
            //カートにまだ同じ商品がないときは、$cartに$pro_codeと数量を追加する
            $kazu[] = $num;
            $cart[] = $pro_code;
        }
    }else{
        //セッションにカートがないときは、$cartに$pro_codeと数量を追加する
        $kazu[] = $num;
        $cart[] = $pro_code;
    }

    $_SESSION['cart'] = $cart;
    $_SESSION['kazu'] = $kazu;
    
}catch(Exception $e){
    echo $e;
    exit();
}?>
カートに追加しました。<br>

<a href="shop_list.php">戻る</a>
</body>
</html>

