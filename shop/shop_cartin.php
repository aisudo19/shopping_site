<?php include('../assets/header_member.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">商品情報参照</h3>
        </div>

        <?php

        try {
            require_once('../common/common.php');
            $post = sanitize($_POST);
            // $pro_code = $_GET['procode'];
            // $kazu = $_GET['kazu'];
            $pro_code = $post['procode'];
            $num = (int) $post['kazu'];
            if (isset($_SESSION['cart']) == true) {
                $cart = $_SESSION['cart'];
                $kazu = $_SESSION['kazu'];
                if (in_array($pro_code, $cart)) {
                    //すでに商品が$cartの2番目に入っていたら、
                    //2番めの数を増やす
                    $junban = array_search($pro_code, $cart); //結果は2
                    $kazu[$junban] += $num;
                    //＄_SESSION['kazu']も更新
                    $_SESSION['kazu'] = $kazu;
                } else {
                    //カートにまだ同じ商品がないときは、$cartに$pro_codeと数量を追加する
                    $kazu[] = $num;
                    $cart[] = $pro_code;
                }
            } else {
                //セッションにカートがないときは、$cartに$pro_codeと数量を追加する
                $kazu[] = $num;
                $cart[] = $pro_code;
            }

            $_SESSION['cart'] = $cart;
            $_SESSION['kazu'] = $kazu;
        } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
        カートに追加しました。<br>
        <!-- TODO:カートの中身を表示 -->

        <a class="btn btn-secondary mt-3" href="../index.php">戻る</a>
        <?php include('../assets/footer.php');?>