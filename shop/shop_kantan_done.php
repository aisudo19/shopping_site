<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>

<?php 

session_start();
session_regenerate_id(true);//合言葉を都度変える。セッションハイジャック対策。
try{
    require_once('../common/common.php');
    $post = sanitize($_POST);
    
    $onamae=$post['name'];
    $email=$post['email'];
    $postal1=$post['postal1'];
    $postal2=$post['postal2'];
    $address=$post['address'];
    $tel=$post['tel'];
    echo $onamae."様<br>"."ご注文ありがとうございました。<br>".$email."宛に注文内容確認メールをお送りしましたのでご確認ください。<br>商品は以下の住所に発送いたします。<br>".$postal1."-".$postal2."<br>".$address."<br>".$tel."<br>";

    $honbun ='';
    $honbun .= $onamae."様\n\n"."この度はご注文ありがとうございました。\n";
    $honbun .= "ご注文商品\n";
    $honbun .= "----------------\n";
    
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    $max = count($kazu);

    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    for($i = 0; $i < $max; $i++){
        $sql='SELECT name, price FROM mst_product WHERE code=?';
        $stmt=$dbh->prepare($sql);
        $data[0]=$cart[$i];
        $stmt->execute($data);
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);

        $name=$rec['name'];
        $price=$rec['price'];
        $kakaku[] = $price;//あとで$kakakuの配列使う
        $suryo=$kazu[$i];
        $syokei=$suryo*$price;
        
        $honbun.=$name.' ';
        $honbun.=$price.'円 x';
        $honbun.=$suryo.'個 = ';
        $honbun.=$syokei.'円\n';
    }

    $dbh=null;

    $honbun.="送料は無料です。\nblahblah";
    // echo $honbun;
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='LOCK TABLES dat_sales WRITE, dat_sales_product WRITE, dat_member WRITE';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    
    $lastmembercode=$_SESSION['member_code'];

    $sql='INSERT INTO dat_sales (code_member, name, email, postal1, postal2, address, tel) VALUES (?,?,?,?,?,?,?)';
    $stmt=$dbh->prepare($sql);
    $data=array();//初期化しないと古い$dataに値が入ったまま
    $data[]=$lastmembercode;
    $data[]=$onamae;
    $data[]=$email;
    $data[]=$postal1;
    $data[]=$postal2;
    $data[]=$address;
    $data[]=$tel;    
    $stmt->execute($data);

    $sql= 'SELECT LAST_INSERT_ID()';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    $lastcode = $rec['LAST_INSERT_ID()'];
    
    for($i=0; $i < $max; $i++){
        $sql='INSERT INTO dat_sales_product (code_sales, code_product, price, quantity) VALUES (?,?,?,?)';
        $stmt=$dbh->prepare($sql);
        $data = array();
        $data[] = $lastcode;
        $data[]=$cart[$i];
        $data[]=$kakaku[$i];
        $data[]=$kazu[$i];
        $stmt->execute($data);
    }

    $sql='UNLOCK TABLES';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $dbh=null;
    // header('Location: clear_cart.php');
    // exit();
    // clear_cart.phpの中身を持って来る
    // session_start();　すでにセッションがあるので開始不要
    $_SESSION['cart'] = '';
    if(isset($_COOKIE[session_name()]) == true){
        setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();


}
catch(Exception $e){
    echo $e;
    exit();
}


?>
<br>

<a href="shop_list.php">商品画面へ</a>
</body>
</html>

