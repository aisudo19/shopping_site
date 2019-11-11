<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
</head>
<body>
お客様情報を入力してください。
<form action="shop_form_check.php" method="post">
名前
    <input type="text" name="name" style="width: 200px"><br>
メールアドレス
    <input type="mail" name="email" style="width: 200px"><br>
郵便番号
    <input type="text" name="postal1" style="width: 50px">-
    <input type="text" name="postal2" style="width: 80px"><br>
住所
    <input type="text" name="address" style="width: 500px"><br>
電話番号
    <input type="text" name="tel"  style="width: 150px"><br>
<br>
<input type="radio" name="chumon" value="chumonkonkai" checked>今回だけの注文<br>
<input type="radio" name="chumon" value="chumontouroku" checked>会員登録しての注文<br>
<br>
※会員登録する方は以下の項目も入力してください。<br>
パスワードも入力してください。<br>
<input type="password" name="pass" style="width:100px"><br>
パスワードをもう一度入力してください。<br>
<input type="password" name="pass2" style="width:100px"><br>
性別<br>
<input type="radio" name="danjo" value="dan" checked>男性<br>
<input type="radio" name="danjo" value="jo">女性<br>
生まれ年<br>
<select name="birth">
    <?php for($i=1910;$i<2010;$i+=10){?>
        <?php if($i == 1980){?>
            <option value="<?php echo $i?>" selected><?php echo $i?>年代</option>
        <?php }else{?>
        <option value="<?php echo $i?>"><?php echo $i?>年代</option>
        <?php }} ?> 
    
</select><br>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="送信する">
</form>

</body>
</html>

