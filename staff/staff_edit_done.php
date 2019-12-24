<?php include('../assets/header_staff.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ情報修正</h3>
        </div>

        <?php

        try {
            require_once("../common/common.php");
            $post = sanitize($_POST);

            $staff_code = $post['code'];
            $staff_name = $post['name'];
            $staff_pass = $post['pass'];

            include('../assets/db_connect.php');

            $sql = 'UPDATE mst_staff SET name=?, password=? WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_name;
            $data[] = $staff_pass;
            $data[] = $staff_code;
            $stmt->execute($data);

            $dbh = null;
            echo "修正しました。<br>";

        ?>
        <?php } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
        <a class="btn btn-secondary mt-3" href="staff_list.php">戻る</a>
        <?php include('../assets/footer.php');?>
