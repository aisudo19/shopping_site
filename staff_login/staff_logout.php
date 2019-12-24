<?php include('../assets/header_no_name.php'); ?>

<div class="container">
    <div class="d-flex flex-row">
        <h3 class="font-weight-normal my-0 mr-md-auto font-weight-normal">ログアウトしました。</h3>
    </div>



    <?php
    session_start();
    $_SESSION = array();
    if (isset($_COOKIE[session_name()]) == true) {
        setcookie(session_name(), '', time() - 42000, '/');
    }
    session_destroy();

    ?>

    <br>
    <a class="btn btn-secondary mt-3" href="../staff_login/staff_login.php">ログイン画面へ</a>

    <?php include('../assets/footer.php'); ?>