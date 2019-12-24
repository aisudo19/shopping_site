<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ろくまる農園</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-5 mb-3 bg-white border-bottom shadow-sm">
        <h2 class="my-0 mr-md-auto font-weight-normal"><a href="../index.php" class="">八百屋のすどう</a></h2>
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