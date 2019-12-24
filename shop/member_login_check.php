<?php include('../assets/header_member.php');?>

    <div class="container">
        <div class="d-flex flex-row">
            <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">会員ログインチェック</h3>
        </div>

        <?php
        try {
            require_once("../common/common.php");
            $post = sanitize($_POST);
            $email = $post['email'];
            $pass = $post['pass'];
            $pass = md5($pass);

            include('../assets/db_connect.php');

            $sql = 'SELECT code,name FROM dat_member WHERE email=? AND password=?';
            $stmt = $dbh->prepare($sql);
            $data[] = $email;
            $data[] = $pass;
            $stmt->execute($data);
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            $dbh = null;

            if ($rec == false) {
                echo "メールアドレスかパスワードのどちらかが間違っています。<br>";
                echo '<a href="member_login.php">戻る</a>';
            } else {
                session_start();
                $_SESSION['member_login'] = 1;
                $_SESSION['member_code'] = $rec['code'];
                $_SESSION['member_name'] = $rec['name'];
                header('Location: index.php');
                exit();
            }
        } catch (Exception $e) {
            echo $e;
            exit();
        }
        ?>

<?php include('../assets/footer.php');?>