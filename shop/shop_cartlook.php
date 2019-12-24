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
		<h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">カートの中身</h3>
	</div>

    

    <?php

    try {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            $kazu = $_SESSION['kazu'];
        } else {
            // if(count($cart)== 0){
            echo "カートに商品はありません。<br>";
            echo '<a class="btn btn-secondary mt-3" href="index.php">戻る</a>';
            exit();
            // }
        }

        $dsn='mysql:dbname=tqmsbzgg_shop;host=localhost;charset=utf8';
        $user='tqmsbzgg_shop';
        $password='%RdFsbr)I})8';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ?>
        <?php
        foreach ($cart as $key => $val) {
            $sql = 'SELECT code, name,gazou,price FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[0] = $val;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name[] = $rec['name'];
            $pro_gazou[] = $rec['gazou'];
            $pro_price[] = $rec['price'];
        }
        ?>
        <form action="kazu_change.php" method="post">
            <table class="table thead-dark">
                <thead>
                    <tr>
                        <th scope="col">商品名</th>
                        <th scope="col">商品画像</th>
                        <th scope="col">価格</th>
                        <th scope="col">個数</th>
                        <th scope="col">削除</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 0; $i < count($cart); $i++) {
                    echo '<tr class="align-bottom"><td class="align-bottom">' . $pro_name[$i] . '</td>';
                    echo '<td><img class="img-thumbnail" style="max-width:300px; height:auto" src="../product/gazou/' . $pro_gazou[$i] . '"></td>';
                    echo '<td class="align-bottom">' . $kazu[$i] * $pro_price[$i] . "円 </td>";
                ?>
                    <td class="align-bottom"><input type="text" name="kazu<?php echo $i; ?>" value="<?php echo $kazu[$i] ?>"></td>
                    <td class="align-bottom"><input type="checkbox" name="sakujo<?php echo $i ?>"></td><br>
                <?php
                }
                ?>
                </tbody>
            </table>

            <input type="hidden" name="max" value="<?php echo count($cart) ?>">
            <div class="d-flex flex-row-reverse">
                <input class="btn btn-primary" type="submit" value="数量変更">
            </div>
        </form>
    <?php
        $dbh = null;
    } catch (Exception $e) {
        echo $e;
        exit();
    } ?>
    <div class="text-center mt-3">
    <a class="btn btn-secondary mr-3" href="index.php">戻る</a>
    <a class="btn btn-info mr-3" href="shop_form.php">購入手続きに進む</a>
    <?php
    if (isset($_SESSION['member_login']) == true) {
        echo '<a class="btn btn-primary" href="shop_kantan_check.php">会員簡単注文へ進む</a><br>';
    }
    ?>
    
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>