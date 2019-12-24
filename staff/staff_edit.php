<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-5 mb-3 bg-white border-bottom shadow-sm">
        <h2 class="my-0 mr-md-auto font-weight-normal"><a href="../shop/index.php" class="">八百屋のすどう</a></h2>
        <div class="flex-row-reverse">
            <?php
            session_start();
            session_regenerate_id(true); //合言葉を都度変える。セッションハイジャック対策。

            if (isset($_SESSION['login']) == false) {
                echo "ログインされていません。<br>";
                echo '<a href="../staff_login/staff_login.php">ログインする</a><br>';
                exit();
            } else {
                echo '管理者モード<br>' . $_SESSION['staff_name'] . "さんログイン中<br>";
            }

            ?>
        </div>
    </div>
    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">スタッフ情報修正</h3>
        </div>

        <?php

        try {
            // require_once("../common/common.php");
            // $post = sanitize($_POST);

            $staff_code = $_GET['staffcode'];

            $dsn='mysql:dbname=tqmsbzgg_shop;host=localhost;charset=utf8';
            $user='tqmsbzgg_shop';
            $password='%RdFsbr)I})8';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>