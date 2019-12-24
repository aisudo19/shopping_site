<?php include('../assets/header_staff.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ情報削除</h3>
        </div>

        <?php

        try {
            require_once('../common/common.php');
            $post = sanitize($_POST);

            $staff_code = $post['staff_code'];
            $staff_name = $post['staff_name'];

            include('../assets/db_connect.php');

            $sql = 'DELETE FROM mst_staff WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_code;
            $stmt->execute($data);

            echo "削除しました。<br>";
            echo "スタッフ名：" . $staff_name . "<br>";
            $dbh = null;

        ?>

        <?php } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
        <a class="btn btn-secondary mt-3" href="staff_list.php">戻る</a>
    </div>
    <?php include('../assets/footer.php');?>
