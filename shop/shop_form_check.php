<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-5 mb-3 bg-white border-bottom shadow-sm">
        <h2 class="my-0 mr-md-auto font-weight-normal"><a href="../shop/index.php" class="">八百屋のすどう</a></h2>
        <div class="flex-row-reverse">
            <?php
                session_start();
                session_regenerate_id(true); //合言葉を都度変える。セッションハイジャック対策。

                if (isset($_SESSION['member_login']) == true) {
                    echo "ようこそ" . $_SESSION['member_name'] . "様<br>";
                    echo '<a href="member_logout.php">ログアウト</a><br><br>';
                } else {
                    echo "ようこそゲスト様<br>";
                    echo '<a href="./member_login.php">会員ログイン</a><br>';
                }

            ?>
        </div>
    </div>
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

        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="送信する">
    </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>