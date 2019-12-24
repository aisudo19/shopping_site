<?php include('../assets/header_member.php');?>

    <div class="container">
        

        <?php

        try {

            $pro_code = $_GET['procode'];

            include('../assets/db_connect.php');

            $sql = 'SELECT code, name,gazou,price FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name = $rec['name'];
            $pro_gazou = $rec['gazou'];
            $pro_price = $rec['price'];
            echo '<div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">'. $pro_name . '</h3></div><br>';
            echo '<img class="img-thumbnail" style="max-width:300px; height:auto" src="../product/gazou/' . $pro_gazou . '"><br>';
            echo "商品コード:" . $pro_code . "<br>";
            echo "価格:" . $pro_price . "円<br>";

            $dbh = null;
        } catch (Exception $e) {
            echo $e;
            exit();
        } ?>

        <form action="shop_cartin.php" method="post">
            <input type="hidden" name="procode" value="<?php echo $pro_code ?>"><br>
            数量
            <select name='kazu'>
                <?php for ($i = 1; $i <= 100; $i++) { ?>
                    <option value=<?php echo $i ?>><?php echo $i ?></option>
                <?php } ?>
            </select>
            <input class="ml-3 btn btn-primary" type="submit" value="カートに入れる">
        </form>

        <!-- <a href="shop_cartin.php?procode=<?php echo $pro_code ?>">カートに入れる</a><br><br> -->
        <a class="btn btn-secondary mt-3" href="../index.php">戻る</a>
      
        <?php include('../assets/footer.php');?>
