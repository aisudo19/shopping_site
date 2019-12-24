<?php include('../assets/header_staff.php'); ?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品情報を削除しました</h3>

        </div>

        <br><br>
        <?php

        try {
            require_once('../common/common.php');
            $post = sanitize($_POST);

            $pro_code = $post['pro_code'];
            $pro_name = $post['pro_name'];

            include('../assets/db_connect.php');

            $sql = 'DELETE FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);

            echo "商品名：" . $pro_name . "<br>";
            $dbh = null;

        ?>

        <?php } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
        <a class="btn btn-secondary mt-3" href="pro_list.php">戻る</a>
        <?php include('../assets/footer.php'); ?>