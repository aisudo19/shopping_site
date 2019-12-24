<?php include('../assets/header_member.php'); ?>

<div class="container">
    <div class="d-flex flex-row">
        <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品一覧</h3>
    </div>
    <?php
    session_start();
    session_regenerate_id(true); //合言葉を都度変える。セッションハイジャック対策。
    require_once('../common/common.php');
    $post = sanitize($_POST);
    $max = $post['max'];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }

    for ($i = 0; $i < $max; $i++) {
        if (preg_match('/^[0-9]+$/', $post['kazu' . $i])) {
            $kazu[] = $post['kazu' . $i];
        } else {
            echo "数字以外が入力されています。<br>";
            echo '<a class="btn btn-secondary mt-3" href="shop_product.php">戻る</a><br>';
            exit();
        }
    }

    for ($i = $max; $i >= 0; $i--) {
        if (isset($post['sakujo' . $i]) == true) {
            array_splice($kazu, $i, 1);
            array_splice($cart, $i, 1);
        }
    }
    $_SESSION['cart'] = $cart;
    $_SESSION['kazu'] = $kazu;
    header('Location: shop_cartlook.php');
    exit();

    ?>
    <br>
    <a class="btn btn-secondary mt-3" href="../staff_login/staff_top.php">トップメニューへ</a><br>
    <?php include('../assets/footer.php'); ?>