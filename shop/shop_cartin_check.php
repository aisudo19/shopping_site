<?php include('../assets/header_member.php'); ?>

<div class="container">
    <div class="d-flex flex-row">
        <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">商品情報参照</h3>
    </div>

    <?php
    session_start();
    session_regenerate_id(true); //合言葉を都度変える。セッションハイジャック対策。

    if (isset($_SESSION['login']) == false) {
        echo "ログインされていません。<br>";
        echo '<a href="../staff_login/staff_login.php">ログインする</a><br>';
        exit();
    } else {
        echo $_SESSION['staff_name'] . "さんログイン中<br>";
        echo '<a href="member_logout.php">ログアウト</a><br><br>';
    }
    try {
        require_once('../common/common.php');
        $post = sanitize($_POST);
        $pro_code = $post['procode'];

        if (isset($post['kazu'])) {
            $kazu = $post['kazu'];
        }

        //もし数以外の数を入力されたら元のページに戻す
        if (preg_match('/^[0-9]+$/', $kazu) == false) {
            echo "数字以外が入力されています。やり直してください。";
        } else {
    ?>
            <form action="shop_cartin.php" method="post">
                <input type="text" name="kazu"><br>
                <input type="submit" value="送信する">
            </form>
    <?php
            echo "カートに追加しました。<br>";
            exit();
        }
    } catch (Exception $e) {
        echo $e;
        exit();
    } ?>

    <a class="btn btn-secondary mt-3" href="../index.php">戻る</a>
    <?php include('../assets/footer.php');?>