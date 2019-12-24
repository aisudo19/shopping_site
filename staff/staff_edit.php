<?php include('../assets/header_staff.php');?>

<div class="container">
    <div class="d-flex flex-row">
        <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ情報修正</h3>
    </div>

    <?php

    try {
        require_once("../common/common.php");
        $post = sanitize($_POST);

        $staff_code = $_GET['staffcode'];

        include('../assets/db_connect.php');

        $sql = 'SELECT name FROM mst_staff WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_code;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $staff_name = $rec['name'];

        $dbh = null;

    ?>

        <form action="staff_edit_check.php" method="post">
            スタッフコード:
            <?php echo $staff_code ?><br><br>
            <input type="hidden" name="staff_code" value="<?php echo $staff_code ?>">
            スタッフ名<br>
            <input type="text" name="staff_name" value="<?php echo $staff_name ?>"><br>
            パスワードを入力してください。<br>
            <input type="text" name="pass1"><br>
            パスワードをもう一度入力してください。<br>
            <input type="text" name="pass2"><br>

            <input class="btn btn-secondary mt-3" type="button" onclick="history.back()" value="戻る">

            <input class="btn btn-primary mt-3" type="submit" value="修正">
        </form>
    <?php } catch (Exception $e) {
        echo $e;
        exit();
    } ?>
    <?php include('../assets/footer.php'); ?>