<?php include('../assets/header_member.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">お客様情報</h3>
        </div>
        <?php

        $code = $_SESSION['member_code'];

        include('../assets/db_connect.php');

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

        <?php include('../assets/footer.php');?>