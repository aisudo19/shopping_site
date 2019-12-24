<?php include('../assets/header_staff.php'); ?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">商品情報参照</h3>
        </div>

        <?php

        try {

            $pro_code = $_GET['procode'];

            include('../assets/db_connect.php');

            $sql = 'SELECT code, name,gazou FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name = $rec['name'];
            $pro_gazou = $rec['gazou'];
            echo "商品名：" . $pro_name . "<br>";
            echo "商品コード:" . $pro_code . "<br>";
            echo '<img class="img-thumbnail" style="max-width:300px; height:auto" src="./gazou/' . $pro_gazou . '"><br>';

            $dbh = null;
        } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
        <a class="btn btn-secondary mt-3" href="pro_list.php">戻る</a>

        <?php include('../assets/footer.php'); ?>