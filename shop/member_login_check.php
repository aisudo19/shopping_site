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

            if (isset($_SESSION['member_login']) == true) {
                echo "ようこそ" . $_SESSION['member_name'] . "様<br>";
                // echo $_SESSION['staff_name']."さんログイン中<br>";
                echo '<a href="member_logout.php">ログアウト</a><br><br>';
            } else {
                echo "ようこそゲスト様<br>";
                echo '<a href="./member_login.php">会員ログイン</a><br>';
            }

            ?>
        </div>
    </div>


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

            $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
            $user = 'root';
            $password = 'root';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>