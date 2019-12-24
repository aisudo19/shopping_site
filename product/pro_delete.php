<?php include('../assets/header_staff.php'); ?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品情報削除の確認画面</h3>

        </div>
        <?php

        try {
            $pro_code = $_GET['procode'];

            include('../assets/db_connect.php');

            $sql = 'SELECT name FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name = $rec['name'];
            echo "この商品を削除してよろしいですか？<br>";
            echo "商品名：" . $pro_name . "<br>";
            $dbh = null;

        ?>

            <form action="pro_delete_done.php" method="post">
                <input type="hidden" name="pro_code" value="<?php echo $pro_code ?>">
                <input type="hidden" name="pro_name" value="<?php echo $pro_name ?>">
                <input class="btn btn-secondary mt-3" type="button" onclick="history.back()" value="戻る">
                <input class="btn btn-primary mt-3" type="submit" value="OK">
            </form>
        <?php } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
    <?php include('../assets/footer.php'); ?>