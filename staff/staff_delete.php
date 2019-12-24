<?php include('../assets/header_staff.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ情報削除</h3>
        </div>

        <?php
        try {
            $staff_code = $_GET['staffcode'];

            include('../assets/db_connect.php');

            $sql = 'SELECT name FROM mst_staff WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name = $rec['name'];
            echo "このスタッフを削除してよろしいですか？<br>";
            echo "スタッフ名：" . $staff_name . "<br>";
            $dbh = null;

        ?>

            <form action="staff_delete_done.php" method="post">
                <input type="hidden" name="staff_code" value="<?php echo $staff_code ?>">
                <input type="hidden" name="staff_name" value="<?php echo $staff_name ?>">
                <input class="btn btn-secondary mt-3" type="button" onclick="history.back()" value="戻る">
                <input class="btn btn-primary mt-3" type="submit" value="OK">
            </form>
        <?php } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
    </div>
    <?php include('../assets/footer.php');?>
