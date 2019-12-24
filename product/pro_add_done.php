<?php include('../assets/header_staff.php'); ?>

<div class="container">
    <div class="d-flex flex-row">
        <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品追加完了</h3>
    </div>

    <br>
    <?php

    try {
        require_once("../common/common.php");
        $post = sanitize($_POST);

        $name = $post['name'];
        $kakaku = $post['kakaku'];
        $gazou_name = $post['gazou'];

        include('../assets/db_connect.php');

        $sql = 'INSERT INTO mst_product (name,price,gazou) VALUES (?,?,?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $name;
        $data[] = $kakaku;
        $data[] = $gazou_name;
        $stmt->execute($data);
        $dbh = null;

        echo "商品「" . $name . "」を追加しました。<br>";
    } catch (Exception $e) {
        echo $e;
        exit();
    } ?>
    <a class="btn btn-secondary mt-3" href="pro_list.php">戻る</a><br>
    <?php include('../assets/footer.php'); ?>