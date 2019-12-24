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
            session_regenerate_id(true);
            if (isset($_SESSION['login']) == false) {
                echo "ログインされていません。<br>";
                echo '<a href="../staff_login/staff_login.php">ログインする</a><br>';
                exit();
            } else {
                echo "管理者モード<br>" . $_SESSION['staff_name'] . "さんログイン中<br>";
            }
            ?>
        </div>
    </div>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品情報修正チェック</h3>
        </div>
        <?php

        require_once("../common/common.php");
        $post = sanitize($_POST);
        $code = $post['pro_code'];
        $name = $post['pro_name'];
        $kakaku = $post['pro_price'];
        $gazou_old = $post['gazou_old'];
        $gazou = $_FILES['gazou'];

        $okflg = true;

        if ($name == "") {
            echo "商品名を入力してください。<br>";
            $okflg = false;
        } else {
            echo "商品名:" . $name . "<br>";
        }
        if ($kakaku == "") {
            echo "商品価格を入力してください。<br>";
            $okflg = false;
        }
        if (preg_match('/\A[0-9]+\z/', $kakaku) == false) {
            echo "価格に正しく数字を入力してください。<br>";
            $okflg = false;
        } else {
            echo "価格：" . $kakaku . "円<br>";
        }
        if ($gazou['size'] > 0) {
            if ($gazou['size'] > 1000000) {
                echo "画像が大きすぎます。<br>";
                $okflg = false;
            } else {
                move_uploaded_file($gazou['tmp_name'], './gazou/' . $gazou['name']);
                echo '<img class="img-thumbnail" style="max-width:300px; height:auto" src="./gazou/' . $gazou['name'] . '">';
            }
        }
        if ($okflg == false) {
            echo '<form>';
            echo '<input type="button" onclick="history.back()" value="戻る"></form>';
        } else { ?>
            <form action="pro_edit_done.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="code" value="<?php echo $code ?>">
                <input type="hidden" name="name" value="<?php echo $name ?>">
                <input type="hidden" name="kakaku" value="<?php echo $kakaku ?>">
                <input type="hidden" name="gazou_old" value="<?php echo $gazou_old ?>">
                <input type="hidden" name="gazou" value="<?php echo $gazou['name'] ?>">
                <input class="btn btn-secondary mt-3" type="button" onclick="history.back()" value="戻る">
                <input class="btn btn-primary mt-3"  type="submit" value="OK">
            </form>
        <?php } ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>