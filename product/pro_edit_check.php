<?php include('../assets/header_staff.php'); ?>

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

        <?php include('../assets/footer.php'); ?>