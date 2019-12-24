<?php include('../assets/header_member.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">スタッフ一覧管理</h3>
        </div>

    <?php

    require_once('../common/common.php');
    $post = sanitize($_POST);

    $name = $post['name'];
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
    if ($name == '') {
        echo '名前が入力されていません。<br>';
        $okflg = false;
    } else {
        echo "名前：" . $name . "<br>";
    }

    if (preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $email) == false) {
        echo "メールアドレスを正しく入力してください。<br>";
        $okflg = false;
    } else {
        echo "メールアドレス：" . $email . "<br>";
    }

    if (preg_match('/\A[0-9]+\z/', $postal1) == false || preg_match('/\A[0-9]+\z/', $postal2) == false) {
        // if(preg_match('/\A[0-9]+$/', $postal1) || preg_match('/^[0-9]+$/', $postal2)){
        echo "郵便番号は000-0000の形式で数字で入力してください。<br>";
        $okflg = false;
    } else {
        echo "郵便番号：" . $postal1 . "-" . $postal2 . "<br>";
    }

    if ($address == '') {
        echo "住所が入力されていません。<br>";
        $okflg = false;
    } else {
        echo "住所：" . $address . "<br>";
    }

    if (preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/', $tel) == false) {
        echo "電話番号が正しく入力されていません。電話番号は000-0000-0000の形式で入力してください。<br>";
        $okflg = false;
    } else {
        echo "電話番号：" . $tel . "<br><br>";
    }
    if ($chumon == "chumontouroku") {
        if ($pass == "") {
            echo "パスワードが入力されていません。<br>";
            $okflg = false;
        }
        if ($pass != $pass2) {
            echo "パスワードが合致しません。<br>";
            $okflg = false;
        }
        echo "性別<br>";
        if ($danjo == "dan") {
            echo "男性";
        } else {
            echo "女性";
        }
        echo "<br><br>";
        echo "生まれ年<br>" . $birth . "年代<br><br>";
    }


    if ($okflg = false) {
        echo '<a href="shop_form.html">戻る</a><br>';
    } else {
    }

    ?>
    <form action="shop_form_done.php" method="post">
        <input type="hidden" name="name" value="<?php echo $name ?>">
        <input type="hidden" name="email" value="<?php echo $email ?>">
        <input type="hidden" name="postal1" value="<?php echo $postal1 ?>">
        <input type="hidden" name="postal2" value="<?php echo $postal2 ?>">
        <input type="hidden" name="address" value="<?php echo $address ?>">
        <input type="hidden" name="tel" value="<?php echo $tel ?>">
        <input type="hidden" name="chumon" value="<?php echo $chumon ?>">
        <input type="hidden" name="pass" value="<?php echo md5($pass) ?>">
        <input type="hidden" name="danjo" value="<?php echo $danjo ?>">
        <input type="hidden" name="birth" value="<?php echo $birth ?>">

        <input class="btn btn-secondary mt-3" type="button" onclick="history.back()" value="戻る">
        <input class="btn btn-primary mt-3"type="submit" value="送信する">
    </form>
    <?php include('../assets/footer.php');?>