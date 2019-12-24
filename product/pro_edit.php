<?php include('../assets/header_staff.php'); ?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品情報修正</h3>

        </div>

        <?php

        try {
            $pro_code = $_GET['procode'];

            include('../assets/db_connect.php');

            $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name = $rec['name'];
            $pro_price = $rec['price'];
            $gazou_old = $rec['gazou'];

            if ($gazou_old == '') {
                $gazou_disp = '';
            } else {
                $gazou_disp = $gazou_old;
                echo '<img style="max-width:300px; height=auto;" class="img-thumbnail" src="./gazou/' . $gazou_old . '"><br>';
            }
            $dbh = null;

        ?>

            <form action="pro_edit_check.php" method="post" enctype="multipart/form-data">
                商品コード:
                <?php echo $pro_code ?><br><br>
                <input type="hidden" name="pro_code" value="<?php echo $pro_code ?>">
                商品名<br>
                <input type="text" name="pro_name" value="<?php echo $pro_name ?>"><br>
                商品価格<br>
                <input type="text" name="pro_price" value="<?php echo $pro_price ?>"><br>
                画像ファイル選択<br>
                <input type="hidden" name="gazou_old" value="<?php echo $gazou_old ?>"><br>
                <input type="file" name="gazou" style="width=400px" value="<?php echo $gazou_disp ?>"><br>
                <input type="button" class="btn btn-secondary mt-3" onclick="history.back()" value="戻る">

                <input class="btn btn-primary mt-3" type="submit" value="修正">
            </form>
        <?php } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
    <?php include('../assets/footer.php'); ?>