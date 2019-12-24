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
        

        <?php

        try {

            $pro_code = $_GET['procode'];

            $dsn='mysql:dbname=tqmsbzgg_shop;host=localhost;charset=utf8';
            $user='tqmsbzgg_shop';
            $password='%RdFsbr)I})8';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT code, name,gazou,price FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $pro_code;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name = $rec['name'];
            $pro_gazou = $rec['gazou'];
            $pro_price = $rec['price'];
            echo '<div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">'. $pro_name . '</h3></div><br>';
            echo '<img class="img-thumbnail" style="max-width:300px; height:auto" src="../product/gazou/' . $pro_gazou . '"><br>';
            echo "商品コード:" . $pro_code . "<br>";
            echo "価格:" . $pro_price . "円<br>";

            $dbh = null;
        } catch (Exception $e) {
            echo $e;
            exit();
        } ?>

        <form action="shop_cartin.php" method="post">
            <input type="hidden" name="procode" value="<?php echo $pro_code ?>"><br>
            数量
            <select name='kazu'>
                <?php for ($i = 1; $i <= 100; $i++) { ?>
                    <option value=<?php echo $i ?>><?php echo $i ?></option>
                <?php } ?>
            </select>
            <input class="ml-3 btn btn-primary" type="submit" value="カートに入れる">
        </form>

        <!-- <a href="shop_cartin.php?procode=<?php echo $pro_code ?>">カートに入れる</a><br><br> -->
        <a class="btn btn-secondary mt-3" href="index.php">戻る</a>
        </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>