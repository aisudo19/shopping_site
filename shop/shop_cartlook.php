<?php include('../assets/header_member.php');?>

<div class="container">
	<div class="d-flex flex-row">
		<h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">カートの中身</h3>
	</div>

    

    <?php

    try {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            $kazu = $_SESSION['kazu'];
        } else {
            // if(count($cart)== 0){
            echo "カートに商品はありません。<br>";
            echo '<a class="btn btn-secondary mt-3" href="../index.php">戻る</a>';
            exit();
            // }
        }

        include('../assets/db_connect.php');
        ?>
        <?php
        foreach ($cart as $key => $val) {
            $sql = 'SELECT code, name,gazou,price FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[0] = $val;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name[] = $rec['name'];
            $pro_gazou[] = $rec['gazou'];
            $pro_price[] = $rec['price'];
        }
        ?>
        <form action="kazu_change.php" method="post">
            <table class="table thead-dark">
                <thead>
                    <tr>
                        <th scope="col">商品名</th>
                        <th scope="col">商品画像</th>
                        <th scope="col">価格</th>
                        <th scope="col">個数</th>
                        <th scope="col">削除</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 0; $i < count($cart); $i++) {
                    echo '<tr class="align-bottom"><td class="align-bottom">' . $pro_name[$i] . '</td>';
                    echo '<td><img class="img-thumbnail" style="max-width:300px; height:auto" src="../product/gazou/' . $pro_gazou[$i] . '"></td>';
                    echo '<td class="align-bottom">' . $kazu[$i] * $pro_price[$i] . "円 </td>";
                ?>
                    <td class="align-bottom"><input type="text" name="kazu<?php echo $i; ?>" value="<?php echo $kazu[$i] ?>"></td>
                    <td class="align-bottom"><input type="checkbox" name="sakujo<?php echo $i ?>"></td><br>
                <?php
                }
                ?>
                </tbody>
            </table>

            <input type="hidden" name="max" value="<?php echo count($cart) ?>">
            <div class="d-flex flex-row-reverse">
                <input class="btn btn-primary" type="submit" value="数量変更">
            </div>
        </form>
    <?php
        $dbh = null;
    } catch (Exception $e) {
        echo $e;
        exit();
    } ?>
    <div class="text-center mt-3">
    <a class="btn btn-secondary mr-3" href="../index.php">戻る</a>
    <a class="btn btn-info mr-3" href="shop_form.php">購入手続きに進む</a>
    <?php
    if (isset($_SESSION['member_login']) == true) {
        echo '<a class="btn btn-primary" href="shop_kantan_check.php">会員簡単注文へ進む</a><br>';
    }
    ?>
    
    </div>
    <?php include('../assets/footer.php');?>