<?php include('../assets/header_staff.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ情報参照</h3>
        </div>

        <?php
        try {

            $staff_code = $_GET['staffcode'];

            include('../assets/db_connect.php');

            $sql = 'SELECT code, name FROM mst_staff WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name = $rec['name'];
            echo "スタッフ名：" . $staff_name . "<br>";
            echo "スタッフコード:" . $staff_code . "<br>";

            $dbh = null;
        } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
        <a class="btn btn-secondary mt-3" href="staff_list.php">戻る</a>
        <?php include('../assets/footer.php');?>
