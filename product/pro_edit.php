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
                    echo "管理者モード<br>".$_SESSION['staff_name'] . "さんログイン中<br>";
                }

            ?>
        </div>
    </div>


    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品情報修正</h3>

        </div>

        <?php

        try {
            $pro_code = $_GET['procode'];

            $dsn='mysql:dbname=tqmsbzgg_shop;host=tqmsbzgg_shop;charset=utf8';
            $user='tqmsbzgg_shop';
            $password='%RdFsbr)I})8';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name = $rec['name'];
            $pro_price = $rec['price'];
            $gazou_old = $rec['gazou'];

            if ($gazou_old == '') {
                $gazou_disp = '';
            } else {
                $gazou_disp = $gazou_old;
                echo '<img style="max-width:300px; height=auto;" class="img-thumbnail" src="./gazou/' . $gazou_old . '"><br>';
            }
            $dbh = null;

        ?>

            <form action="pro_edit_check.php" method="post" enctype="multipart/form-data">
                商品コード:
                <?php echo $pro_code ?><br><br>
                <input type="hidden" name="pro_code" value="<?php echo $pro_code ?>">
                商品名<br>
                <input type="text" name="pro_name" value="<?php echo $pro_name ?>"><br>
                商品価格<br>
                <input type="text" name="pro_price" value="<?php echo $pro_price ?>"><br>
                画像ファイル選択<br>
                <input type="hidden" name="gazou_old" value="<?php echo $gazou_old ?>"><br>
                <input type="file" name="gazou" style="width=400px" value="<?php echo $gazou_disp ?>"><br>
                <input type="button" class="btn btn-secondary mt-3" onclick="history.back()" value="戻る">

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