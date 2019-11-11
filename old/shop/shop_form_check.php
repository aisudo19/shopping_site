<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?php 
require_once('../common/common.php');
$post = sanitize($_POST);
$onamae = $post['onamae'];
$email = $post['email'];
$postal1 = $post['postal1'];
$postal2 = $post['postal2'];
$address = $post['address'];
$tel = $post['tel'];
$chumon = $post['chumon'];
$pass = $post['pass'];
$pass2 = $post['pass2'];
$danjo = $post['danjo'];
$birth = $post['birth'];
$okflg = true;

if($onamae == ""){
    echo "お名前が入力されていません。<br><br>";
    $okflg = false;
}else{
    echo 'お名前:'.$onamae.'<br><br>';
}
if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$email) ==0){
    echo "メールアドレスを正確に入力してください。<br><br>";
    $okflg = false;
}else{
    echo 'メールアドレス:'.$email.'<br><br>';  
}
if(preg_match('/\A[0-9]+\z/',$postal1) == 0 ||preg_match('/\A[0-9]+\z/',$postal2) == 0){
    echo "郵便番号は半角数字で入力してください。<br><br>";
    $okflg = false;
}else{
    echo '郵便番号:'.$postal1.'-'.$postal2.'<br><br>';  
}
if($address == ""){
    echo "住所が入力されていません。<br><br>";
    $okflg = false;
}else{
    echo '住所:'.$address.'<br><br>';  
}
if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel)==0){
    echo "電話番号を正しく入力してください。<br><br>";
    $okflg = false;
}else{
    echo '電話番号:'.$tel.'<br><br>';
}
if($chumon == 'chumontouroku'){
    if($pass=='' || $pass2 == ''){
        echo "パスワードが入力されていません。<br><br>";
        $okflg = false;
    }elseif($pass != $pass2){
        echo "パスワードが一致しません。<br><br>";
        $okflg = false;
    }
    echo "性別:";
    if($danjo == "dan"){
        echo "男性";
    }else{
        echo "女性";
    }
    echo "<br><br>";
    echo "生まれ年:".$birth;
    echo "年代<br><br>";
}
if($okflg == true){
    echo '<form action="shop_form_done.php" method="post">';
    echo '<input type="hidden" name="onamae" style="width:200px" value="'.$onamae.'">';
    echo '<input type="hidden" name="email" style="width:200px" value="'.$email.'">';
    echo '<input type="hidden" name="postal1" style="width:50px"value="'.$postal1.'">';
    echo '<input type="hidden" name="postal2" style="width:80px"value="'.$postal2.'">';
    echo '<input type="hidden" name="address" style="width:500px"value="'.$address.'">';
    echo '<input type="hidden" name="tel" style="width:150px"value="'.$tel.'">';
    echo '<input type="hidden" name="chumon" value="'.$chumon.'">';
    echo '<input type="hidden" name="pass" value="'.$pass.'">';
    echo '<input type="hidden" name="danjo" value="'.$danjo.'">';
    echo '<input type="hidden" name="birth" value="'.$birth.'">';

    echo '<input type="button" onclick="history.back()" value="戻る">';
    echo '<input type="submit" value="OK"><br>';
    echo '</form>';
}else{
    echo '<form>';
    echo '<input type="button" onclick="history.back()" value="戻る">';
    echo '</form>';
}

?>
</body>
</html>