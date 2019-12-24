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
            session_regenerate_id(true);
            if (isset($_SESSION['member_login']) == false) {
                echo "ログインされていません。<br>";
                echo '<a href="./member_login.php">ログインする</a><br>';
                // exit();
            } else {
                echo "ようこそ、" . $_SESSION['member_name'] . "様<br>";
                echo '<a href="member_logout.php">ログアウト</a><br><br>';
            }
            ?>
        </div>
    </div>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">お客様情報</h3>
        </div>
        <?php

        $code = $_SESSION['member_code'];

        $dsn='mysql:dbname=tqmsbzgg_shop;host=localhost;charset=utf8';
        $user='tqmsbzgg_shop';
        $password='%RdFsbr)I})8';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name, email, postal1, postal2, address, tel FROM dat_member WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $code;
        $stmt->execute($data);
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        $dbh = null;
        $onamae = $rec['name'];
        $email = $rec['email'];
        $postal1 = $rec['postal1'];
        $postal2 = $rec['postal2'];
        $address = $rec['address'];
        $tel = $rec['tel'];

        echo "お名前<br>" . $onamae . "<br><br>";
        echo "メールアドレス<br>" . $email . "<br><br>";
        echo "郵便番号<br>" . $postal1 . "-" . $postal2 . "<br><br>";
        echo "住所<br>" . $address . "<br><br>";
        echo "電話番号<br>" . $tel . "<br><br>";

        ?>
        <form action="shop_kantan_done.php" method="post">
            <input type="hidden" name="code_member" value="<?php echo $code ?>">
            <input type="hidden" name="name" value="<?php echo $onamae ?>">
            <input type="hidden" name="email" value="<?php echo $email ?>">
            <input type="hidden" name="postal1" value="<?php echo $postal1 ?>">
            <input type="hidden" name="postal2" value="<?php echo $postal2 ?>">
            <input type="hidden" name="address" value="<?php echo $address ?>">
            <input type="hidden" name="tel" value="<?php echo $tel ?>">

            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="送信する">
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>