<?php include('../assets/header_staff.php'); ?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mb-3 mr-md-auto font-weight-normal">商品一覧管理画面</h3>
        </div>

        <?php

        try {

            include('../assets/db_connect.php');

            $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $dbh = null;

            echo '<form action="pro_branch.php" method="post" class="mb-3">';
            while (true) {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($rec == false) {
                    break;
                } else {
                    echo '<div class="input-group mb-3">
        <div class="input-group-prepend">
        <div class="input-group-text">
            <input type="radio" name="procode" value="' . $rec['code'] . '"<br>';
                    echo '
        </div>
        </div>
        <input type="text" readonly class="form-control" style="background-color: white;" value="' . $rec['name'] . '   ' . $rec['price'] . '円"<br>
    </div>';
                }
            }

            echo '<input class="mr-2 btn btn-primary" type="submit" name="add" value="追加">';
            echo '<input class="mx-2 btn btn-info" type="submit" name="view" value="参照">';
            echo '<input class="mx-2 btn btn-success" type="submit" name="edit" value="修正">';
            echo '<input class="mx-2 btn btn-dark" type="submit" name="delete" value="削除">';
            echo '</form>';
        } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
        <br>
        <a href="../staff_login/staff_top.php">ショップ管理トップメニュー</a><br>
        <a href="../staff/staff_list.php">スタッフ管理</a><br>
        <a href="../product/pro_list.php">商品管理</a><br>
        <a href="../index.php">商品一覧</a><br>
        <a href="../order/order_download.php">注文書ダウンロード</a><br>
        <a href="../staff_login/staff_logout.php">ログアウト</a>

        <?php include('../assets/footer.php'); ?>