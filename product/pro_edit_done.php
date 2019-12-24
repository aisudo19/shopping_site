<?php include('../assets/header_staff.php'); ?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal mb-3">商品編集完了</h3>
        </div>
        <?php
        
        try {
            require_once("../common/common.php");
            $post = sanitize($_POST);

            $name = $post['name'];
            $kakaku = $post['kakaku'];
            $code = $post['code'];
            $gazou_old = $post['gazou_old'];
            $gazou = $post['gazou'];

            //もし画像が変更されていなかったら、古い画像が消えないようにする
            if ($gazou == '') {
                $gazou = $gazou_old;
            }
            if ($gazou_old != '') {
                //もし古い画像が残っていたら、フォルダから削除する
                unlink('./gazou/' . $gazou_old);
            }
            include('../assets/db_connect.php');

            $sql = 'UPDATE mst_product SET name=?, price=?, gazou=? WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $name;
            $data[] = $kakaku;
            $data[] = $gazou;
            $data[] = $code;
            $stmt->execute($data);
            $dbh = null;

            echo "修正しました。<br>";
            echo "商品名：" . $name . "<br>";
            echo "商品価格:" . $kakaku . "<br>";
            echo '<img class="img-thumbnail" style="max-width:300px; height:auto" src="./gazou/' . $gazou . '"><br>';
        } catch (Exception $e) {
            echo $e;
            exit();
        } ?>
        <a class="btn btn-secondary mt-3" href="pro_list.php">戻る</a><br>

        <?php include('../assets/footer.php'); ?>