<?php include('../assets/header_staff.php'); ?>

<div class="container">
    <div class="d-flex flex-row">
        <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ一覧管理</h3>
    </div>
    <?php

    try {
        require_once("../common/common.php");
        $post = sanitize($_POST);

        include('../assets/db_connect.php');

        $sql = 'SELECT code, name FROM mst_staff WHERE 1';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $dbh = null;

        echo '<form action="staff_branch.php" method="post">';
        while (true) {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($rec == false) {
                break;
            } else {
                echo '<input type="radio" name="staffcode" value="' . $rec['code'] . '"<br>';
                echo $rec['name'] . "<br>";
            }
        }
        echo '<br><input class="mr-2 btn btn-primary" type="submit" name="add" value="追加">';
        echo '<input class="mr-2 btn btn-info" type="submit" name="view" value="参照">';
        echo '<input class="mr-2 btn btn-success" type="submit" name="edit" value="修正">';
        echo '<input class="mr-2 btn btn-dark" type="submit" name="delete" value="削除">';
        echo '</form>';
    } catch (Exception $e) {
        echo $e;
        exit();
    } ?>
    <br>
    <a href="../staff/staff_list.php">スタッフ管理</a><br>
    <a href="../product/pro_list.php">商品管理</a><br>
    <a href="../index.php">商品一覧</a><br>
    <a href="../order/order_download.php">注文書ダウンロード</a><br>
    <a href="../staff_login/staff_logout.php">ログアウト</a><br>
    <a href="../staff_login/staff_top.php">管理者トップメニューへ</a><br>
    <?php include('../assets/footer.php'); ?>